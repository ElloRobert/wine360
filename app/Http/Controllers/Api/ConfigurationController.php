<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use File;
use App\Configuration;
use App\User;
use Redirect;
use Exception;
use Ultraware\Roles\Models\Role;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user_config = Configuration::where('user_id', Auth::id())->first();

        return response()->json($user_config);

        /*
        $user_config = Auth::user()->configuration;

        if ($user_config != null) {
           return response()->json($user_config);
        }

        return response()->json(null);
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        Configuration::updateOrCreate(
            [
                'user_id' => Auth::id()]
            ,
            [
                'applicationAddress' => $request->get('applicationAddress'),
                'applicationAddress2' => $request->get('applicationAddress2'),
                'applicationCity' => $request->get('applicationCity'),
                'applicationState' => $request->get('applicationState'),
                'applicationZip' => $request->get('applicationZip'),
                'applicationCountry' => $request->get('applicationCountry'),
                'applicationPhone' => $request->get('applicationPhone'),
                'applicationIndustry' => $request->get('applicationIndustry'),
                'applicationPricePerLiter' => $request->get('applicationPricePerLiter')
            ]
        );

        $msg = trans('default.successfulUpdateConfiguration');

        return response()->json($msg, 200, [], JSON_UNESCAPED_UNICODE);

        /*
        try{
            $user_config = Auth::user()->configuration;
            
            $user_config->update([
                'applicationAddress' => ($request->applicationAddress != '' ? $request->applicationAddress : null),
                'applicationAddress2' => ($request->applicationAddress2 != '' ? $request->applicationAddress2 : null),
                'applicationCity' => ($request->applicationCity != '' ? $request->applicationCity : null),
                'applicationState' => ($request->applicationState != '' ? $request->applicationState : null),
                'applicationZip' => ($request->applicationZip != '' ? $request->applicationZip : null),
                'applicationCountry' => ($request->applicationCountry != '' ? $request->applicationCountry : null),
                'applicationPhone' => ($request->applicationPhone != '' ? $request->applicationPhone : null),
                'applicationIndustry' => ($request->applicationIndustry != '' ? $request->applicationIndustry : null),
                'applicationPricePerLiter' => ($request->applicationPricePerLiter != '' ? $request->applicationPricePerLiter : null)
            ]);

            $msg = trans('default.successfulUpdateConfiguration');
            return response()->json($msg, 200, [], JSON_UNESCAPED_UNICODE);

        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
        */
    }



	/**
     * Employee list
     */
    public function employeeList(Request $request)
    {
    	if (Auth::user()->hasRole('legal')) {
			$employees_list = Auth::user()->legalEntityEmployees;
		} else if (Auth::user()->hasRole('employee')) {
			$employees_list = Auth::user()->legalEntityUser->legalEntityEmployees;
        } else {
			$employees_list = null;
		}

		return response()->json($employees_list);
    }



    /**
     * Insert employee
     */
    public function insertEmployee(Request $request)
    {
        try{
	    	$this->validate($request, [
	            'name' => 'required|max:255',
	            'email' => 'required|email|max:255|unique:users,email',
	            'password' => 'nullable|min:6',
	        ]);

            $employeeRole = Role::whereSlug('employee')->first();
            
            if ($request->reg_type == 3) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'address' => $request->address
                ]);

                $user->attachRole($employeeRole);
                
                $user->legalEntityUser()->associate(Auth::user());
                $user->save();

                $reg_user_config = Configuration::create();
                $reg_user_config->configuration()->associate($user);
                $reg_user_config->save();

                $msg = trans('default.successfulInsertEmployee'). ' '. $user->name;
                return response()->json($msg, 200, [], JSON_UNESCAPED_UNICODE);
                
            } else {
                return false;
            }
        } catch(\Exception $e) {
            return response()->json($e->getMessage());
        }

    }



    /**
     * Remove employee
     */
    // public function deleteEmployee($id){
    //     try {
    //         $employee_delete = User::findOrFail($id);

    //         $msg = trans('default.successfulDeleteEmployee') . ' ' . $employee_delete->name;

    //         $employee_delete->delete();

    //         return response()->json($msg, 200, [], JSON_UNESCAPED_UNICODE);

    //     }catch(\Exception $e){
    //     	return response()->json($e->getMessage());
    //     }
    // }
    /**
     * deactivate employee
     */
    public function deleteEmployee($id)
    {
        try {
            $employee_delete = User::findOrFail($id);

            $msg = trans('default.successfulDeleteEmployee') . ' ' . $employee_delete->name;

            $employee_delete->update([
                'activation' => 0
            ]);

            return response()->json($msg, 200, [], JSON_UNESCAPED_UNICODE);

        } catch(\Exception $e) {
            dump($e->getMessage());
            return Redirect::back();
        }
    }

    /**
     * activate employee
     */
    public function activateEmployee($id)
    {
        try {
            $employee_activate = User::findOrFail($id);

            $msg = trans('default.successfulActivateEmployee') . ' ' . $employee_activate->name;

            $employee_activate->update([
                'activation' => 1
            ]);

            return response()->json($msg, 200, [], JSON_UNESCAPED_UNICODE);

        } catch(\Exception $e) {
            dump($e->getMessage());
            return Redirect::back();
        }
    }



    /**
     * User setting details
     */
    public function userDetails()
    {
    	return response()->json(Auth::user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userDetailsUpdate(Request $request, $id)
    {
        try{
            $user = User::findOrFail($id);
            $current_user = Auth::user();

	        if ($user->email == $request->userEmail && $user->oib == $request->userOIB) {

	            if ($current_user->hasRole('employee')) {
	                $this->validate($request, [
	                    'userName' => 'required|max:255',
	                    'userEmail' => 'required|email|max:255',
	                    'userPassword' => 'nullable|min:6',
	                    'appLanguage' => 'required',
	                ]);
	            } else {
	                $this->validate($request, [
	                    'userName' => 'required|max:255',
	                    'userEmail' => 'required|email|max:255',
	                    'userPassword' => 'nullable|min:6',
	                    'appLanguage' => 'required',
	                ]);
	            }
	            
	        } else {
	            //dd('raz');

	            if ($current_user->hasRole('employee')) {
	                if ($user->email == $request->userEmail && $user->oib != $request->userOIB) {
	                    $this->validate($request, [
	                        'userName' => 'required|max:255',
	                        'userEmail' => 'required|email|max:255',
	                        'userPassword' => 'nullable|min:6',
	                        'userOIB' => 'nullable|min:11|max:11|unique:users,oib',
	                        'appLanguage' => 'required',
	                    ]);
	                } else if ($user->email != $request->userEmail && $user->oib == $request->userOIB) {
	                    $this->validate($request, [
	                        'userName' => 'required|max:255',
	                        'userEmail' => 'required|email|max:255|unique:users,email',
	                        'userPassword' => 'nullable|min:6',
	                        'userOIB' => 'nullable|min:11|max:11',
	                        'appLanguage' => 'required',
	                    ]);
	                } else {
	                    $this->validate($request, [
	                        'userName' => 'required|max:255',
	                        'userEmail' => 'required|email|max:255|unique:users,email',
	                        'userPassword' => 'nullable|min:6',
	                        'userOIB' => 'min:11|max:11|unique:users,oib',
	                        'appLanguage' => 'required',
	                    ]);
	                }
	            } else {
	                if ($user->email == $request->userEmail && $user->oib != $request->userOIB) {
	                    $this->validate($request, [
	                        'userName' => 'required|max:255',
	                        'userEmail' => 'required|email|max:255',
	                        'userPassword' => 'nullable|min:6',
	                        'userOIB' => 'required|min:11|max:11|unique:users,oib',
	                        'appLanguage' => 'required',
	                    ]);
	                } else if ($user->email != $request->userEmail && $user->oib == $request->userOIB) {
	                    $this->validate($request, [
	                        'userName' => 'required|max:255',
	                        'userEmail' => 'required|email|max:255|unique:users,email',
	                        'userPassword' => 'nullable|min:6',
	                        'userOIB' => 'required|min:11|max:11',
	                        'appLanguage' => 'required',
	                    ]);
	                } else {
	                    $this->validate($request, [
	                        'userName' => 'required|max:255',
	                        'userEmail' => 'required|email|max:255|unique:users,email',
	                        'userPassword' => 'nullable|min:6',
	                        'userOIB' => 'required|min:11|max:11|unique:users,oib',
	                        'appLanguage' => 'required',
	                    ]);
	                }
	            }
	        }

            if ($request->legal_entity_employee_permission == 'on') {
                $request->legal_entity_employee_permission = 1;
            } else {
                $request->legal_entity_employee_permission = 0;
            }

            if ($request->appLanguage != 'hr' && $request->appLanguage != 'en' && $request->appLanguage != 'de') {
                throw new Exception(trans('default.exceptionErrorLanguage'));
            }

            $user->update([
                'name' => $request->userName,
                'email' => $request->userEmail,
                'company' => $request->userCompany,
                'oib' => $request->userOIB,
                'city' => $request->userCity,
                'address' => $request->userAddress,
                'legal_entity_employee_permission' => $request->legal_entity_employee_permission,
                'appLanguage' => $request->appLanguage,
            ]);

            if ($request->userPassword != '') {
                $user->update([
                    'password' => bcrypt($request->userPassword),
                ]);
            }

            return response()->json(trans('user.userDetailsUpdate'), 200, [], JSON_UNESCAPED_UNICODE);

        } catch(\Exception $e) {
            return response()->json($e->getMessage());
        }
        
    }

    /**
     * Update user image
     */
    public function updateUserImage(Request $request)
    {
        try{
	        $this->validate($request, [
	            'headline-user-image' => 'required|mimes:jpeg,jpg,png,svg'
	        ]);

            $user = Auth::user();

            if ($user->image != NULL) {
                File::delete("img/userImage/{$user->image}");
            }

            $file = $request->file('headline-user-image');

            $file->move('img/userImage/', $file->getClientOriginalName());

            $user->update([
                'image' => $file->getClientOriginalName(),
            ]);

            $msg = trans('user.insertUserImage');
            return response()->json($msg, 200, [], JSON_UNESCAPED_UNICODE);

        } catch(\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove user image
     */
    public function removeUserImage(Request $request)
    {
        try{
            $user = Auth::user();

            if($user->image != NULL){
                File::delete("img/userImage/{$user->image}");

                $user->update([
                    'image' => NULL,
                ]);
            }
            $msg = trans('user.removeUserImage');
            return response()->json($msg, 200, [], JSON_UNESCAPED_UNICODE);

        } catch(\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
