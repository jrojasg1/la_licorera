<?php

namespace App\Providers;

use App\Interfaces\PaymentInterface;
use App\Util\PaymentAccount;
use App\Util\PaymentVoucher;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PaymentInterface::class, function ($app, $params) {
            $payment = $params['payment_type'];
            if ($payment == 'voucher') {
                return new PaymentVoucher();
            } elseif ($payment == 'account') {
                return new PaymentAccount();
            }
        });
    }
}
