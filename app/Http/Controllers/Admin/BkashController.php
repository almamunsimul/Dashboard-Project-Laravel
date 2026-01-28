<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Softrang\BkashPayment\Facades\Bkash;

class BkashController extends Controller
{
    public function index()
    {
        return view('admin.payment.payment');
    }    
    
    // public function success()
    // {
    //     return view('admin.payment.success');
    // }

     public function create(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        // Create payment session using Softrang\BkashPayment
        $response = Bkash::createPayment([
            'amount' => $request->amount,
            'payerReference' => $request->phone,
        ]);

        if (isset($response['bkashURL'])) {
            return redirect()->away($response['bkashURL']);
        }

        return back()->with('error', $response['message'] ?? 'Failed to create payment');
    }

   
    
    public function callback(Request $request)
{
    
    if (in_array($request->status, ['failure', 'cancel'])) {
        return redirect()->route('payment.failed')
            ->with('error', 'Payment cancelled or failed.');
    }

    $paymentID = $request->paymentID;
    $execute = Bkash::executePayment($paymentID);

    if (isset($execute['statusCode']) && $execute['statusCode'] === '0000') {

        session()->put('bkash_success', [
            'trxID'      => $execute['trxID'],
            'amount'     => $execute['amount'],
            'paymentID'  => $execute['paymentID'],
        ]);

        return redirect()->route('admin.payment.success');
    }

    return redirect()->route('payment.failed')->with('error', 'Payment not completed.');
}
    
    public function success()
    {
        if (!session()->has('bkash_success')) {
            return redirect()->back();
        }

        $data = session('bkash_success');
        session()->forget('bkash_success');
        return view('admin.payment.success', compact('data'));
    }
}
