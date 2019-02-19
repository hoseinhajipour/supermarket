<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Factor;
use App\Models\Payment;
use App\Models\User;

class PaymentController extends Controller {

    public function index(Request $request) {
        $payments = Payment::paginate(10);
        return View('admin.payment.index', compact(['payments']));
    }

}
