<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

interface PaymentInterface
{
    public function processPayment(Request $request):RedirectResponse;
}
