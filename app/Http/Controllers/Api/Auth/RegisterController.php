<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Configuration;
use App\VehicleGroup;
use Ultraware\Roles\Models\Role;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        try{
        	//Validate for register form
        	// $this->validate($request, [
         //        'name' => 'required|max:255',
         //        'email' => 'required|email|max:255|unique:users,email',
         //        'password' => 'required|min:6',
         //        'company' => 'nullable|max:255',
         //        'address' => 'nullable|max:255',
         //        'oib' => 'nullable|digits:11|numeric|unique:users,oib',
         //    ]);

            $validator = \Validator::make($request->all(), [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|min:6',
                'city' => 'nullable|max:255',
                'company' => 'nullable|max:255',
                'address' => 'nullable|max:255',
                'oib' => 'nullable|digits:11|numeric|unique:users,oib',
            ]);
            // return $validator;

            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()]);
            }

        	//Create user
            $user = User::create([
            	'name' => $request->name,
            	'email' => $request->email,
            	'password' => bcrypt($request->password),
                'city' => $request->city,
                'company' => $request->company,
                'oib' => $request->oib,
                'address' => $request->address,
            ]);

            $privateRole = Role::whereSlug('private')->first();

            $user->attachRole($privateRole);

            $reg_user_config = Configuration::create();
            $reg_user_config->configuration()->associate($user);
            $reg_user_config->save();
        
            



            //Create oauth client - password grant client
            $redirect = 'http://wine360.eu'; //change this field to app home page
            $client = (new Client)->forceFill([
                'user_id' => $user->id,
                'name' => $user->name . 'password',
                'secret' => str_random(40),
                'redirect' => $redirect,
                'personal_access_client' => false,
                'password_client' => true,
                'revoked' => false,
            ]);

            $client->save();


            $params = [
            	'grant_type' => 'password',
            	'client_id' => $client->id,
            	'client_secret' => $client->secret,
            	'username' => $request->email,
            	'password' => $request->password,
            	'scope' => '*',
            ];

            $request->request->add($params);

            $proxy = Request::create('oauth/token', 'POST');

            return Route::dispatch($proxy);

        } catch(\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                // 'errors' => $e->validator->errors()
            ]);
        }

    }
}
