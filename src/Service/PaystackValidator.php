<?php

namespace App\Service;

use App\Entity\Payment;
use App\Interfaces\PaymentValidatorInterface;
use Exception;

class PaystackValidator implements PaymentValidatorInterface {

    public function supports(string $type)
    : bool {

        return $type === 'paystack';
    }

    public function validate(Payment $payment)
    : void {

        if (!str_starts_with($payment->getReference(), 'PYS')) {
            throw new Exception(
                "Payment reference {$payment->getReference()} is not valid"
            );
        }
    }
}