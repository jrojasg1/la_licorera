<?php 

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PaymentInterface;
use App\Util\PaymentVoucher;
use App\Util\PaymentAccount;

class PaymentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PaymentInterface::class, function ($app,$params){
            $payment = $params['payment_type'];
            if($payment == 'voucher'){
                return new PaymentVoucher();
            }elseif($payment == 'account'){
                return new PaymentAccount();
            }
        });
    }
}
