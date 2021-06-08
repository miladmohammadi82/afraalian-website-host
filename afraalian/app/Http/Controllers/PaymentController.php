<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment()
    {
        $order = Order::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->first();


        $data = array(
            'MerchantID' => 'a6a09676-d08b-4bee-aa18-0094533e666f',
            'Amount' => $order->grand_total,
            'CallbackURL' => route('zarinpal.paymentVerify', $order->id),
            'Description' => 'خرید از وبسایت افراآلیان'
        );


        $jsonData = json_encode($data);
        $ch = curl_init('https://sandbox.zarinpal.com/pg/rest/WebGate/PaymentRequest.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));


        $result = curl_exec($ch);
        $err = curl_error($ch);
        $result = json_decode($result, true);
        curl_close($ch);


        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            if ($result["Status"] == 100) {
                $array = ['Authority'=>$result["Authority"]];
                return redirect()->to('https://sandbox.zarinpal.com/pg/StartPay/' . $result["Authority"]);

            } else {
                echo 'ERR: ' . $result["Status"];
            }
        }

    }

    public function paymentVerify(Request $request, $orderId)
    {
        $order = Order::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->first();

        $MerchantID = 'a6a09676-d08b-4bee-aa18-0094533e666f';


        $Authority = $request->Authority;

        $data = array('MerchantID' => $MerchantID, 'Authority' => $Authority, 'Amount' => $order->grand_total);

        $jsonData = json_encode($data);
        $ch = curl_init('https://sandbox.zarinpal.com/pg/rest/WebGate/PaymentVerification.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));
        $result = curl_exec($ch);

        $err = curl_error($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            if ($result['Status'] == 100) {

                transaction::create([
                    'user_id' => auth()->user()->id,
                    'order_id' => $order->id,
                    'grand_total' => $data['Amount'],
                    'ref_id' => $result['RefID'],
                    'token' => $data['Authority'],
                    'status' => $result['Status'],
                ]);

                $order = Order::findOrFail($orderId);
                $order->status = "paid";
                $order->save();
                return redirect(route('zarinpal.success'));
            } else {
                echo 'Transation failed. Status:' . $result['Status'];
            }
        }
    }

    public function success()
    {
        return view('front.pages.success.successPay');
    }
}
