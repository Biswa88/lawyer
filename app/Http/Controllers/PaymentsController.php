<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use App\Models\Booking;
use Auth;
use App\Models\Admin\AppointmentComission;

class PaymentsController extends Controller
{
    public function makePayment(Request $request) {
        $consultancy_fees = User::where('id', $request->user_id)->select('consultancy_fees')->first()->consultancy_fees;

        if($consultancy_fees != $request->amount) {
        	dd('Amount not matched !!');
        }

    	$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		/*curl_setopt($ch, CURLOPT_HTTPHEADER,
		            array("X-Api-Key:test_43bc15fd39896e130c11b8b64ee",
		                  "X-Auth-Token:test_513f05f40df573f6389bb3b32d9"));*/

						  curl_setopt($ch, CURLOPT_HTTPHEADER,
						  array("X-Api-Key:test_25b6316512018842a5553932d06",
								"X-Auth-Token:test_df641dedda0965589c9e44952a4"));
			  
		$payload = Array(
		    'purpose' => 'Lawyer Booking',
		    'amount' => $request->amount,
		    'phone' => $request->mobile_number,
		    'buyer_name' => $request->name,
		    'redirect_url' => route('payment_success'),
		    'send_email' => true,
		    'send_sms' => true,
		    'email' => $request->email,
		    'allow_repeated_payments' => false
		);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));

		$response = curl_exec($ch);

		curl_close($ch); 
		//echo '<pre>';
		$response=json_decode($response);
		/*print_r($response);
		exit;*/

		$payment_request_id = $response->payment_request->id;
		//save to DB
		$user_id = $request->user_id;
		
		$buyer_id = Auth::user()->id;

        $data = [];
		$data['user_id'] = $user_id;
		$data['buyer_id'] = $buyer_id;
		$data['date_of_payment'] = date('Y-m-d H:i:s');
		$data['booking_id'] = $request->booking_id;
		$data['amount_paid'] = $request->amount;
		$data['payment_request_id'] = $payment_request_id;
		$data['payment_status'] = 'Failed';
		if($payment = Payment::create($data)) {
			$comission_data = [];

			$comission_data['payment_id'] = $payment->id;
			$comission_data['commission_pc'] = 3;
			$comission_data['paid_amount'] = $request->amount;
			$comission_data['comission_amount'] =  ((3/100)*$request->amount);

			AppointmentComission::create($comission_data);

		}




		return redirect($response->payment_request->longurl);
    }


    public function success(Request $request){
			
		$payment_status = $request->payment_status;

		$payment_id = $request->payment_id;
		$payment_request_id = $request->payment_request_id;

	        
		$payment = Payment::where('payment_request_id', $payment_request_id)->first();
		if($payment_status != 'Failed') {
			
			

	        $payment->payment_status = 'Success';
	        $payment->payment_mode = $request->payment_status;
	        $payment->date_of_payment = date('Y-m-d H:i:s');
	        $payment->save();
			
			
			
			$booking_id = $payment->booking_id;
			$booking = Booking::find($booking_id);
			
			$lawyerId = $booking->lawyer_id;
			$date = $booking->date;
			
			
			return redirect()->route('create.appointment', ['lawyer_id' => $lawyerId, 'date' => $date ])->with('message','Your appointment was booked');
		}else{
			$payment->payment_status = 'Failed';
			$payment->amount_paid = 0;
	        $payment->save();
			
			return redirect()->back()->with('message','Your payment was not successfull');
		}


		
		
	}
}
