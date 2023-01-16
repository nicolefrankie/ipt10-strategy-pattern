<?php

namespace App\Payments;

use App\Payments\PaymentStrategy;

class PaypalPayment implements PaymentStrategy{
    protected $email;
    protected $password;

    public function __construct($email, $password){
        $this->email = $email;
        $this->password = $password;
    }

    public function pay($amount){
        echo "Paid an amount of {$amount} using Paypal\n";
		echo "Paypal Email Account: {$this->email}\n";
    }
}