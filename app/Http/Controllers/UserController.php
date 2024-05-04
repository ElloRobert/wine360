<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\CostType;
use Illuminate\Http\Request;
use App\User;
use App\Mail\EmployeeLoginMail;
use App\Priority;
use App\RecurringReminder;
use App\Supplier;
use App\Vehicle;
use App\VehicleCategory;
use App\VehicleGroup;
use App\VehicleProperty;
use App\VehicleStatus;
use Auth;
use File;
use Ultraware\Roles\Models\Role;
use Response;
use Redirect;
use Exception;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Update user image
     */
    public function updateUserImage(Request $request)
    {
        $this->validate($request, [
            'headline-user-image' => 'required|mimes:jpeg,jpg,png,svg|max:150'
        ]);

        $user = $request->user();

        $path = 'img/userImage/';
        $old_img_path = "{$path}{$user->image}";

        if (File::exists($old_img_path)) {
            File::delete($old_img_path);
        }

        $file = $request->file('headline-user-image');

        $file->move($path, $file->getClientOriginalName());

        $user->update([
            'image' => $file->getClientOriginalName(),
        ]);

        return Redirect::back();
    }

    /**
     * Remove user image
     */
    public function removeUserImage(Request $request)
    {
        $user = $request->user();

        $path = 'img/userImage/';

        $old_img_path = "{$path}{$user->image}";

        if (File::exists($old_img_path)) {
            File::delete($old_img_path);
            $user->update(['image' => null]);
        }

        return Redirect::back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $current_user = Auth::user();

        if ($current_user->hasRole('legal')) {
            $user_list_driver = $current_user->legalEntityEmployees;
        } else if ($current_user->hasRole('employee')) {
            $user_list_driver = $current_user->legalEntityUser->legalEntityEmployees;
        } else {
            $user_list_driver = User::all();
        }  

     
        $priorities = Priority::all();


        if (!$user instanceof User) {
            return Redirect::back();
        }

        $recurring_reminders = RecurringReminder::all();

        return view('user.edit', [
            'user' => $user,
            'user_list_driver' => $user_list_driver,
            'priorities' => $priorities,
            'recurring_reminders' => $recurring_reminders,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        if (User::findOrFail($id)->email == $request->userEmail &&
            User::findOrFail($id)->oib == $request->userOIB) {

            if (Auth::user()->hasRole('employee')) {
                $this->validate($request, [
                    'userName' => 'required|max:255',
                    'userEmail' => 'required|email|max:255',
                    'userPassword' => 'nullable|min:6',
                    'appLanguage' => 'required',
                ]);
             }else {
                $this->validate($request, [
                    'userName' => 'required|max:255',
                    'userEmail' => 'required|email|max:255',
                    'userPassword' => 'nullable|min:6',
                    'appLanguage' => 'required',
                ]);
            }
            
        } else {
            //dd('raz');

            if (Auth::user()->hasRole('employee')) {
                if (User::findOrFail($id)->email == $request->userEmail && User::findOrFail($id)->oib != $request->userOIB) {
                    $this->validate($request, [
                        'userName' => 'required|max:255',
                        'userEmail' => 'required|email|max:255',
                        'userPassword' => 'nullable|min:6',
                        'userOIB' => 'nullable|min:11|max:11|unique:users,oib',
                        'appLanguage' => 'required',
                    ]);
                } else if (User::findOrFail($id)->email != $request->userEmail && User::findOrFail($id)->oib == $request->userOIB) {
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
                if (User::findOrFail($id)->email == $request->userEmail && User::findOrFail($id)->oib != $request->userOIB) {
                    $this->validate($request, [
                        'userName' => 'required|max:255',
                        'userEmail' => 'required|email|max:255',
                        'userPassword' => 'nullable|min:6',
                        'userOIB' => 'required|min:11|max:11|unique:users,oib',
                        'appLanguage' => 'required',
                    ]);
                } else if (User::findOrFail($id)->email != $request->userEmail && User::findOrFail($id)->oib == $request->userOIB) {
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

        try {
            $user = User::findOrFail($id);

            if ($request->get('legal_entity_employee_permission') == 'on') {
                $request->legal_entity_employee_permission = 1;
            } else {
                $request->legal_entity_employee_permission = 0;
            }

            if (!in_array($request->get('appLanguage'), ['hr', 'en', 'de'])) {
                throw new Exception(trans('default.exceptionErrorLanguage'));
            }

            $user->update([
                'name' => $request->get('userName'),
                'email' => $request->get('userEmail'),
                'company' => $request->get('userCompany'),
                'company_oib' => $request->get('userCompanyOib'),
                'oib' => $request->get('userOIB'),
                'city' => $request->get('userCity'),
                'address' => $request->get('userAddress'),
                'legal_entity_employee_permission' => $request->get('legal_entity_employee_permission'),
                'appLanguage' => $request->get('appLanguage'),
            ]);

            if (!empty($request->get('userPassword'))){
                $user->update([
                    'password' => bcrypt($request->get('userPassword')),
                ]);
            }

        } catch (\Exception $e) {
            dump($e->getMessage());
        }

        return Redirect::back();
    }

    /**
     * Insert employee
     */
    public function insertEmployee(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $request->user_id, // Dodana izmjena za unique pravilo
            'password' => $request->user_id ? 'nullable|min:6' : 'required|min:6',
        ]);
    
        // Provjera uloge prijavljenog korisnika
        $loggedInUser = $request->user();
        if (!$loggedInUser->hasRole(['admin', 'legal'])) {
            abort(403, 'Unauthorized action.');
        }
    
        $employeeRole = Role::whereSlug('employee')->first();
    
        // Ako user_id nije null, pokušajte ažurirati postojećeg korisnika
        if (!is_null($request->user_id)) {
            $user = User::findOrFail($request->user_id);
    
            // Ažurirajte podatke
            $user->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
                'oib' => $request->get('oib'),
                'address' => $request->get('address'),
            ]);
    
            $msg = trans('default.successfulUpdateEmployee') . ' ' . $user->name;
        } else {
            // Ako user_id je null, stvorite novog korisnika
            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
                'company' => Auth::user()->company,
                'oib' => $request->get('oib'),
                'address' => $request->get('address'),
                'legal_entity_user_id' => $loggedInUser->id,
                'is_active' => 1,
                'configuration_id' => Auth::user()->configuration()->first()->id,
            ]);
    

            $loggedInUserConfiguration = $loggedInUser->configuration()->first();
            if ($loggedInUserConfiguration) {
                $user->configuration()->create($loggedInUserConfiguration->toArray());
            }
    
            $user->attachRole($employeeRole);
    
            $msg = trans('default.successfulInsertEmployee') . ' ' . $user->name;
        }
    
        return Redirect::back()->with('message-add-employee', $msg);
    }

    /**
     * Remove employee
     */
    public function deleteEmployee($id)
    {
        $employee = User::find($id);

        if (!$employee instanceof User) {
            return Redirect::back();
        }

        $msg = trans('default.successfulDeleteEmployee') . ' ' . $employee->name;

        $employee->update([
            'is_active' => 0
        ]);

        return Redirect::back()->with('message-delete-employee', $msg);
    }

    /**
     * Remove employee
     */
    public function activateEmployee($id)
    {
        $employee = User::find($id);

        if (!$employee instanceof User) {
            return Redirect::back();
        }

        $msg = trans('default.successfulActivateEmployee') . ' ' . $employee->name;

        $employee->update([
            'is_active' => 1
        ]);

        return Redirect::back()->with('message-activate-employee', $msg);
    }

    /**
     * Admin edit user
     */
    public function adminEditUser(Request $request)
    {
        $user = User::find($request->id);

        if (!$user instanceof User) {
            return Redirect::route('home');
        }

        $roles = Role::get(['id', 'name', 'slug']);

        return  [
            'user' => $user,
            'roles' => $roles
        ];
    }

    /**
     * Admin edit user role
     */
    public function adminEditUserRole($id, Request $request)
    {
       
        $this->validate($request, [
            'u_role' => 'required|exists:roles,id'
        ]);

        $user = User::find($id);
        $role = Role::find($request->get('u_role'));

        if (!$user instanceof User || !$role instanceof Role) {
            return Response::make('', 404);
        }

        $user->roles()->sync([$role->id]);

        

        return Response::make('', 200);
    }

    public function adminDeleteUser($id)
    {
        $user = User::find($id);

        if (!$user instanceof User) {
            return Redirect::back();
        }

        $msg = trans('user.deleteUserMsg_1').' '.$user->name.' '.trans('user.deleteUserMsg_2');
        $user->delete();

        return Redirect::back()->with('message', $msg);
    }

    public function adminArchiveUser($id)
    {
        $user = User::find($id);

        if (!$user instanceof User) {
            return Redirect::back();
        }

        $msg = trans('user.deleteUserMsg_1').' '.$user->name.' '.trans('user.deleteUserMsg_3');
        $user->is_active = 0;
        $user->save();

        return Redirect::back()->with('message', $msg);
    }

    public function adminActivateUser($id)
    {
        $user = User::find($id);

        if (!$user instanceof User) {
            return Redirect::back();
        }

        $msg = trans('user.deleteUserMsg_1').' '.$user->name.' '.trans('user.deleteUserMsg_3');
        $user->is_active = 1;
        $user->save();

        return Redirect::back()->with('message', $msg);
    }

    public function getActiveUsers(Request $request)
    {
        $columns = array(
            0 => 'name',
            1 => 'address',
            2 => 'email',
            3 => 'Opcije',
        );
    
        $user = Auth::user();
        $current_user = Auth::user();
    
        if ($user->hasRole('legal')) {
            $query = User::query()->where('is_active', 1)
                ->whereIn('id', $user->legalEntityEmployees->pluck('id'));
        } else if ($user->hasRole('employee')) {
            $query = User::query()->where('is_active', 1)
                ->whereIn('id', $user->legalEntityUser->legalEntityEmployees->pluck('id'));
        } else if ($user->hasRole('admin')) {
            $query = User::query()->where('is_active', 1);
        } else {
            $query = User::query()->where('id', 0); 
        }
    
        $totalData = $query->count();
        $totalFiltered = $totalData;
    
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
    
        $search = $request->input('search.value');
    
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('address', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            });
    
            $totalFiltered = $query->count();
        }
    
        $users = $query->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->groupBy('id')
            ->paginate($limit); // Koristi paginate() umjesto get()
    
        $data = array();
    
        foreach ($users as $user) {
            $nestedData = array();
            $nestedData[] = $user->name ?? '-';
            $nestedData[] = $user->address ?? '-';
            $nestedData[] = $user->email ?? '-';
            if($current_user->hasRole('admin|private|legal')){
                $nestedData[] = '
                    <div class="equal-size-buttons">
                        <button onclick="editUser(' . $user->id . ')" class="btn" id="openEditMaintenanceModal" title="Uredi">
                            <img src="' . asset('img/interface/uredi.svg') . '">
                        </button>
                        <button onclick="deleteUser(' . $user->id . ')" class="btn" title="Obriši">
                            <img src="' . asset('img/interface/kanta.svg') . '" >
                        </button>
                        <button onclick="archiveUser(' . $user->id . ')" class="btn" title="Arhiviraj">
                            <img src="' . asset('img/interface/arhiviraj.svg') . '" >
                        </button>
                    </div>';
            }else{
                $nestedData[] = '-';
            }
    
            $data[] = $nestedData;
        }
    
        $jsonData = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
    
        return response()->json($jsonData);
    }
    

    public function getInactiveUsers(Request $request)
    {
        $columns = array(
            0 => 'name',
            1 => 'address',
            2 => 'email',
            3 => 'Opcije',
        );

        $user = Auth::user();
        $current_user = Auth::user();

        if ($user->hasRole('legal')) {
            $query = User::query()->where('is_active', 0)
                ->whereIn('id', $user->legalEntityEmployees->pluck('id'));
        } else if ($user->hasRole('employee')) {
            $query = User::query()->where('is_active', 0)
                ->whereIn('id', $user->legalEntityUser->legalEntityEmployees->pluck('id'));
        } else if ($user->hasRole('admin')) {
            $query = User::query()->where('is_active', 0);
        } else {
            $query = User::query()->where('id', 0); // Dohvati prazan rezultat ako korisnik nema ulogu
        }

        $totalData = $query->count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $search = $request->input('search.value');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('address', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            });

            $totalFiltered = $query->count();
        }

        $users = $query->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->groupBy('id')
            ->paginate($limit);

        $data = array();

        foreach ($users as $user) {
            $nestedData = array();
            $nestedData[] = $user->name ?? '-';
            $nestedData[] = $user->address ?? '-';
            $nestedData[] = $user->email ?? '-';
            if($current_user->hasRole('admin|private|legal')){
                $nestedData[] = '
                    <div class="equal-size-buttons">
                        <button onclick="editUser(' . $user->id . ')" class="btn" id="openEditMaintenanceModal" title="Uredi">
                            <img src="' . asset('img/interface/uredi.svg') . '">
                        </button>
                        <button onclick="deleteUser(' . $user->id . ')" class="btn" title="Obriši">
                            <img src="' . asset('img/interface/kanta.svg') . '" >
                        </button>
                        <button onclick="activateUser(' . $user->id . ')" class="btn" title="Vrati u aktivne">
                            <img src="' . asset('img/interface/aktiviraj.svg') . '" >
                        </button>
                    </div>';
            }else{
                $nestedData[] = '-';
            }

            $data[] = $nestedData;
        }

        $jsonData = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );

        return response()->json($jsonData);
    }




}