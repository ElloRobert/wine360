<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reminder;
use App\Vehicle;
use Carbon\Carbon;
use Auth;
use Redirect;
use Exception;

class RemindersController extends Controller
{
    public function remindersList(Request $request)
    {
    	if($request->id && $request->id != ''){
            $vehicle = Vehicle::findOrFail($request->id);

            $vehicle_reminders = $vehicle->reminders()->orderBy('created_at', 'desc')->get();
        }else{
            if(Auth::user()->hasRole('admin'))
                $vehicles_list = Vehicle::all();
            else if(Auth::user()->hasAnyRole(['legal', 'private']))
                $vehicles_list = Auth::user()->vehiclesOwned;
            else if(Auth::user()->hasRole('employee'))
                $vehicles_list = Auth::user()->legalEntityUser->vehiclesOwned;


            $vehicle_reminders = [];
            foreach($vehicles_list as $v){
                foreach($v->reminders as $r){
                    array_push($vehicle_reminders, $r);
                }
            }
        }


        foreach($vehicle_reminders as $v){
            $v->push($v->reminders);
            $v->push($v->creator);
        }



        if(isset($request->page) && $request->page != ''){
            $page = $request->page*10;

            $vehicle_reminders_sorted = collect($vehicle_reminders)->sortBy(function($col){ 
                    return $col['created_at']; 
                }, SORT_REGULAR, SORT_DESC)->values()->all();

            $vehicle_reminders_results = array_slice($vehicle_reminders_sorted, $page-10, $page);

            return response()->json($vehicle_reminders_results);

        }else{
            return response()->json(collect($vehicle_reminders)->sortBy(function($col){ 
                    return $col['created_at']; 
                }, SORT_REGULAR, SORT_DESC)->values()->all()
            );
        }
    }



