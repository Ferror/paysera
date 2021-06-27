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

//    /**
//     * These data are invalid as for every day there should be requested
//     * currency rate.
//     */
//    public function testUsage(): void
//    {
//        $result = $this->command->execute([
//            'file' => 'input.csv',
//        ]);
//
//        self::assertEquals(Command::SUCCESS, $result);
//
//        $this->assertStringContainsString(<<<TEXT
//0.60
//3.00
//0.00
//0.06
//1.50
//0
//0.70
//0.30
//0.30
//3.00
//0.00
//0.00
//8612
//TEXT,
//            $this->command->getDisplay()
//);
//    }
}
