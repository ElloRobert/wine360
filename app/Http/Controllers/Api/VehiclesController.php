<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Vehicle;
use App\Reminder;
use Carbon\Carbon;
use Response;
use File;
use Redirect;
use Intervention\Image\Facades\Image;

class VehiclesController extends Controller
{
    /**
     * Vehicles list smart select (FW7)
     */
    public function vehicleList(Request $request)
    {
        $current_user = $request->user();

        $query = Vehicle::orderBy('name');

        if ($current_user->hasAnyRole(['legal', 'private'])) {
            $query->withOwner($current_user->id);
        } else if ($current_user->hasRole('employee')) {
            $query->withOwner($current_user->legal_entity_user_id);
        }

        $vehicles_list = $query->get(['id', 'name', 'license_plate', 'image', 'created_at'])
            ->map(function ($vehicle) {
                return [
                    'id' => $vehicle->id,
                    'text' => $vehicle->name_and_license_plate,
                    'image' => $vehicle->image,
                    'created_at' => $vehicle->created_at
                ];
            });



        if(isset($request->page)){
        	$page = $request->page*10;

        	$vehiclesList_sorted = collect($vehicles_list)->sortBy(function($col){ 
	        		return $col['created_at']; 
	        	}, SORT_REGULAR, SORT_DESC)->values()->all();

        	$vehicle_results = array_slice($vehiclesList_sorted, $page-10, $page);

			return response()->json(
	        	$vehicle_results
	        );

        }else{
	        return response()->json(collect($vehicles_list)->sortBy(function($col){ 
	        		return $col['created_at']; 
	        	}, SORT_REGULAR, SORT_DESC)->values()->all()
	        );
	    }
        
    }



    /**
     * Ajax current kilometers from vehicle
     */
    public function currentKilometers($id){

        $v = Vehicle::findOrFail($id);
        $v_fuel_km = 0;
        $v_malfunction_km = 0;
        $v_current = 0;

        if($v->vehiclesFuel->sortByDesc('current_kilometers')->first() != NULL && $v->vehiclesFuel->sortByDesc('current_kilometers')->first() != ''){
            $v_fuel_km = $v->vehiclesFuel->sortByDesc('current_kilometers')->first()->current_kilometers;
        }

        if($v->malfunctions->sortByDesc('kilometers_traveled')->first() != NULL){
            if($v->malfunctions->sortByDesc('kilometers_traveled')->first()->kilometers_traveled != NULL && $v->malfunctions->sortByDesc('kilometers_traveled')->first()->kilometers_traveled != ''){
                $v_malfunction_km = $v->malfunctions->sortByDesc('kilometers_traveled')->first()->kilometers_traveled;
            }
        }

        if($v_fuel_km != 0 || $v_malfunction_km != 0){
            if($v_fuel_km >= $v_malfunction_km){
                $v_current = $v_fuel_km;
            }else{
                $v_current = $v_malfunction_km;
            }
        }else{
            $v_current = $v->kilometers;
        }


        return response()->json($v_current);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->file('vehicle_image'));
    	// return response()->json($request->all());
        try{
        	$this->validate($request, [
	            'vehicles_name' => 'required',
	            'vehicles_type' => 'required',
	            'vehicles_color' => 'required',
	            'vehicles_mark' => 'required',
	            'vehicles_model' => 'required',
	            'vehicles_year' => 'required',
	            'vehicles_license_plate' => 'required',
	            'vehicles_kilometers' => 'required',
	            'vehicles_fuel_type' => 'required',
	            'vehicles_tire_dimensions' => 'required'
	        ]);

            $user = Auth::user();

            if($request->input('vehicle_image') != ''){
                $data = $request->input('vehicle_image');
                $base64_str = substr($data, strpos($data, ",")+1);
                //decode base64 string
                $image = base64_decode($base64_str);
                $png_url = "vehicle-img-u".$user->id."-".time().".png";
                $path = 'img/vehiclesImage/' . $png_url;
                Image::make($image)->save($path);
                $file_name = $png_url;
            }else{
                $file_name = NULL;
            }

            $v = Vehicle::create([
                'image' => $file_name,
                'name' => $request->vehicles_name,
                'type' => $request->vehicles_type,
                'color' => $request->vehicles_color,
                'mark' => $request->vehicles_mark,
                'model' => $request->vehicles_model,
                'year' => $request->vehicles_year,
                'tire_dimensions' => $request->vehicles_tire_dimensions,
                'license_plate' => $request->vehicles_license_plate,
                'kilometers' => $request->vehicles_kilometers,
                'fuel_type' => $request->vehicles_fuel_type,
                'activity' => $request->vehicles_activity
            ]);

            $v->owner()->associate($user);
            $v->save();


            if(Auth::user()->hasRole('private')){
                $v->drivers()->attach($user);
            }


            //Save reminder by $request->malfunction_end_date
            if(isset($request->vehicle_create_reminder)){

                //Tekučina za pranje prozora
                $reminder_1 = Reminder::create([
                    'name' => trans('reminder.autoCreate1'),
                    'category' => trans('reminder.autoCreate1'),
                    'end_date_reminder' => Carbon::now()->copy()->addDays(7),
                ]);
                $reminder_1->vehicle()->associate($v);
                $reminder_1->creator()->associate(Auth::User());
                $reminder_1->save();


                //Aparat za gašenje požara
                $reminder_2 = Reminder::create([
                    'name' => trans('reminder.autoCreate2'),
                    'category' => trans('reminder.autoCreate2'),
                    'end_date_reminder' => Carbon::now()->copy()->addYears(1),
                ]);
                $reminder_2->vehicle()->associate($v);
                $reminder_2->creator()->associate(Auth::User());
                $reminder_2->save();


                //Gume
                $reminder_3 = Reminder::create([
                    'name' => trans('reminder.autoCreate3'),
                    'category' => trans('reminder.autoCreate3'),
                ]);
                $reminder_3->vehicle()->associate($v);
                $reminder_3->creator()->associate(Auth::User());
                $reminder_3->save();
            }
            

            return response()->json(trans('default.successfulInsertVehicle'), 200, [], JSON_UNESCAPED_UNICODE);
             
        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }



    public function details(Request $request)
    {
    	$vehicle = Vehicle::findOrFail($request->id);

    	return response()->json($vehicle);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'vehicles_name' => 'required',
            'vehicles_type' => 'required',
            'vehicles_color' => 'required',
            'vehicles_mark' => 'required',
            'vehicles_model' => 'required',
            'vehicles_year' => 'required',
            'vehicles_license_plate' => 'required',
            'vehicles_kilometers' => 'required',
            'vehicles_fuel_type' => 'required',
            'vehicles_tire_dimensions' => 'required'
        ]);

        try{
            $vehicle = Vehicle::findOrFail($id);
            $user = Auth::user();

            $vehicle->update([
                'name' => $request->vehicles_name,
                'type' => $request->vehicles_type,
                'color' => $request->vehicles_color,
                'mark' => $request->vehicles_mark,
                'model' => $request->vehicles_model,
                'year' => $request->vehicles_year,
                'tire_dimensions' => $request->vehicles_tire_dimensions,
                'license_plate' => $request->vehicles_license_plate,
                'kilometers' => $request->vehicles_kilometers,
                'fuel_type' => $request->vehicles_fuel_type,
                'activity' => $request->vehicles_activity
            ]);

            // if(!empty($request->file('vehicle_image_update'))){

            //     $file = $request->file('vehicle_image_update');

            //     if($vehicle->image != NULL){
            //         File::delete("img/vehiclesImage/{$vehicle->image}");
            //     }

            //     $file->move('img/vehiclesImage/', $file->getClientOriginalName());

            //     $vehicle->update([
            //         'image' => $file->getClientOriginalName()
            //     ]);

            // }
            if ($request->input('vehicle_image_update') != '') {

                if ($vehicle->image != NULL) {
                    File::delete("img/vehiclesImage/{$vehicle->image}");
                }

                $data = $request->input('vehicle_image_update');
                $base64_str = substr($data, strpos($data, ",")+1);
                //decode base64 string
                $image = base64_decode($base64_str);
                $png_url = "vehicle-img-u".$user->id."-".time().".png";
                $path = 'img/vehiclesImage/' . $png_url;
                Image::make($image)->save($path);
                $file_name = $png_url;

                $vehicle->update([
                    'image' => $file_name
                ]);
            }

            
            $msg = trans('default.successfulUpdateVehicle') . ' ' . $vehicle->name;
            return response()->json($msg, 200, [], JSON_UNESCAPED_UNICODE);
            
        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }



    /**
     * Vehicle delete
     */
    public function delete($id)
    {
    	try{
            $vehicle = Vehicle::findOrFail($id);
            $msg = trans('vehicles.deleteVehicleMsg_1').' '.$vehicle->name.' '.trans('vehicles.deleteVehicleMsg_2');
            $vehicle->delete();

            return response()->json($msg, 200, [], JSON_UNESCAPED_UNICODE);

        }catch(\Exception $e){
        	return response()->json($e->getMessage());
        }
    }

}