    /**
     * Store new reminder
     */
    public function store(Request $request){
        $this->validate($request, [
            'vl' => 'required',
            'reminder_name' => 'required',
            'reminder_details' => 'required',
            'reminder_date' => 'required',
        ]);

        try{
            $vehicle = Vehicle::findOrFail($request->vl);

            if(Auth::user()->hasAnyRole(['private', 'legal'])){

                if(Auth::user()->ownsVehicle($vehicle->id)){
                    
                    $category = '';
                    if($request->add_reminder_category != ''){
                        $category = $request->add_reminder_category;
                    }else if($request->add_reminder_category == '' && $request->reminder_category != ''){
                        $category = $request->reminder_category;
                    }

                    $reminder = Reminder::create([
                        'name' => $request->reminder_name,
                        'category' => $category,
                        'details' => $request->reminder_details,
                        'end_date_reminder' => Carbon::parse($request->get('reminder_date'))
                    ]);
                    $reminder->vehicle()->associate($vehicle);
                    $reminder->creator()->associate(Auth::User());
                    $reminder->save();

                }else{
                    throw new Exception(trans('default.notAllowedChooseVehicle'));
                }

            }else if(Auth::user()->hasRole('admin')){

                $category = '';
                if($request->add_reminder_category != ''){
                    $category = $request->add_reminder_category;
                }else if($request->add_reminder_category == '' && $request->reminder_category != ''){
                    $category = $request->reminder_category;
                }

                $reminder = Reminder::create([
                    'name' => $request->reminder_name,
                    'category' => $category,
                    'details' => $request->reminder_details,
                    'end_date_reminder' => Carbon::parse($request->get('reminder_date'))
                ]);
                $reminder->vehicle()->associate($vehicle);
                $reminder->creator()->associate(Auth::User());
                $reminder->save();

            }else if(Auth::user()->hasRole('employee')){
                if(Auth::user()->legalEntityUser->ownsVehicle($vehicle->id)){
                    
                    $category = '';
                    if($request->add_reminder_category != ''){
                        $category = $request->add_reminder_category;
                    }else if($request->add_reminder_category == '' && $request->reminder_category != ''){
                        $category = $request->reminder_category;
                    }

                    $reminder = Reminder::create([
                        'name' => $request->reminder_name,
                        'category' => $category,
                        'details' => $request->reminder_details,
                        'end_date_reminder' => Carbon::parse($request->get('reminder_date'))
                    ]);
                    $reminder->vehicle()->associate($vehicle);
                    $reminder->creator()->associate(Auth::User());
                    $reminder->save();

                }else{
                    throw new Exception(trans('default.notAllowedChooseVehicle'));
                }
            }

            $msg = trans('default.reminderCompleteStore');
            
            return response()->json($msg.' '.$reminder->name, 200, [], JSON_UNESCAPED_UNICODE);

        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }



    /**
     * Remider details
     */
    public function details(Request $request)
    {
    	$reminder = Reminder::findOrFail($request->id);

    	$reminder->push($reminder->vehicle);
        $reminder->push($reminder->creator);

        return response()->json($reminder);
    }



    /**
     * Update reminder
     */
    public function update($id, Request $request){
        $this->validate($request, [
            'vl' => 'required',
            'reminder_name' => 'required',
            'reminder_details' => 'required',
            'reminder_date' => 'required',
        ]);

        try{
            $vehicle = Vehicle::findOrFail($request->vl);
            $reminder = Reminder::findOrFail($id);
            $msg = trans('reminder.reminderCompleteUpdate');

            if(Auth::user()->hasAnyRole(['private', 'legal'])){

                if(Auth::user()->ownsVehicle($vehicle->id)){
                    
                    $category = '';
                    if($request->add_reminder_category != ''){
                        $category = $request->add_reminder_category;
                    }else if($request->add_reminder_category == '' && $request->reminder_category != ''){
                        $category = $request->reminder_category;
                    }

                    $reminder->update([
                        'name' => $request->reminder_name,
                        'category' => $category,
                        'details' => $request->reminder_details,
                        'end_date_reminder' => Carbon::parse($request->get('reminder_date'))
                    ]);

                    if($reminder->vehicle_id != $vehicle->id){
                        $reminder->vehicle()->dissociate();
                        $reminder->vehicle()->associate($vehicle);
                        $reminder->save();
                    }


                }else{
                    throw new Exception(trans('default.notAllowedChooseVehicle'));
                }

            }else if(Auth::user()->hasRole('admin')){

                $category = '';
                if($request->add_reminder_category != ''){
                    $category = $request->add_reminder_category;
                }else if($request->add_reminder_category == '' && $request->reminder_category != ''){
                    $category = $request->reminder_category;
                }

                

            }else if(Auth::user()->hasRole('employee')){
                if(Auth::user()->legalEntityUser->ownsVehicle($vehicle->id)){
                    
                    $category = '';
                    if($request->add_reminder_category != ''){
                        $category = $request->add_reminder_category;
                    }else if($request->add_reminder_category == '' && $request->reminder_category != ''){
                        $category = $request->reminder_category;
                    }

                    $reminder = Reminder::create([
                        'name' => $request->reminder_name,
                        'category' => $category,
                        'details' => $request->reminder_details,
                        'end_date_reminder' => Carbon::parse($request->get('reminder_date'))
                    ]);
                    $reminder->vehicle()->associate($vehicle);
                    $reminder->creator()->associate(Auth::User());
                    $reminder->save();

                }else{
                    throw new Exception(trans('default.notAllowedChooseVehicle'));
                }
            }

            return response()->json($msg.' '.$reminder->name, 200, [], JSON_UNESCAPED_UNICODE);

        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }



    /**
     * Complete reminder with current date
     */
    public function completeReminder(Request $request){
        try{
            $reminder = Reminder::findOrFail($request->r);

            //If status is not completed
            if(!$reminder->isCompleted()){
                if(Auth::user()->hasAnyRole(['private', 'legal'])){

                    if(Auth::user()->ownsVehicle($reminder->vehicle_id)){
                        
                        $reminder->update([
                            'completed_date' => Carbon::now(),
                            'status' => 1
                        ]);

                    }else{
                        throw new Exception(trans('default.notAllowedToCompleteReminder'));
                    }

                }else if(Auth::user()->hasRole('admin')){

                    $reminder->update([
                        'completed_date' => Carbon::now(),
                        'status' => 1
                    ]);

                }else if(Auth::user()->hasRole('employee')){

                    if(Auth::user()->legalEntityUser->ownsVehicle($reminder->vehicle_id)){

                        $reminder->update([
                            'completed_date' => Carbon::now(),
                            'status' => 1
                        ]);

                    }else{
                        throw new Exception(trans('default.notAllowedToCompleteReminder'));
                    }

                }
            }else{
                throw new Exception(trans('default.reminderAlreadyCompleted'));
            }

            return response()->json(trans('default.reminderComplete'), 200, [], JSON_UNESCAPED_UNICODE);

        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }



    /**
     * Delete reminder
     */
    public function delete($id){
        try{

            $reminder = Reminder::findOrFail($id);

            if(Auth::user()->hasAnyRole(['private', 'legal'])){

                    if(Auth::user()->ownsVehicle($reminder->vehicle_id)){
                        
                        $msg = trans('reminder.deleteReminderMsg_1').' '.$reminder->name.' '.trans('reminder.deleteReminderMsg_2');
                        $reminder->delete();

                        return redirect()->route('reminders.index')->with('message-delete', $msg);

                    }else{
                        throw new Exception(trans('default.notAllowedToDeleteReminder'));
                    }

                }else if(Auth::user()->hasRole('admin')){


                    $msg = trans('reminder.deleteReminderMsg_1').' '.$reminder->name.' '.trans('reminder.deleteReminderMsg_2');
                    $reminder->delete();

                    return redirect()->route('reminders.index')->with('message-delete', $msg);


                }else if(Auth::user()->hasRole('employee')){

                    if(Auth::user()->legalEntityUser->ownsVehicle($reminder->vehicle_id) && $reminder->creator_id == Auth::user()->id){

                        $msg = trans('reminder.deleteReminderMsg_1').' '.$reminder->name.' '.trans('reminder.deleteReminderMsg_2');
                        $reminder->delete();

                        return redirect()->route('reminders.index')->with('message-delete', $msg);

                    }else{
                        throw new Exception(trans('default.notAllowedToDeleteReminder'));
                    }

                }

        }catch(\Exception $e){
            dump($e->getMessage());
            return Redirect::back();
        }
    }



}
