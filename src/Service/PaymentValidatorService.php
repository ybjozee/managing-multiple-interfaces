<?php

namespace App\Service;

use App\Entity\Payment;
use Exception;

class PaymentValidatorService {

    private array $validators;

    public function __construct(iterable $validators) {

        $this->validators = iterator_to_array($validators);
    }

    /**
     * @throws Exception
     */
    public function execute(string $type, Payment $payment)
    : void {

        foreach ($this->validators as $validator) {
            if ($validator->supports($type)) {
                $validator->validate($payment);

                return;
            }
        }

        throw new Exception("Unsupported payment type $type");
    }
}