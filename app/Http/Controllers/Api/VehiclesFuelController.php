<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vehicle;
use App\VehicleFuel;
use Redirect;
use Auth;
use Exception;

class VehiclesFuelController extends Controller
{
    /**
	 * Vehicles fuel home
	 */
    public function fuelList(Request $request){

    	if(Auth::user()->hasRole('admin'))
    		$vehicles_list = Vehicle::all();
    	else if(Auth::user()->hasAnyRole(['legal', 'private']))
            $vehicles_list = Auth::user()->vehiclesOwned;
        else if(Auth::user()->hasRole('employee'))
            $vehicles_list = Auth::user()->legalEntityUser->vehiclesOwned;

        $vehiclesFuelList = array();

        foreach($vehicles_list as &$v){
			foreach($v->vehiclesFuel as $key => &$vf){
                $kzt = '';
                if($key-1 == -1){
                    $kzt = $vf->current_kilometers;
                }else{
                    $kzt = $vf->current_kilometers - $v->vehiclesFuel[$key-1]->current_kilometers;
                }
				$vf->push($vf->vehicle);
                $vf->push($vf->filler);
                $vf->kzt = $kzt;
                $vehiclesFuelList[] = $vf;
            }
        }

        if(isset($request->page)){
        	$page = $request->page*10;

        	$vehiclesFuelList_sorted = collect($vehiclesFuelList)->sortBy(function($col){ 
	        		return $col->created_at; 
	        	}, SORT_REGULAR, SORT_DESC)->values()->all();

        	$pagination_results = array_slice($vehiclesFuelList_sorted, $page-10, $page);

			return response()->json(
	        	$pagination_results
	        );

        }else{
	        return response()->json(
	        	collect($vehiclesFuelList)->sortBy(function($col){ 
	        		return $col->created_at; 
	        	}, SORT_REGULAR, SORT_DESC)->values()->all()
	        );
	    }
    }



    /**
     * Store vehicle fuel
     */
    public function store(Request $request){

        //Check min current kilometers
        if(Auth::user()->hasRole('private')){
            $v = Auth::user()->vehiclesOwned->first();
        }else{
            $this->validate($request, [
                'vl' => 'required',
            ]);

            $v = Vehicle::findOrFail($request->vl);
        }

        if($v->vehiclesFuel->isEmpty()){
            $min_val = $v->kilometers;
        }else{
            $min_val = $v->vehiclesFuel->sortByDesc('current_kilometers')->first()->current_kilometers;
        }


    	try{
    		$this->validate($request, [
	    		'vl' => 'required',
	    		'current_kilometers' => 'required|numeric|min:'.$min_val,
	    		'liters' => 'required',
	    		'price' => 'required',
	    	]);
	    	
    		$vf = VehicleFuel::create([
                'current_kilometers' => $request->current_kilometers,
                'liters' => $request->liters,
                'price' => $request->price
            ]);

    		if(Auth::user()->hasRole('private')){
    			$vf->vehicle()->associate(Auth::user()->vehiclesOwned->first());
    			$vf->filler()->associate(Auth::user());
            	$vf->save();
    		}else{
    			$v = Vehicle::findOrFail($request->vl);
    			$vf->vehicle()->associate($v);
    			$vf->filler()->associate(Auth::user());
            	$vf->save();
    		}

            $msg = trans('default.successfulStoreFuel');
            //return Redirect::back()->with('message-success',$msg);
            return response()->json($msg, 200, [], JSON_UNESCAPED_UNICODE);

		}catch(\Exception $e){
            // dump($e->getMessage());
            // return Redirect::back();
            return response()->json($e->getMessage());
        }
    }



