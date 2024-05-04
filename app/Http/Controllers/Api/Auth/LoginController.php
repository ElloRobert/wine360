<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;
use DB;
use Exception;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try{
            $this->validate($request, [
                'email' => 'required',
                'password' => 'required'
            ]);

            $user = User::where('email', $request->email)->first();

            if ( !(Auth::attempt(['email' => $request->email, 'password' => $request->password])) ){
                throw new Exception('The given data failed to pass validation.');
            }

            $user_client = DB::table('oauth_clients')->where('user_id', $user->id)->first();

            $params = [
                'grant_type' => 'password',
                'client_id' => $user_client->id,
                'client_secret' => $user_client->secret,
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '*',
            ];

            $request->request->add($params);

            $proxy = Request::create('oauth/token', 'POST');

            return Route::dispatch($proxy);

        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                // 'errors' => $e->validator->errors()
            ]);
        }

    	
    }



    public function refresh(Request $request)
    {
    	$this->validate($request, [
    		'refresh_token' => 'required'
    	]);

// Čak nam ovaj dio ne treba jer ako u AuthServiceProvider dodamo:
//Passport::tokensExpireIn(Carbon::now()->addDays(15));

//Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));


		// $params = [
     //    	'grant_type' => 'refresh_token',
     //    	'client_id' => $user_client->id,
     //    	'client_secret' => $user_client->secret,
     //    	'username' => $request->email,
     //    	'password' => $request->password,
     //    	'scope' => '*',
     //    ];

     //    $request->request->add($params);

     //    $proxy = Request::create('oauth/token', 'POST');

     //    return Route::dispatch($proxy);
    }



    public function logout(Request $request)
    {
    	$access_token = Auth::user()->token();

    	DB::table('oauth_refresh_tokens')
    		->where('access_token_id', $access_token->id)
    		->update(['revoked' => true]);

    	$access_token->revoke();

    	return response()->json(['test'], 204);
    }
}
