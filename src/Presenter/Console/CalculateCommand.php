<?php
declare(strict_types=1);

namespace Ferror\Presenter\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class CalculateCommand extends Command
{
    public function __construct()
    {
        parent::__construct('fee:calculate');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        return Command::SUCCESS;
    }
}
