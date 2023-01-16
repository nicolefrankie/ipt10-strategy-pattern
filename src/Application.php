<?php

namespace App;

use App\Cart\Item;
use App\Cart\ShoppingCart;
use App\Order\Order;
use App\Invoice\TextInvoiceStrategy;
use App\Invoice\PDFInvoiceStrategy;
use App\Customer\Customer;
use App\Payments\CashOnDeliveryStrategy;
use App\Payments\CreditCardStrategy;
use App\Payments\PaymentStrategy;
use App\Payments\PaypalStrategy;

class Application{
    public static function run(){
        $cart = new ShoppingCart();
        $item1 = new Item('Camera', 'Instax Camera Mini 11', 4299);
        $item2 = new Item('Printer', 'Instax Instant Printer Mini Link 2', 7299);

        $cart->addItem($item1, 5);
        $cart->addItem($item2, 4);
        $cart->displayItems();

        $customer = new Customer('Nicole Frankie D. Capuno', 'Magalang', 'capuno.nicolefrankie@auf.edu.ph');
        $order = new Order($customer, $shopping_cart);

        //Invoice 
        $invoice = new PDFInvoice();
        $order->setInvoiceGenerator($invoice);
        $invoice->generate($order);

        //Payment
        $payment = new PaypalPayment('nicolecapuno@gmail.com', 'secret123');
        $order->setPaymentMethod($payment);
        $order->payInvoice();
    }
}