<?php

namespace App\Command;

use App\Exception\CryptocurrencyImportFailedException;
use App\Importer\CryptocurrencyImporter;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'cryptocurrency:import',
    description: 'Import cryptocurrencies',
    hidden: false,
)]
class ImportCryptocurrencyCommand extends Command
{
    public function __construct(
        readonly private CryptocurrencyImporter $cryptocurrencyImporter,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $this->cryptocurrencyImporter->import();
        } catch (CryptocurrencyImportFailedException $e) {
            $output->writeln($e->getMessage());

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}