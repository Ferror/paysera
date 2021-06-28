<?php
declare(strict_types=1);

namespace Ferror\Presenter\Console;

use Ferror\Application\OperationStorageFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpKernel\KernelInterface;

final class CalculateCommand extends Command
{
    private KernelInterface $kernel;

    private OperationStorageFactory $operationStorageFactory;

    public function __construct(
        KernelInterface $kernel,
        OperationStorageFactory $operationStorageFactory
    ) {
        $this->kernel = $kernel;
        $this->operationStorageFactory = $operationStorageFactory;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setName('fee:calculate');
        $this->addArgument('file');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $fileName = \sprintf('%s/data/%s', $this->kernel->getProjectDir(), $this->getStringArgument($input, 'file'));

        if (\file_exists($fileName)) {
            $operationStorage = $this->operationStorageFactory->fromFile($fileName);

            foreach ($operationStorage->getAll() as $operation) {
                $output->writeln($operation->getCommission()->print());
            }

            return Command::SUCCESS;
        }

        return Command::FAILURE;
    }

    private function getStringArgument(InputInterface $input, string $name): string
    {
        $argument = $input->getArgument($name);

        if ($argument === null || \is_array($argument)) {
            throw new \RuntimeException('Invalid Input Type Argument');
        }

        return $argument;
    }
}
