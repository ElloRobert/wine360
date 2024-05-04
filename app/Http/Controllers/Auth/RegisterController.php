<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use App\Configuration;
use App\Http\Controllers\Controller;
use App\VehicleGroup;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Ultraware\Roles\Models\Role;
use Session;
use Redirect;
use Exception;
use Laravel\Passport\Client;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Auth::user() && Auth::user()->hasAnyRole(['employee', 'private'])) {
            $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if ($data['reg_type'] != ''){
            Session::put('session_reg_type', $data['reg_type']);
        } else {
            Session::put('session_reg_type', 0);
        }
        
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'city' => 'nullable|max:255',
            'company' => 'nullable|max:255',
            'company_oib' => 'nullable|max:255',
            'address' => 'nullable|max:255',
            'oib' => 'nullable|numeric|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
     
        $privateRole = Role::whereSlug('private')->first();
        $legalRole = Role::whereSlug('legal')->first();
        if ($data['reg_type'] == 2) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'company' => $data['company'],
                'company_oib' => $data['company_oib'],
                'oib' => $data['oib'],
                'address' => $data['address'],
                'city' => $data['city'],
            ]);
        
            $user->attachRole($legalRole);

            $reg_user_config = Configuration::create();
            $reg_user_config->user()->associate($user);
            $reg_user_config->save();

            $user->configuration_id = $reg_user_config->id;
            $user->save();

            $subcategory1 = VehicleGroup::create([
                'name' => 'Management',
                'supercategory' => '3',
                'created_at' => now(),
                'updated_at' => now(),
                'configuration_id' => $reg_user_config->id,
            ]);

            $subcategory2 = VehicleGroup::create([
                'name' => 'Marketing',
                'supercategory' => '3',
                'created_at' => now(),
                'updated_at' => now(),
                'configuration_id' => $reg_user_config->id,
            ]);

            $subcategory3 = VehicleGroup::create([
                'name' => 'Sales',
                'supercategory' => '3',
                'created_at' => now(),
                'updated_at' => now(),
                'configuration_id' => $reg_user_config->id,
            ]);

            $subcategory4 = VehicleGroup::create([
                'name' => 'Logistic',
                'supercategory' => '3',
                'created_at' => now(),
                'updated_at' => now(),
                'configuration_id' => $reg_user_config->id,
            ]);

            $subcategory5 = VehicleGroup::create([
                'name' => 'Maintenance',
                'supercategory' => '3',
                'created_at' => now(),
                'updated_at' => now(),
                'configuration_id' => $reg_user_config->id,
            ]);

            $subcategory6 = VehicleGroup::create([
                'name' => 'Production',
                'supercategory' => '3',
                'created_at' => now(),
                'updated_at' => now(),
                'configuration_id' => $reg_user_config->id,
            ]);

            $redirect = 'http://Wine360.eu'; //change this field to app home page
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

            return $user;
            
        } else if ($data['reg_type'] == 4) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'company' => NULL,
                'oib' => NULL,
                'address' => $data['address'],
                'city' => $data['city'],
            ]);
            $user->attachRole($privateRole);

            $reg_user_config = Configuration::create();
            $reg_user_config->user()->associate($user);
            $reg_user_config->save();

            $subcategory1 = VehicleGroup::create([
                'name' => 'Management',
                'supercategory' => '3',
                'created_at' => now(),
                'updated_at' => now(),
                'configuration_id' => $reg_user_config->id,
            ]);

            $subcategory2 = VehicleGroup::create([
                'name' => 'Marketing',
                'supercategory' => '3',
                'created_at' => now(),
                'updated_at' => now(),
                'configuration_id' => $reg_user_config->id,
            ]);

            $subcategory3 = VehicleGroup::create([
                'name' => 'Sales',
                'supercategory' => '3',
                'created_at' => now(),
                'updated_at' => now(),
                'configuration_id' => $reg_user_config->id,
            ]);

            $subcategory4 = VehicleGroup::create([
                'name' => 'Logistic',
                'supercategory' => '3',
                'created_at' => now(),
                'updated_at' => now(),
                'configuration_id' => $reg_user_config->id,
            ]);

            $subcategory5 = VehicleGroup::create([
                'name' => 'Maintenance',
                'supercategory' => '3',
                'created_at' => now(),
                'updated_at' => now(),
                'configuration_id' => $reg_user_config->id,
            ]);

            $subcategory6 = VehicleGroup::create([
                'name' => 'Production',
                'supercategory' => '3',
                'created_at' => now(),
                'updated_at' => now(),
                'configuration_id' => $reg_user_config->id,
            ]);

            $redirect = 'http://Wine360.eu'; //change this field to app home page
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

            return $user;

        } else {
            return Redirect::back();
        }
    }
}
