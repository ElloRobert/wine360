<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Exception;
use Redirect;
use App;
use DB;
use App\WorkOrder;
use App\Vehicle;
use App\User;

class WorkOrderController extends Controller
{
    /**
	 * Vehicle details page
	 * Content append inside div #vehicle-malfunctions
	 */
    public function vehicleListWorkOrders(Request $request)
    {

        if($request->vehicle_id && $request->vehicle_id != ''){
            $vehicle = Vehicle::findOrFail($request->vehicle_id);

            if($request->filler_id && $request->filler_id != ''){
                $vehicle_work_orders = $vehicle->workOrders()->where('creator_id', $request->filler_id)->orderBy('created_at', 'desc')->get();
            }else{
                $vehicle_work_orders = $vehicle->workOrders()->orderBy('created_at', 'desc')->get();
            }
            
        }else if($request->filler_id && $request->filler_id != ''){
            $vehicle_work_orders = WorkOrder::where('creator_id', $request->filler_id)->orderBy('created_at', 'desc')->get();
        }else{
            if(Auth::user()->hasRole('admin'))
                $vehicles_list = Vehicle::all();
            else if(Auth::user()->hasAnyRole(['legal', 'private']))
                $vehicles_list = Auth::user()->vehiclesOwned;
            else if(Auth::user()->hasRole('employee'))
                $vehicles_list = Auth::user()->legalEntityUser->vehiclesOwned;

            $vehicle_work_orders = [];
            foreach($vehicles_list as $v){
                foreach($v->workOrders as $wo){
                    array_push($vehicle_work_orders, $wo);
                }
            }
        }

        foreach($vehicle_work_orders as $v){
            $v->push($v->creator);
            $v->push($v->vehicle);
        }

        if(isset($request->page) && $request->page != ''){
            $page = $request->page*10;

            $vehicle_work_order_sorted = collect($vehicle_work_orders)->sortBy(function($col){ 
                    return $col['created_at']; 
                }, SORT_REGULAR, SORT_DESC)->values()->all();

            $vehicle_work_order_results = array_slice($vehicle_work_order_sorted, $page-10, $page);

            return response()->json($vehicle_work_order_results);

        }else{
            return response()->json(collect($vehicle_work_orders)->sortBy(function($col){ 
                    return $col['created_at']; 
                }, SORT_REGULAR, SORT_DESC)->values()->all()
            );
        }


    }



    /**
     * Work order details
     */
    public function details(Request $request)
    {
        $wo = WorkOrder::findOrFail($request->id);
        $wo->push($wo->creator);
        $wo->push($wo->vehicle);

        return response()->json($wo);
    }



