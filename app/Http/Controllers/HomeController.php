<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Vehicle;
use App\Monitoring;
use App\Comment;
use App\CostType;
use App\Industry;
use App\Priority;
use App\RecurringReminder;
use App\Supplier;
use App\VehicleGroup;
use Carbon\Carbon;
use Ultraware\Roles\Models\Role;
use Response;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $priorities = Priority::all();
        $user = Auth::user();
   
        $recurring_reminders = RecurringReminder::all();
        return view('home', [
            'recurring_reminders' => $recurring_reminders,
            'priorities' => $priorities,
            'user' => $user,
        ]);
    }

    public function users(Request $request){
        $user = $request->user();

        if ($user->hasRole('legal')) {
            $employees = $user->legalEntityEmployees;
        } else if ($user->hasRole('employee')) {
            $employees = $user->legalEntityUser->legalEntityEmployees;
        }else if($user->hasRole('admin')){
            $employees = User::all();
        } else {
            $employees = collect();
        }

        list ($active_employees, $inactive_employees) = $employees->partition(function ($employee) {
            return (bool) $employee->is_active;
        });

   

        $priorities = Priority::all();
        $recurring_reminders = RecurringReminder::all();




        

        return view('users.index', [
            'active_employees' => $active_employees,
            'inactive_employees' => $inactive_employees,
           
            'priorities' => $priorities,
            'recurring_reminders' => $recurring_reminders,
        ]);
    }
    /**
     * Ajax configuration to get count of malfunction failed/pending
     */
    public function monitoringMalfunction(Request $request)
    {
        $user = $request->user();
        $user->load('vehicles.malfunctions');

        $malfunctions = $user->vehicles->flatMap(function ($vehicle) {
            return $vehicle->malfunctions;
        })->reject(function ($malfunction) {
            return $malfunction->isCompleted();
        });

        list(
            $malfunctions_failed_legal, $malfunctions_pending_legal
        ) = $malfunctions->partition(function ($malfunction) {
            return Carbon::parse($malfunction->end_date_reminder)->lt(Carbon::now());
        });

        return Response::json([
            'failed_count' => $malfunctions_failed_legal->count(),
            'pending_count' => $malfunctions_pending_legal->count()
        ]);
    }

    /**
     * Ajax configuration to get count of malfunction failed/pending
     */
    public function monitoringReminder(Request $request)
    {
        $user = $request->user();
        $user->load('vehicles.reminders');

        $reminders = $user->vehicles->flatMap(function ($vehicle) {
            return $vehicle->reminders;
        })->reject(function ($reminder) {
            return $reminder->isCompleted();
        });

        list(
            $reminders_failed_legal, $reminders_pending_legal
        ) = $reminders->partition(function ($reminder) {
            return Carbon::parse($reminder->end_date_reminder)->lt(Carbon::now());
        });

        return Response::json([
            'failed_count' => count($reminders_failed_legal),
            'pending_count' => count($reminders_pending_legal)
        ]);
    }

    /**
     * Ajax store monitoring
     */
    public function monitoringStore(Request $request)
    {
        $user = $request->user();

        $area_1 = $request->get('area_1');
        $area_2 = $request->get('area_2');

        $user->configuration->monitorings()->delete();

        if (empty($area_1) && empty($area_2)) {
            return 'success remove all';
        }

        //Insert monitoring area_1
        if (!empty($area_1)) {
            foreach ($area_1 as $value) {
                $data = explode('=', $value);

                $user->configuration->monitorings()
                    ->save(new Monitoring([
                        'type' => $data[0],
                        'position' => $data[1]
                    ]));
            }
        }

        //Insert monitoring area_2
        if (!empty($area_2)) {
            foreach ($area_2 as $value) {
                $data = explode('=', $value);

                $user->configuration->monitorings()
                    ->save(new Monitoring([
                        'type' => $data[0],
                        'position' => $data[1]
                    ]));
            }
        }
        return 'success';

    }

    /**
     * Remove user
     */
    public function deleteUser($id)
    {
        try {
            $user_delete = User::findOrFail($id);

            $msg = trans('messages.deleteEmployee') . '' . $user_delete->name;

            $user_delete->delete();

            return redirect()->route('home')->with('message', $msg);

        }catch(\Exception $e){
            // return response('', 500); //ModelNotFoundException
        }
    }
}
