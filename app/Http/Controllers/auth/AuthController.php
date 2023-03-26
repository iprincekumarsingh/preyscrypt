<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Date;
use Exception;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }


    public function postLogin(UserLoginRequest $userLoginRequest)
    {
        $userLoginRequest->validated($userLoginRequest->all());

        $number = "+91" . $userLoginRequest->phone;
        $rand = rand(100000, 999999);

        $user = User::where('phone', $userLoginRequest->phone)->first();

        if($user->status == "blocked"){
            return back()->with('error', 'Your account has been blocked. Please contact admin.');
        }

        $message = "Your verification code is: " . $rand;
        try {
            // $account_sid = getenv("TWILIO_SID");
            // $auth_token = getenv("TWILIO_TOKEN");
            // $twilio_number = getenv("TWILIO_FROM");

            // $client = new Client($account_sid, $auth_token);
            // $client->messages->create($number, [
            //     'from' => $twilio_number,
            //     'body' => $message
            // ]);


            //   generate a unique customer id with year
            $year = Carbon::now()->format('y');
            $month = Carbon::now()->format('m');




            // generating a new customer id with the year and their last phone number 

            $customer_id = $year;
            $customer_id = $customer_id . substr($userLoginRequest->phone, -3) . rand(100, 999);
            // info('SMS Sent Successfully.');
            $user = User::where('phone', $userLoginRequest->phone)->first();
            // // echo $number;
            if ($user) {

                $otp = Otp::create([
                    'user_id' => $user->id,
                    'otp' => $rand,
                ]);

                return redirect()->route('auth.verify', $user->id);

            } else {
                $user = User::create([
                    'phone' => $userLoginRequest->phone,
                    'customer_id' => $customer_id,
                    'otp' => $rand,
                ]);

                $otp = Otp::create([
                    'user_id' => $user->id,
                    'otp' => $rand,
                ]);

                return redirect()->route('auth.verify', $user->id);


            }

        } catch (Exception $e) {
            info("Error: " . $e->getMessage());
        }
    }


    protected function verify($id)
    {
        $user = User::find($id);

        return view('auth.verify', compact('user'));
    }


    protected function postVerify(Request $request)
    {
        $user = User::find($request->id);
        $otp = Otp::where('user_id', $user->id)->latest()->first();

        if ($otp->otp == $request->otp) {

            $user->save();

            // ḷogin user 
            auth()->login($user);


            if (auth()->user()->name == null && auth()->user()->email == null)
                return redirect()->route('user.new_user')->with('success', 'Login Successfully');
            else
                return redirect()->route('home');
            //  return redirect()->route('home');


        } else {
            return redirect()->back()->with('error', 'Invalid OTP');
        }
    }

    public function resend_otp($phone)
    {
        $rand = rand(100000, 999999);
        $user = User::where('phone', $phone)->first();
        $otp = Otp::create([
            'user_id' => $user->id,
            'otp' => $rand,
        ]);

        return redirect()->back()->with('success', 'OTP Resend Successfully');
    }


}