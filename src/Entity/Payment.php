<?php

namespace App\Entity;

class Payment {

    public function __construct(
        private string $reference,
        private float  $amount
    ) {
    }

    public function getReference()
    : string {

        return $this->reference;
    }

    public function getAmount()
    : float {

        return $this->amount;
    }
}