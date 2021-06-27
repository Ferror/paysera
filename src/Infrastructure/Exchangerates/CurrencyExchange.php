<?php
declare(strict_types=1);

namespace Ferror\Infrastructure\Exchangerates;

use Ferror\Domain\Currency;
use Ferror\Domain\Currency\CurrencyExchange as CurrencyExchangeInterface;
use Ferror\Domain\Money;
use Ferror\Domain\Price;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class CurrencyExchange implements CurrencyExchangeInterface
{
    private HttpClientInterface $client;
    private string $accessKey;

    public function __construct(HttpClientInterface $exchangeratesClient, string $accessKey)
    {
        $this->client = $exchangeratesClient;
        $this->accessKey = $accessKey;
    }

    public function exchange(Money $money, Currency $to): Money
    {
        $response = $this->client->request('GET', 'latest', [
            'query' => [
                'access_key' => $this->accessKey,
                'base' => $money->getCurrency()->toString(),
                'date' => date('Y-m-d'),
            ]
        ]);

        return new Money(
            new Price(
                $response->toArray(true)['rates'][$to->toString()] * $money->getPrice()->getCents()
            ),
            $to
        );
    }

    public function getExchangeRate(Currency $from, Currency $to, \DateTime $date): float
    {
        $response = $this->client->request('GET', $date->format('Y-m-d'), [
            'query' => [
                'access_key' => $this->accessKey,
                'base' => $from->toString(),
            ]
        ]);

        return $response->toArray(true)['rates'][$to->toString()];
    }
}