    /**
     * Update vehicle fuel
     */
    public function update(Request $request, $id){
    	try{
            /**
             *  Check if user owns vehicle by Vehicle Fuel $id (/{id})
             */
    		if(Auth::user()->hasAnyRole(['private', 'legal'])){
    			
    			$vf = VehicleFuel::findOrFail($id);

    			if(Auth::user()->ownsVehicle($vf->vehicle_id)){
    				$vf->update([
    					'current_kilometers' => $request->current_kilometers_update,
                		'liters' => $request->liters_update,
                		'price' => $request->price_update
    				]);

    				if(Auth::user()->hasRole('legal')){
	    				$vehicle = Vehicle::findOrFail($request->vl);

	    				if(Auth::user()->ownsVehicle($request->vl)){
	    					$vf->vehicle()->dissociate();
	    					$vf->vehicle()->associate($vehicle);
	    				}else{
	    					throw new Exception(trans('default.notAllowedChooseVehicle'));
	    				}
	    			}
    			
    				$vf->save();

    			}else{
    				throw new Exception(trans('default.notAllowedUpdate'));
    			}

    		}else if(Auth::user()->hasRole('admin')){

    			$vf = VehicleFuel::findOrFail($id);

    			$vf->update([
					'current_kilometers' => $request->current_kilometers_update,
            		'liters' => $request->liters_update,
            		'price' => $request->price_update
				]);

    			$vehicle = Vehicle::findOrFail($request->vl);
				$vf->vehicle()->dissociate();
				$vf->vehicle()->associate($vehicle);

				$vf->save();

    		}else if(Auth::user()->hasRole('employee')){

    			$vf = VehicleFuel::findOrFail($id);

    			if($vf->filler_id == Auth::user()->id){

    				$vf->update([
						'current_kilometers' => $request->current_kilometers_update,
	            		'liters' => $request->liters_update,
	            		'price' => $request->price_update
					]);
				
					$vehicle = Vehicle::findOrFail($request->vl);
    				
    				if(Auth::user()->legalEntityUser->ownsVehicle($request->vl)){

    					$vf->vehicle()->dissociate();
    					$vf->vehicle()->associate($vehicle);
    				}else{
    					throw new Exception(trans('default.notAllowedChooseVehicle'));
    				}

    				$vf->save();

    			}else{
    				throw new Exception(trans('default.notAllowedUpdateFuel'));
    			}
    		}

            $msg = trans('default.successfulUpdateFuel');
            // return response()->json($request->all());
    		return response()->json($msg, 200, [], JSON_UNESCAPED_UNICODE);

		}catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }



    /**
     * Vehicle fuel details
     */
    public function details(Request $request)
    {
    	$vf = VehicleFuel::findOrFail($request->id);
    	$vf->push($vf->filler);
    	$vf->push($vf->vehicle);

    	return response()->json($vf);
    }



    /**
     * Delete Vehicle Fuel
     */
    public function delete($id){
    	try{
    		if(Auth::user()->hasAnyRole(['private', 'legal'])){
    			/**
    			 * 	Check if private owns vehicle by Vehicle Fuel $id (/{id})
    			 */
    			$vf = VehicleFuel::findOrFail($id);

    			if(Auth::user()->ownsVehicle($vf->vehicle_id)){
    				
		            $msg = trans('default.successfulDeleteFuel');
		            $vf->delete();

    			}else{
    				throw new Exception(trans('default.notAllowedDelete'));
    			}

    		}else if(Auth::user()->hasRole('admin')){

    			$vf = VehicleFuel::findOrFail($id);
    			$msg = trans('default.successfulDeleteFuel');
	            $vf->delete();

    		}else if(Auth::user()->hasRole('employee')){

    			$vf = VehicleFuel::findOrFail($id);

    			if($vf->filler_id == Auth::user()->id){
    				$msg = trans('default.successfulDeleteFuel');
	            	$vf->delete();
				
    			}else{
    				throw new Exception(trans('default.notAllowedDelete'));
    			}
    		}

    		return response()->json($msg, 200, [], JSON_UNESCAPED_UNICODE);

		}catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }
}
