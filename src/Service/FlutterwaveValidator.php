<?php

namespace App\Service;

use App\Entity\Payment;
use App\Interfaces\PaymentValidatorInterface;
use Exception;

class FlutterwaveValidator implements PaymentValidatorInterface {

    /**
     * @inheritDoc
     */
    public function supports(string $type)
    : bool {

        return $type === 'flutterwave';
    }

    /**
     * @inheritDoc
     */
    public function validate(Payment $payment)
    : void {

        if (!str_starts_with($payment->getReference(), 'FLW')) {
            throw new Exception(
                "Payment reference {$payment->getReference()} is not valid"
            );
        }
    }
}