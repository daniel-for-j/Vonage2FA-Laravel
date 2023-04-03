<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Vonage\Client\Credentials\Basic;
use Vonage\Client;
use Vonage\Client\Credentials\Container;
use Vonage\Verify\Request as OtpRequest;


class SmsOtpController extends Controller
{
    public function login(Request $request,$mobileNumber,$code){
        $user = User::where('mobile_number', $mobileNumber)->first();

        $basic  = new Basic(env('VONAGE_API_KEY'),env('VONAGE_API_SECRET') );
       $client = new Client(new Container($basic));
        $result = $client->verify()->check($user->request_id,$code);

          return ["response"=>$result->getResponseData()];






    
  


    } 
}