    /**
     * Insert work order
     */
    public function store(Request $request){

        $this->validate($request, [
            'order_creator_id' => 'required|numeric',
            'order_date' => 'required',
            'order_relation' => 'required',
            'vl' => 'required',
            'order_kilometers_before' => 'required|numeric',
            'order_kilometers_after' => 'required|numeric',
            'order_visit_time' => 'required',
            'order_kilometers_traveled' => 'required|numeric',
        ]);

        try{
            /**
             *  Check if user owns vehicle by $request->vl
             */
            $vehicle = Vehicle::findOrFail($request->vl);

            if(Auth::user()->hasRole('private')){

                if(Auth::user()->vehiclesOwned->first()->id == $vehicle->id){
                    
                    $wo = WorkOrder::create([
                        'date' => $request->order_date,
                        'relation' => $request->order_relation,
                        'kilometers_before' => $request->order_kilometers_before,
                        'kilometers_after' => $request->order_kilometers_after,
                        'visit_time' => $request->order_visit_time,
                        'kilometers_traveled' => $request->order_kilometers_traveled,
                        'remark' => $request->order_remark,
                    ]);

                    $wo->creator()->associate(Auth::user());
                    $wo->vehicle()->associate($vehicle);
                    $wo->save();

                }else{
                    throw new Exception(trans('default.notAllowedChooseVehicle'));
                }
                

            }else if(Auth::user()->hasRole('legal')){
                

                if(Auth::user()->ownsVehicle($vehicle->id)){

                    $wo = WorkOrder::create([
                        'date' => $request->order_date,
                        'relation' => $request->order_relation,
                        'kilometers_before' => $request->order_kilometers_before,
                        'kilometers_after' => $request->order_kilometers_after,
                        'visit_time' => $request->order_visit_time,
                        'kilometers_traveled' => $request->order_kilometers_traveled,
                        'remark' => $request->order_remark,
                    ]);

                    $creator_obj = User::findOrFail($request->order_creator_id);

                    $wo->creator()->associate($creator_obj);
                    $wo->vehicle()->associate($vehicle);
                    $wo->save();

                }else{
                    throw new Exception(trans('default.notAllowedChooseVehicle'));
                }

            }else if(Auth::user()->hasRole('admin')){

                $wo = WorkOrder::create([
                    'date' => $request->order_date,
                    'relation' => $request->order_relation,
                    'kilometers_before' => $request->order_kilometers_before,
                    'kilometers_after' => $request->order_kilometers_after,
                    'visit_time' => $request->order_visit_time,
                    'kilometers_traveled' => $request->order_kilometers_traveled,
                    'remark' => $request->order_remark,
                ]);

                $creator_obj = User::findOrFail($request->order_creator_id);

                $wo->creator()->associate($creator_obj);
                $wo->vehicle()->associate($vehicle);
                $wo->save();

            }else if(Auth::user()->hasRole('employee')){

                if(Auth::user()->legalEntityUser->ownsVehicle($vehicle->id)){

                    $wo = WorkOrder::create([
                        'date' => $request->order_date,
                        'relation' => $request->order_relation,
                        'kilometers_before' => $request->order_kilometers_before,
                        'kilometers_after' => $request->order_kilometers_after,
                        'visit_time' => $request->order_visit_time,
                        'kilometers_traveled' => $request->order_kilometers_traveled,
                        'remark' => $request->order_remark,
                    ]);

                    $wo->creator()->associate(Auth::user());
                    $wo->vehicle()->associate($vehicle);
                    $wo->save();

                }else{
                    throw new Exception(trans('default.notAllowedChooseVehicle'));
                }
            }


            $msg = trans('default.successfulStoreWorkOrder').' '.$wo->relation.' ('.$wo->date->format('d.m.Y.').')';
            // return Redirect::back()->with('message-success', $msg);
            return response()->json($msg, 200, [], JSON_UNESCAPED_UNICODE);

        }catch(\Exception $e){
            dump($e->getMessage());
            return Redirect::back();
        }
    }



