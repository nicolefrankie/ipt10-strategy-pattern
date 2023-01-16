<?php

namespace App\Order;

use Exception;
use App\Invoice\InvoiceStrategy;
use App\Payments\PaymentStrategy;

class Order{
    protected $name;
    protected $address;
    protected $email;
    protected $paymentMethod;
	protected $invoiceGenerator;

    public function __construct($customer, $cart){
        $this->name = $customer->getName();
        $this->address = $customer->getAddress();
        $this->email = $customer->getEmail();
        $this->items = $cart->getItems();
        $this->total = $cart->getTotal();	
    }

    public function getName(){
        return $this->name;
    }

    public function getAddress(){
        return $this->address;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getItems(){
        return $this->items;
    }

    public function getTotal(){
        return $this->getTotal;
    }

    public function setPaymentMethod(){
        $this->paymentPaymentMethod = $method;
    }

    public function payInvoice(){
        try{
            if (empty($this->paymentMethod)){
                throw new Exception('Invalid payment method');
            }
            $total = $this->total;
            $this->paymentMethod->pay($total);
        } catch (Exception $e){
            error_log ($e->getMessage());
        }
    }

    public function generateInvoice(){
        try{
            if (empty($this->invoiceGenerator)){
                throw new Exception('Missing Invoice generator');
            }
            $this->invoiceGenerator->generator($this);
        } catch (Exception $e){
            error_log ($e->getMessage());
        }
    }
}