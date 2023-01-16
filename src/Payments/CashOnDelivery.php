<?php

namespace App\Payments;

use App\Payments\PaymentStrategy;

class CashOnDelivery implements PaymentStrategy{
    protected $name;
    protected $email;
    protected $address;

    public function __construct($customer){
        $this->name = $customer->getName();
        $this->email = $customer->getEmail();
        $this->address = $customer->getAddress();
    }

    public function pay($amount){
        echo "Payment for the amount {$amount} would be paid on delivery\n";
		echo "C.O.D. Details\n";
		echo "Payee: {$this->name} \n";
		echo "Email: {$this->email} \n";
		echo "Address: {$this->address}\n";
    }
}