    /**
     * Update work order
     */
    public function update($id, Request $request){

        $this->validate($request, [
            'order_creator_id_update' => 'required|numeric',
            'order_date_update' => 'required',
            'order_relation_update' => 'required',
            'vl_update' => 'required',
            'order_kilometers_before_update' => 'required|numeric',
            'order_kilometers_after_update' => 'required|numeric',
            'order_visit_time_update' => 'required',
            'order_kilometers_traveled_update' => 'required|numeric',
        ]);

        try{
            /**
             *  Check if user owns vehicle by $request->vl
             */
            $vehicle = Vehicle::findOrFail($request->vl_update);

            $wo = WorkOrder::findOrFail($id);
            
            if(Auth::user()->hasRole('private')){

                if(Auth::user()->vehiclesOwned->first()->id == $vehicle->id){

                    $wo->update([
                        'date' => $request->order_date_update,
                        'relation' => $request->order_relation_update,
                        'kilometers_before' => $request->order_kilometers_before_update,
                        'kilometers_after' => $request->order_kilometers_after_update,
                        'visit_time' => $request->order_visit_time_update,
                        'kilometers_traveled' => $request->order_kilometers_traveled_update,
                        'remark' => $request->order_remark_update,
                    ]);

                    $wo->creator()->associate(Auth::user());
                    $wo->vehicle()->dissociate();
                    $wo->vehicle()->associate($vehicle);
                    $wo->save();

                }else{
                    throw new Exception(trans('default.notAllowedChooseVehicle'));
                }

            }else if(Auth::user()->hasRole('legal')){

                if(Auth::user()->ownsVehicle($vehicle->id)){

                    $wo->update([
                        'date' => $request->order_date_update,
                        'relation' => $request->order_relation_update,
                        'kilometers_before' => $request->order_kilometers_before_update,
                        'kilometers_after' => $request->order_kilometers_after_update,
                        'visit_time' => $request->order_visit_time_update,
                        'kilometers_traveled' => $request->order_kilometers_traveled_update,
                        'remark' => $request->order_remark_update,
                    ]);

                    $creator_obj = User::findOrFail($request->order_creator_id_update);

                    $wo->creator()->associate($creator_obj);
                    $wo->vehicle()->dissociate();
                    $wo->vehicle()->associate($vehicle);
                    $wo->save();

                }else{
                    throw new Exception(trans('default.notAllowedChooseVehicle'));
                }

            }else if(Auth::user()->hasRole('admin')){

                $wo->update([
                    'date' => $request->order_date_update,
                    'relation' => $request->order_relation_update,
                    'kilometers_before' => $request->order_kilometers_before_update,
                    'kilometers_after' => $request->order_kilometers_after_update,
                    'visit_time' => $request->order_visit_time_update,
                    'kilometers_traveled' => $request->order_kilometers_traveled_update,
                    'remark' => $request->order_remark_update,
                ]);

                $creator_obj = User::findOrFail($request->order_creator_id_update);

                $wo->creator()->associate($creator_obj);
                $wo->vehicle()->dissociate();
                $wo->vehicle()->associate($vehicle);
                $wo->save();

            }else if(Auth::user()->hasRole('employee')){

                if(Auth::user()->legalEntityUser->ownsVehicle($vehicle->id)){

                    $wo->update([
                        'date' => $request->order_date_update,
                        'relation' => $request->order_relation_update,
                        'kilometers_before' => $request->order_kilometers_before_update,
                        'kilometers_after' => $request->order_kilometers_after_update,
                        'visit_time' => $request->order_visit_time_update,
                        'kilometers_traveled' => $request->order_kilometers_traveled_update,
                        'remark' => $request->order_remark_update,
                    ]);

                    $wo->creator()->associate(Auth::user());
                    $wo->vehicle()->dissociate();
                    $wo->vehicle()->associate($vehicle);
                    $wo->save();

                }else{
                    throw new Exception(trans('default.notAllowedChooseVehicle'));
                }
            }


            $msg = trans('default.successfulUpdateWorkOrder').' '.$wo->relation.' ('.$wo->date->format('d.m.Y.').')';
            return response()->json($msg, 200, [], JSON_UNESCAPED_UNICODE);

        }catch(\Exception $e){
            dump($e->getMessage());
            // return Redirect::back();
        }
    }



    /**
     * Delete work order
     */
    public function delete($id){
    	try{
            if(Auth::user()->hasAnyRole(['private', 'legal'])){
                /**
                 *  Check if private owns vehicle by Vehicle Fuel $id (/{id})
                 */
                $wo = WorkOrder::findOrFail($id);

                if(Auth::user()->ownsVehicle($wo->vehicle_id)){
                    
                    $msg = trans('default.successfulDeleteWorkOrder').' '.$wo->relation.' ('.$wo->date->format('d.m.Y.').')';
                    $wo->delete();

                }else{
                    throw new Exception(trans('default.notAllowedDelete'));
                }

            }else if(Auth::user()->hasRole('admin')){

                $wo = WorkOrder::findOrFail($id);
                $msg = trans('default.successfulDeleteWorkOrder').' '.$wo->relation.' ('.$wo->date->format('d.m.Y.').')';
                $wo->delete();

            }else if(Auth::user()->hasRole('employee')){

                $wo = WorkOrder::findOrFail($id);

                if($wo->creator_id == Auth::user()->id){
                    $msg = trans('default.successfulDeleteWorkOrder').' '.$wo->relation.' ('.$wo->date->format('d.m.Y.').')';
                    $wo->delete();
                
                }else{
                    throw new Exception(trans('default.notAllowedDelete'));
                }
            }

            return response()->json($msg, 200, [], JSON_UNESCAPED_UNICODE);

        }catch(\Exception $e){
            dump($e->getMessage());
            return Redirect::back();
        }
    }



}
