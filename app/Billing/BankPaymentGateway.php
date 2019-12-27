<?php


namespace App\Billing;


use Illuminate\Support\Str;

class BankPaymentGateway implements PaymentGatewayContract
{
    private $currency;
    private $discount;

    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }

    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }

    public function charge($amount)
    {
//        Charge the bank
        return [
            'amount' => $amount - $this->discount,
            'confirmation_code' => strtoupper(Str::random(10)),
            'discount' => $this->discount,
            'currency' => $this->currency
        ];
    }
}
