<?php

namespace App\Command;

use App\Service\TestDataService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:create-test-data',
    description: 'Created Test Data in DB',
)]
class CreateTestDataCommand extends Command
{

    private TestDataService $testDataService;
    public function __construct(TestDataService $testDataService)
    {
        $this->testDataService = $testDataService;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output):int
    {
        $io = new SymfonyStyle($input, $output);

        $this->testDataService->createTestSalaryType();
        $this->testDataService->createTestMoneyMoveType();
        $this->testDataService->createTestEmployeePost();
        $this->testDataService->createTestEmployees();
        $this->testDataService->createTestProfiles();


        return 0;

    }

//    protected function execute(InputInterface $input, OutputInterface $output): int
//    {
//        $io = new SymfonyStyle($input, $output);
//        $arg1 = $input->getArgument('arg1');
//
//        if ($arg1) {
//            $io->note(sprintf('You passed an argument: %s', $arg1));
//        }
//
//        if ($input->getOption('option1')) {
//            // ...
//        }
//
//        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
//
//        return Command::SUCCESS;
//    }
}
