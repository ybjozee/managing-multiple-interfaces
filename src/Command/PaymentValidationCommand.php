<?php

namespace App\Command;

use App\Entity\Payment;
use App\Service\PaymentValidatorService;
use Exception;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'validatePayment',
    description: 'Command to validate payment based on payment service provider',
)]
class PaymentValidationCommand extends Command {

    public function __construct(private PaymentValidatorService $validator) {

        parent::__construct();
    }

    protected function configure()
    : void {

        $this
            ->addArgument('provider', InputArgument::REQUIRED, 'Payment service provider')
            ->addArgument('reference', InputArgument::REQUIRED, 'Payment reference');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    : int {

        $io = new SymfonyStyle($input, $output);
        $reference = $input->getArgument('reference');
        $provider = $input->getArgument('provider');
        $payment = new Payment($reference, floatval(mt_rand()));
        try {
            $this->validator->execute($provider, $payment);
            $io->success('This payment reference is valid. Thank you.');

            return Command::SUCCESS;
        } catch (Exception $exception) {
            $io->error($exception->getMessage());

            return Command::FAILURE;
        }
    }
}
