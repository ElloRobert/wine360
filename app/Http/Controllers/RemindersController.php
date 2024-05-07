<?php

namespace App\Http\Controllers;

use App\Category;
use App\Configuration;
use App\CostType;
use Illuminate\Http\Request;
use App\Reminder;
use App\Vehicle;
use Carbon\Carbon;
use Redirect;
use App\Mail\RemindersMail;
use App\Priority;
use App\RecurringReminder;
use App\Supplier;
use App\User;
use App\VehicleGroup;
use Illuminate\Support\Facades\Auth;

class RemindersController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        if($user->hasRole('admin')){
            $configurations = Configuration::all();
        }else{
            $configurations = null;
        }
        $priorities  = Priority::all();
        $recurring_reminders  = RecurringReminder::all();
        return view('reminder.index', [
            'configurations' => $configurations,
            'priorities' => $priorities,
            'recurring_reminders' => $recurring_reminders,
        ]);
    }

    /**
     * Store new reminder
     */
    public function store(Request $request)
    {  
       
       
        $this->validate($request, [
            'reminder_name' => 'required',
            'reminder_details' => 'required',
            'reminder_date' => 'required',
        ]);
        
        $user = $request->user();
      
       
        $category = $request->get('add_reminder_category') ?: $request->get('reminder_category');
        $reminder = Reminder::create([
            'name' => $request->get('reminder_name'),
            'category' => 1,
            'details' => $request->get('reminder_details'),
            'end_date_reminder' => Carbon::parse($request->get('reminder_date')),
            'creator_id' => $user->id,
            'reminder_priority' => $request->get('reminder_priority'),
            'recurring_reminder_id' => $request->recurring_reminder_id
        ]);
         $reminder->save();
         //dd($reminder);
        $msg = trans('default.reminderCompleteStore');
        return Redirect::back()->with('message-success',$msg.' '.$reminder->name);
    }

    /**
     * Edit view for reminder
     */
    public function edit(Request $request)
    {
        $reminder = Reminder::with('vehicles')->findOrFail($request->id);
        $user = Auth::user();
        if($reminder->reminder_priority != null){
            $reminderPriority = $reminder->reminder_priority;
        }else{
            $reminderPriority = null;
        }

  
    	return $reminder;
    }

    /**
     * Update reminder
     */
    public function update($id, Request $request)
    {
       // dd($request->all());
        $this->validate($request, [
            'vl' => 'required|exists:vehicles,id',
            'edit_reminder_name' => 'required',
            'editReminderDetails' => 'required',
            'edit_reminder_date' => 'required',
        ]);

        $user = $request->user();

        $reminder = Reminder::find($id);
        if (!$reminder instanceof Reminder) {
            // TODO: dodati prikaz 'message-error' iz sesije u view i prijevode za 'Reminder not found'
            return Redirect::back()->with('message-error', 'Reminder not found');
        }

        $msg = trans('reminder.reminderCompleteUpdate');

        if ($user->hasAnyRole(['private', 'legal'])) {
            if (!$user->ownsVehicle($request->get('vl'))) {
                // TODO: dodati prikaz 'message-error' iz sesije u view
                return Redirect::back()->with('message-error', trans('default.notAllowedChooseVehicle'));
            }
        } else if ($user->hasRole('employee')) {
            if (!$user->legalEntityUser->ownsVehicle($request->get('vl'))) {
                // TODO: dodati prikaz 'message-error' iz sesije u view
                return Redirect::back()->with('message-error', trans('default.notAllowedChooseVehicle'));
            }
        }

        $category = $request->get('_editadd_reminder_category') ?: $request->get('edit_reminder_category');

        $reminder->update([
            'name' => $request->get('edit_reminder_name'),
            'category' => $category,
            'details' => $request->get('editReminderDetails'),
            'end_date_reminder' => Carbon::parse($request->get('edit_reminder_date')),
            'reminder_priority' => $request->get('editReminderPriority'),
            'recurring_reminder_id' => $request->edit_recurring_reminder_id,
            'category' => $request->edit_add_reminder_category
        ]);

         
        // Prvo obrišite sve postojeće veze
        $reminder->vehicles()->detach();

        // Dodajte nove veze
        $reminder->vehicles()->sync($request->vl);

        return Redirect::back()->with('message-update', $msg . ' ' .$reminder->name);
       
    }

    /**
     * Ajax complete reminder with current date
     */
    public function completeReminder($id, Request $request)
    {
       
        $this->validate($request, [
             'r' => 'required|exists:reminders,id'
        ]);

        $user = $request->user();

        $reminder = Reminder::find($request->get('r'));

        //If status is not completed
        if ($reminder->status == 2) {
            return [
                'success' => false,
                'text' => trans('default.notAllowedToCompleteReminder')
            ];
        }

        if ($user->hasAnyRole(['private', 'legal'])) {
            if (!$user->ownsVehicle($reminder->vehicle_id)) {
                return [
                    'success' => false,
                    'text' => trans('default.notAllowedToCompleteReminder')
                ];
            }
        } else if ($user->hasRole('employee')) {
            if (!$user->legalEntityUser->ownsVehicle($reminder->vehicle_id)) {
                return [
                    'success' => false,
                    'text' => trans('default.notAllowedToCompleteReminder')
                ];
            }
        }
        $reminder->update([
            'completed_date' => Carbon::now(),
            'status' => $reminder->status + 1,
        ]);
        return ['success' => true, 'text' => trans('default.reminderComplete')];
    }

    public function delete($id, Request $request)
    {
        $user = $request->user();

        $reminder = Reminder::find($id);
        if (!$reminder instanceof Reminder) {
            // TODO: dodati prikaz 'message-error' iz sesije u view i prijevode za 'Reminder not found'
            return Redirect::back()->with('message-error', 'Reminder not found');
        }

        if ($user->hasAnyRole(['private', 'legal'])) {
            if (!$user->ownsVehicle($reminder->vehicle_id)) {
                // TODO: dodati prikaz 'message-error' iz sesije u view
                return Redirect::back()->with('message-error', trans('default.notAllowedToDeleteReminder'));
            }

            $msg = trans('reminder.deleteReminderMsg_1') . ' ' . $reminder->name . ' ' . trans('reminder.deleteReminderMsg_2');
            $reminder->delete();

            return Redirect::route('reminders.index')->with('message-delete', $msg);
        } else if ($user->hasRole('admin')) {
            $msg = trans('reminder.deleteReminderMsg_1') . ' ' . $reminder->name . ' ' . trans('reminder.deleteReminderMsg_2');
            $reminder->delete();

            return Redirect::route('reminders.index')->with('message-delete', $msg);
        } else if ($user->hasRole('employee')) {
            if ($user->legalEntityUser->ownsVehicle($reminder->vehicle_id) && $reminder->creator_id == $user->id) {
                $msg = trans('reminder.deleteReminderMsg_1') . ' ' . $reminder->name . ' ' . trans('reminder.deleteReminderMsg_2');
                $reminder->delete();

                return Redirect::route('reminders.index')->with('message-delete', $msg);
            } else {
                // TODO: dodati prikaz 'message-error' iz sesije u view
                return Redirect::back()->with('message-error', trans('default.notAllowedToDeleteReminder'));
            }
        }
    }

    public function cronSendMail()
    {
        $reminders = \DB::table('reminders')
            ->select('users.name as creatorName', 'users.email as creatorEmail', 'vehicles.name as vehicleName', 'reminders.*',\DB::raw('DATE_ADD(reminders.end_date_reminder, INTERVAL -1 HOUR) as end_date_sub_hour'))
            ->join('vehicles', 'reminders.vehicle_id', '=', 'vehicles.id')
            ->join('users', 'reminders.creator_id', '=', 'users.id')
            ->where('end_date_reminder', '<=', Carbon::now()->toDateTimeString())
            ->orWhere(\DB::raw('DATE_ADD(reminders.end_date_reminder, INTERVAL -1 HOUR)'), '<=', Carbon::now()->toDateTimeString())
            ->where('status', 0)
            ->where('cron_mail', 0)
            ->get();
        //dd($reminders);

        foreach ($reminders as $key => $value) {
            $reminder = Reminder::findOrFail($value->id);
            if ($reminder->cron_mail == 0) {
                \Mail::to($value->creatorEmail)->send(new RemindersMail($value));
                
                $reminder->update(['cron_mail' => 1]);
            }   
        }

        RemindersMail::send('reminder.mail', ['title' => 'test', 'content' => 'test'], function ($message)
           {
               $message->from('damir.majer91@gmail.com', 'Damir Majer');
               $message->to('damir@ofir.hr');
           });
    
    }

    public function getReminders(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'vehicle_image_position',
            3 => 'end_date_reminder',
            4 => 'malfunction_priority',
            5 => 'status',
            6 => 'Opcije'
        );
    
        $user = Auth::user();
        
        if ($user->hasRole('admin')) {
            $users_list = User::all();
        } else if ($user->hasAnyRole(['legal', 'private'])) {
            $configuration = Configuration::find($user->companyConfiguration->id);
            $users_list = $configuration->users;
        } else if ($user->hasRole('employee')) {
            $users_list = $user->id;
        } else {
            $users_list = collect();
        }

        $query = Reminder::query()
                            ->leftJoin('reminder_vehicle', 'reminder_vehicle.reminder_id', '=', 'reminders.id')
                            ->leftJoin('users as creators', 'creators.id', '=', 'reminders.creator_id')
                            ->whereIn('reminders.creator_id', $users_list->pluck('id'))
                            ->select(
                                'reminders.*',
                                'creators.name as creator_name'
                            );

        $totalData = $query->count();
    
        $totalFiltered = $totalData;
    
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
    
        $search = $request->input('search.value');
    
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('reminders.name', 'LIKE', "%{$search}%")
                    ->orWhereHas('vehicles', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhere('reminders.end_date_reminder', 'LIKE', "%{$search}%")
                    ->orWhere('reminders.reminder_priority', 'LIKE', "%{$search}%");
            });
        
            $totalFiltered = $query->count();
            $reminder = $query;
        } else {
            $reminder = $query->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir);
        }
      
        $grupaFilter = $request->grupaFilter;
        //Filteri
		 if (!empty($grupaFilter)) {
		 	$reminder->where('vehicle_group_id', $grupaFilter);
		 }
       
		$podkategorijaFilter = $request->subcategoryFilter;
		 if (!empty($podkategorijaFilter)) {
		 	$reminder->where('vehicles.subcategory_id', $podkategorijaFilter);
		 }

		 $voziloFilter = $request->voziloFilter;
		 if (!empty($voziloFilter)) {
	     	$reminder->where('vehicles.id', $voziloFilter);
		 }

         $reminders = $reminder
         ->groupBy('id') 
         ->get();
        
        
        $data = array();

        foreach ($reminders as $reminder) {
            
            $nestedData = array();
            $nestedData[] = $reminder->name ?? '-';
            $nestedData[] = $reminder->name ?? '-';
            $nestedData[] = $reminder->name ?? '-';
            $nestedData[] = $reminder->end_date_reminder ? $reminder->end_date_reminder->format('d.m.Y') : '-';
            $priority = $reminder->priority->id ?? '-';
            $statusClass = '';
        
            switch ($priority) {
                case 1:
                    $statusClass = 'status-failed';
                    break;
                case 2:
                    $statusClass = 'status-pending';
                    break;
                case 3:
                    $statusClass = 'status-complete';
                    break;
                default:
                    $statusClass = ''; 
                    break;
            }
        
            $nestedData[] = '<span style="display: inline-block;">' . ($reminder->priority->name ?? '-') . '</span> <div class="' . $statusClass . '" style="display: inline-block;"></div>';
        
            // Modify the status condition based on your Reminder model
            if ($reminder->status == 0) {
                $nestedData[] = '<button onclick="changeStatus(' . $reminder->id . ')" class="complete-reminder btn btn-primary">
                                    Priprema
                                </button>';
            } else if ($reminder->status == 1) {
                $nestedData[] = '<button onclick="changeStatus(' . $reminder->id . ')" class="complete-reminder btn btn-warning">
                                    U tijeku
                                </button>';
            } else if ($reminder->status == 2) {
                $nestedData[] = '<button onclick="changeStatus(' . $reminder->id . ')" class="complete-reminder btn btn-success">
                                    Završeno
                                </button>';
            }
        
            $nestedData[] = '<div class="equal-size-buttons">
                                <button onclick="editReminder(' . $reminder->id . ')" class="btn" id="openEditMaintenanceModal" title="Uredi">
                                    <img src="' . asset('img/interface/uredi.svg') . '">
                                </button>
                                <button onclick="deleteReminder(' . $reminder->id . ')" class="btn" title="Obriši">
                                    <img src="' . asset('img/interface/kanta.svg') . '" >
                                </button>
                            </div>';
        
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

    public function getReminder(Request $request)
    {
        try {
            $reminder = Reminder::findOrFail($request->id);

            if ($reminder->status < 2) {
                $reminder->status = $reminder->status + 1;
                
                // Set the currently authenticated user as the completed user
                // if($malfunction->status == 2){
                //     $malfunction->completedUserMalfunction()->associate(Auth::user());
                // }
                
            }

            $reminder->save();

            // Return data in JSON format
            return response()->json(['reminder' => $reminder]);

        } catch (\Exception $e) {
            // In case of an error, return the appropriate status and message
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
