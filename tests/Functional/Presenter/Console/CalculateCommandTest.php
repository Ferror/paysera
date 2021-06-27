<?php
declare(strict_types=1);

namespace Ferror\Functional\Presenter\Console;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;

final class CalculateCommandTest extends KernelTestCase
{
    private CommandTester $command;

    protected function setUp(): void
    {
        $application = new Application(static::createKernel());
        $command = $application->find('fee:calculate');

        $this->command = new CommandTester($command);
    }

    public function testUsage(): void
    {
        $result = $this->command->execute([
            'file' => 'input.csv',
        ]);

        self::assertEquals(Command::SUCCESS, $result);
    }
}
