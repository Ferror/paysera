<?php
declare(strict_types=1);

namespace Ferror\Functional\Presenter\Console;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\Console\Command\Command;

final class CalculateCommandTest extends KernelTestCase
{
    public function testExecute(): void
    {
        $kernel = static::createKernel();
        $application = new Application($kernel);

        $command = $application->find('fee:calculate');
        $commandTester = new CommandTester($command);
        $result = $commandTester->execute([
            // pass arguments to the helper

            // prefix the key with two dashes when passing options,
            // e.g: '--some-option' => 'option_value',
        ]);

        self::assertEquals(Command::SUCCESS, $result);
    }
}
