<?php 

namespace App\Interfaces;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

interface PaymentInterface {
    public function processPayment(Request $request) ;
}
