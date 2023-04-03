<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Vonage\Client\Credentials\Basic;
use Vonage\Client;
use Vonage\Client\Credentials\Container;
use Vonage\Verify\Request as OtpRequest;

class UserController extends Controller
{
    public function test(Request $request){
        
        
        $basic  = new Basic(env('VONAGE_API_KEY'),env('VONAGE_API_SECRET'));
        $client = new Client(new Container($basic));
       $otpRequest = new OtpRequest($request->mobile_number, "DannyCodes");

// choose PIN length (4 or 6)
$otpRequest->setCodeLength(4);

// set locale
$otpRequest->setCountry('ng');

$response = $client->verify()->start($otpRequest);

// To create user
$user = new User;
$user->mobile_number = $request->mobile_number;
$user->password = $request->password;

// To get request Id if needed
// $user->request_id = $response->getRequestId();
$user->save();
return [
 'message'=>"Verification started successfully"

];

       
    }
}
