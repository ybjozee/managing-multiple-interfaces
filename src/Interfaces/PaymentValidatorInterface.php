<?php

namespace App\Interfaces;

use App\Entity\Payment;
use Exception;

interface PaymentValidatorInterface {

    /**
     * Function to check whether the implementation supports the $type
     */
    public function supports(string $type)
    : bool;

    /**
     * This function contains the actual logic
     * @throws Exception - if the payment fails validation
     */
    public function validate(Payment $payment)
    : void;
}