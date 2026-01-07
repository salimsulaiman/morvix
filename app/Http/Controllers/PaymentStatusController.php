<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentStatusController extends Controller
{
    public function success()
    {
        return view('pages.payment.status.success');
    }
    public function failed()
    {
        return view('pages.payment.status.failed');
    }
}
