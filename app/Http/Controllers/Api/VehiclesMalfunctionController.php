<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vehicle;
use App\VehicleMalfunction;
use App\Reminder;
use Redirect;
use Auth;
use Exception;
use Carbon\Carbon;
use DB;
use Intervention\Image\Facades\Image;

class VehiclesMalfunctionController extends Controller
{
	/**
	 * Vehicle details page
	 * Content append inside div #vehicle-malfunctions
	 */
    public function vehicleListMalfunctions(Request $request)
    {

        if($request->id && $request->id != ''){
            $vehicle = Vehicle::findOrFail($request->id);

            $vehicle_malfunctions = $vehicle->malfunctions()->orderBy('created_at', 'desc')->get();
        }else{
            if(Auth::user()->hasRole('admin'))
                $vehicles_list = Vehicle::all();
            else if(Auth::user()->hasAnyRole(['legal', 'private']))
                $vehicles_list = Auth::user()->vehiclesOwned;
            else if(Auth::user()->hasRole('employee'))
                $vehicles_list = Auth::user()->legalEntityUser->vehiclesOwned;


            $vehicle_malfunctions = [];
            foreach($vehicles_list as $v){
                foreach($v->malfunctions as $vm){
                    array_push($vehicle_malfunctions, $vm);
                }
            }
        }


        foreach($vehicle_malfunctions as $v){
            $v->push($v->creator);
            $v->push($v->completedUserMalfunction);
        }



        if(isset($request->page) && $request->page != ''){
            $page = $request->page*10;

            $vehicle_malfunctions_sorted = collect($vehicle_malfunctions)->sortBy(function($col){ 
                    return $col['created_at']; 
                }, SORT_REGULAR, SORT_DESC)->values()->all();

            $vehicle_malfunctions_results = array_slice($vehicle_malfunctions_sorted, $page-10, $page);

            return response()->json($vehicle_malfunctions_results);

        }else{
            return response()->json(collect($vehicle_malfunctions)->sortBy(function($col){ 
                    return $col['created_at']; 
                }, SORT_REGULAR, SORT_DESC)->values()->all()
            );
        }


    }



    /**
     * Store malfunction
     */
    public function store(Request $request){

        $this->validate($request, [
            'vl' => 'required',
            'malfunction_name' => 'required',
            'malfunction_date' => 'required',
            // 'malfunction_end_date' => 'required',
            // 'malfunction_image_position' => 'required',
        ]);
        
        try{
            /**
             *  Check if user owns vehicle by $request->vl
             */
            $vehicle = Vehicle::findOrFail($request->vl);
            $user = Auth::user();
            
            if(Auth::user()->hasAnyRole(['private', 'legal'])){
                

                if(Auth::user()->ownsVehicle($vehicle->id)){
                
                    $position = '';
                    if($request->add_malfunction_category != ''){
                        $position = $request->add_malfunction_category;
                    }else if($request->add_malfunction_category == '' && $request->malfunction_image_position != ''){
                        $position = $request->malfunction_image_position;
                    }

                    // if(!empty($request->file('vehicle_malfunction_image'))){

                    //     $this->validate($request, [
                    //         'vehicle_malfunction_image' => 'mimes:jpeg,jpg,png,svg',
                    //     ]);

                    //     $file = $request->file('vehicle_malfunction_image');
                    //     $file_name = $file->getClientOriginalName();
                    //     $file->move('img/malfunctionBeforeAfterImage/', $file->getClientOriginalName());
                    // }else{
                    //     $file_name = NULL;
                    // }

                    if($request->input('vehicle_malfunction_image') != ''){
                        $data = $request->input('vehicle_malfunction_image');
                        $base64_str = substr($data, strpos($data, ",")+1);
                        //decode base64 string
                        $image = base64_decode($base64_str);
                        $png_url = "malfunction-img-before-u".$user->id."-".time().".png";
                        $path = 'img/malfunctionBeforeAfterImage/' . $png_url;
                        Image::make($image)->save($path);
                        $file_name = $png_url;
                    }else{
                        $file_name = NULL;
                    }

                   

                    $vm = VehicleMalfunction::create([
                        'name' => $request->malfunction_name,
                        'details' => $request->malfunction_details,
                        'date' => $request->malfunction_date,
                        'end_date_reminder' => Carbon::parse($request->get('malfunction_end_date')),
                        'vehicle_image_position' => $position,
                        'image_before' => $file_name,
                        'cost' => $request->malfunction_cost,
                        'kilometers_traveled' => $request->malfunctionKilometersTraveled,
                        
                    ]);

                    $vm->creator()->associate(Auth::user());
                    $vm->vehicle()->associate($vehicle);
                    $vm->save();

                }else{
                    throw new Exception(trans('default.notAllowedChooseVehicle'));
                }

            }else if(Auth::user()->hasRole('admin')){

                $position = '';
                if($request->add_malfunction_category != ''){
                    $position = $request->add_malfunction_category;
                }else if($request->add_malfunction_category == '' && $request->malfunction_image_position != ''){
                    $position = $request->malfunction_image_position;
                }

                // if(!empty($request->file('vehicle_malfunction_image'))){

                //     $this->validate($request, [
                //         'vehicle_malfunction_image' => 'mimes:jpeg,jpg,png,svg',
                //     ]);

                //     $file = $request->file('vehicle_malfunction_image');
                //     $file_name = $file->getClientOriginalName();
                //     $file->move('img/malfunctionBeforeAfterImage/', $file->getClientOriginalName());
                // }else{
                //     $file_name = NULL;
                // }

                if($request->input('vehicle_malfunction_image') != ''){
                    $data = $request->input('vehicle_malfunction_image');
                    $base64_str = substr($data, strpos($data, ",")+1);
                    //decode base64 string
                    $image = base64_decode($base64_str);
                    $png_url = "malfunction-img-before-u".$user->id."-".time().".png";
                    $path = 'img/malfunctionBeforeAfterImage/' . $png_url;
                    Image::make($image)->save($path);
                    $file_name = $png_url;
                }else{
                    $file_name = NULL;
                }

                $vm = VehicleMalfunction::create([
                    'name' => $request->malfunction_name,
                    'details' => $request->malfunction_details,
                    'date' => $request->malfunction_date,
                    'end_date_reminder' => Carbon::parse($request->get('malfunction_end_date')),
                    'vehicle_image_position' => $position,
                    'image_before' => $file_name,
                    'cost' => $request->malfunction_cost,
                    'kilometers_traveled' => $request->malfunctionKilometersTraveled,
                ]);

                $vm->creator()->associate(Auth::user());
                $vm->vehicle()->associate($vehicle);
                $vm->save();

            }else if(Auth::user()->hasRole('employee')){

                if(Auth::user()->legalEntityUser->ownsVehicle($vehicle->id)){

                    $position = '';
                    if($request->add_malfunction_category != ''){
                        $position = $request->add_malfunction_category;
                    }else if($request->add_malfunction_category == '' && $request->malfunction_image_position != ''){
                        $position = $request->malfunction_image_position;
                    }

                    // if(!empty($request->file('vehicle_malfunction_image'))){

                    //     $this->validate($request, [
                    //         'vehicle_malfunction_image' => 'mimes:jpeg,jpg,png,svg',
                    //     ]);

                    //     $file = $request->file('vehicle_malfunction_image');
                    //     $file_name = $file->getClientOriginalName();
                    //     $file->move('img/malfunctionBeforeAfterImage/', $file->getClientOriginalName());
                    // }else{
                    //     $file_name = NULL;
                    // }

                    if($request->input('vehicle_malfunction_image') != ''){
                        $data = $request->input('vehicle_malfunction_image');
                        $base64_str = substr($data, strpos($data, ",")+1);
                        //decode base64 string
                        $image = base64_decode($base64_str);
                        $png_url = "malfunction-img-before-u".$user->id."-".time().".png";
                        $path = 'img/malfunctionBeforeAfterImage/' . $png_url;
                        Image::make($image)->save($path);
                        $file_name = $png_url;
                    }else{
                        $file_name = NULL;
                    }

                    $vm = VehicleMalfunction::create([
                        'name' => $request->malfunction_name,
                        'details' => $request->malfunction_details,
                        'date' => $request->malfunction_date,
                        'end_date_reminder' => Carbon::parse($request->get('malfunction_end_date')),
                        'vehicle_image_position' => $position,
                        'image_before' => $file_name,
                        'cost' => $request->malfunction_cost,
                        'kilometers_traveled' => $request->malfunctionKilometersTraveled,
                    ]);

                    $vm->creator()->associate(Auth::user());
                    $vm->vehicle()->associate($vehicle);
                    $vm->save();

                }else{
                    throw new Exception(trans('default.notAllowedChooseVehicle'));
                }
            }

            //Save reminder by $request->malfunction_end_date
            if(isset($request->malfunction_create_reminder) && $request->malfunction_end_date != ''){

                $position = '';
                if($request->add_malfunction_category != ''){
                    $position = $request->add_malfunction_category;
                }else if($request->add_malfunction_category == '' && $request->malfunction_image_position != ''){
                    $position = $request->malfunction_image_position;
                }

                $reminder = Reminder::create([
                    'name' => $request->malfunction_name,
                    'category' => $position,
                    'details' => $request->malfunction_details,
                    'end_date_reminder' => Carbon::parse($request->get('malfunction_end_date'))
                ]);
                $reminder->vehicle()->associate($vehicle);
                $reminder->creator()->associate(Auth::User());
                $reminder->save();
            }


            $msg = trans('default.malfunctionStore') . ' ' . $vm->name;
            return response()->json($msg, 200, [], JSON_UNESCAPED_UNICODE);

        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }



    /**
     * Vehicle malfunction update
     */
    public function update(Request $request, $id){

        $this->validate($request, [
            'vl2' => 'required',
            'malfunctionDetailsName' => 'required',
            'malfunctionDetailsDate' => 'required',
            'malfunctionDetailsEndDate' => 'required',
        ]);

        // $img_array = $request->file();
        // dd(array_keys($img_array)[0]); //vehicle_malfunction_image_before-{id}
        // dd(array_keys($img_array)[1]); //vehicle_malfunction_image_after-{id}

        // dd($request->file());
        try{
            $malfunction = VehicleMalfunction::findOrFail($id);
            $vehicle = Vehicle::findOrFail($request->vl2);
            $msg = trans('default.malfunctionCompleteUpdate');

            
                if(Auth::user()->hasAnyRole(['private', 'legal'])){

                    if(Auth::user()->ownsVehicle($malfunction->vehicle_id)){
                        
                        if(Auth::user()->ownsVehicle($vehicle->id)){


/*
                            if(isset(array_keys($img_array)[0]) && strpos(array_keys($img_array)[0], 'before') !== false){
                                if(!empty($request->file(array_keys($img_array)[0]))){

                                    $this->validate($request, [
                                        array_keys($img_array)[0] => 'mimes:jpeg,jpg,png,svg',
                                    ]);

                                    $file_before = $request->file(array_keys($img_array)[0]);
                                    $file_name_before = $file_before->getClientOriginalName();
                                    $file_before->move('img/malfunctionBeforeAfterImage/', $file_before->getClientOriginalName());
                                }else{
                                    if($malfunction->image_before == NULL && $malfunction->image_before == '')
                                        $file_name_before = NULL;
                                    else
                                        $file_name_before = $malfunction->image_before;
                                }

                                if(isset(array_keys($img_array)[1])){
                                    if(!empty($request->file(array_keys($img_array)[1]))){

                                        $this->validate($request, [
                                            array_keys($img_array)[1] => 'mimes:jpeg,jpg,png,svg',
                                        ]);

                                        $file_after = $request->file(array_keys($img_array)[1]);
                                        $file_name_after = $file_after->getClientOriginalName();
                                        $file_after->move('img/malfunctionBeforeAfterImage/', $file_after->getClientOriginalName());
                                    }else{
                                        if($malfunction->after == NULL && $malfunction->image_after == '')
                                            $file_name_after = NULL;
                                        else
                                            $file_name_after = $malfunction->image_after;
                                    }
                                }else{
                                    if($malfunction->after == NULL && $malfunction->image_after == '')
                                        $file_name_after = NULL;
                                    else
                                        $file_name_after = $malfunction->image_after;
                                }

                            }else if(isset(array_keys($img_array)[0]) && strpos(array_keys($img_array)[0], 'after') !== false){

                                if($malfunction->image_before == NULL && $malfunction->image_before == '')
                                    $file_name_before = NULL;
                                else
                                    $file_name_before = $malfunction->image_before;

                                if(!empty($request->file(array_keys($img_array)[0]))){

                                    $this->validate($request, [
                                        array_keys($img_array)[0] => 'mimes:jpeg,jpg,png,svg',
                                    ]);

                                    $file_after = $request->file(array_keys($img_array)[0]);
                                    $file_name_after = $file_after->getClientOriginalName();
                                    $file_after->move('img/malfunctionBeforeAfterImage/', $file_after->getClientOriginalName());
                                }else{
                                    if($malfunction->after == NULL && $malfunction->image_after == '')
                                        $file_name_after = NULL;
                                    else
                                        $file_name_after = $malfunction->image_after;
                                }
                            }else{
                                if($malfunction->image_before == NULL && $malfunction->image_before == '')
                                    $file_name_before = NULL;
                                else
                                    $file_name_before = $malfunction->image_before;

                                if($malfunction->after == NULL && $malfunction->image_after == '')
                                    $file_name_after = NULL;
                                else
                                    $file_name_after = $malfunction->image_after;
                            }
*/

                            $user = Auth::user();
                            if($request->input('vehicle_malfunction_image_before') != ''){
                                $data = $request->input('vehicle_malfunction_image_before');
                                $base64_str = substr($data, strpos($data, ",")+1);
                                //decode base64 string
                                $image = base64_decode($base64_str);
                                $png_url = "vehiclemalfunction-img-before-u".$user->id."-".time().".png";
                                $path = 'img/malfunctionBeforeAfterImage/' . $png_url;
                                Image::make($image)->save($path);
                                $file_name_before = $png_url;
                            }else{
                                if($malfunction->image_before == NULL && $malfunction->image_before == '')
                                    $file_name_before = NULL;
                                else
                                    $file_name_before = $malfunction->image_before;
                            }

                            if($request->input('vehicle_malfunction_image_after') != ''){
                                $data = $request->input('vehicle_malfunction_image_after');
                                $base64_str = substr($data, strpos($data, ",")+1);
                                //decode base64 string
                                $image = base64_decode($base64_str);
                                $png_url = "vehiclemalfunction-img-after-u".$user->id."-".time().".png";
                                $path = 'img/malfunctionBeforeAfterImage/' . $png_url;
                                Image::make($image)->save($path);
                                $file_name_after = $png_url;
                            }else{
                                if($malfunction->after == NULL && $malfunction->image_after == '')
                                    $file_name_after = NULL;
                                else
                                    $file_name_after = $malfunction->image_after;
                            }


                            

                            $position = '';
                            if($request->add_malfunction_category_modal != ''){
                                $position = $request->add_malfunction_category_modal;
                            }else if($request->add_malfunction_category_modal == '' && $request->malfunction_image_position_modal != ''){
                                $position = $request->malfunction_image_position_modal;
                            }

                            $malfunction->update([
                                'name' => $request->malfunctionDetailsName,
                                'details' => $request->malfunctionDetails,
                                'date' => $request->malfunctionDetailsDate,
                                'end_date_reminder' => Carbon::parse($request->get('malfunctionDetailsEndDate')->format('Y-m-d')),
                                'image_before' => $file_name_before,
                                'image_after' => $file_name_after,
                                'kilometers_traveled' => $request->malfunctionKilometersTraveled,
                                'vehicle_image_position' => $position,
                                'cost' => $request->malfunctionCost,
                            ]);

                            $malfunction->vehicle()->associate($vehicle);
                            $malfunction->save();

                        }else{
                            throw new Exception(trans('default.notAllowedChooseVehicle'));
                        }

                    }else{
                        throw new Exception(trans('default.notAllowedUpdateMalfunction'));
                    }

                }else if(Auth::user()->hasRole('admin')){

                    if(isset(array_keys($img_array)[0]) && strpos(array_keys($img_array)[0], 'before') !== false){
                        if(!empty($request->file(array_keys($img_array)[0]))){

                            $this->validate($request, [
                                array_keys($img_array)[0] => 'mimes:jpeg,jpg,png,svg',
                            ]);

                            $file_before = $request->file(array_keys($img_array)[0]);
                            $file_name_before = $file_before->getClientOriginalName();
                            $file_before->move('img/malfunctionBeforeAfterImage/', $file_before->getClientOriginalName());
                        }else{
                            if($malfunction->image_before == NULL && $malfunction->image_before == '')
                                $file_name_before = NULL;
                            else
                                $file_name_before = $malfunction->image_before;
                        }

                        if(isset(array_keys($img_array)[1])){
                            if(!empty($request->file(array_keys($img_array)[1]))){

                                $this->validate($request, [
                                    array_keys($img_array)[1] => 'mimes:jpeg,jpg,png,svg',
                                ]);

                                $file_after = $request->file(array_keys($img_array)[1]);
                                $file_name_after = $file_after->getClientOriginalName();
                                $file_after->move('img/malfunctionBeforeAfterImage/', $file_after->getClientOriginalName());
                            }else{
                                if($malfunction->after == NULL && $malfunction->image_after == '')
                                    $file_name_after = NULL;
                                else
                                    $file_name_after = $malfunction->image_after;
                            }
                        }else{
                            if($malfunction->after == NULL && $malfunction->image_after == '')
                                $file_name_after = NULL;
                            else
                                $file_name_after = $malfunction->image_after;
                        }

                    }else if(isset(array_keys($img_array)[0]) && strpos(array_keys($img_array)[0], 'after') !== false){

                        if($malfunction->image_before == NULL && $malfunction->image_before == '')
                            $file_name_before = NULL;
                        else
                            $file_name_before = $malfunction->image_before;

                        if(!empty($request->file(array_keys($img_array)[0]))){

                            $this->validate($request, [
                                array_keys($img_array)[0] => 'mimes:jpeg,jpg,png,svg',
                            ]);

                            $file_after = $request->file(array_keys($img_array)[0]);
                            $file_name_after = $file_after->getClientOriginalName();
                            $file_after->move('img/malfunctionBeforeAfterImage/', $file_after->getClientOriginalName());
                        }else{
                            if($malfunction->after == NULL && $malfunction->image_after == '')
                                $file_name_after = NULL;
                            else
                                $file_name_after = $malfunction->image_after;
                        }
                    }

                    $position = '';
                    if($request->add_malfunction_category_modal != ''){
                        $position = $request->add_malfunction_category_modal;
                    }else if($request->add_malfunction_category_modal == '' && $request->malfunction_image_position_modal != ''){
                        $position = $request->malfunction_image_position_modal;
                    }

                    $malfunction->update([
                        'name' => $request->malfunctionDetailsName,
                        'details' => $request->malfunctionDetails,
                        'date' => $request->malfunctionDetailsDate,
                        'end_date_reminder' => Carbon::parse($request->get('malfunctionDetailsEndDate')->format('Y-m-d')),
                        'image_before' => $file_name_before,
                        'image_after' => $file_name_after,
                        'kilometers_traveled' => $request->malfunctionKilometersTraveled,
                        'vehicle_image_position' => $position,
                        'cost' => $request->malfunctionCost,
                    ]);

                    $malfunction->vehicle()->associate($vehicle);
                    $malfunction->save();

                }else if(Auth::user()->hasRole('employee')){

                    if(Auth::user()->legalEntityUser->ownsVehicle($malfunction->vehicle_id)){

                        if(Auth::user()->legalEntityUser->ownsVehicle($vehicle->id)){

                            if(isset(array_keys($img_array)[0]) && strpos(array_keys($img_array)[0], 'before') !== false){
                                if(!empty($request->file(array_keys($img_array)[0]))){

                                    $this->validate($request, [
                                        array_keys($img_array)[0] => 'mimes:jpeg,jpg,png,svg',
                                    ]);

                                    $file_before = $request->file(array_keys($img_array)[0]);
                                    $file_name_before = $file_before->getClientOriginalName();
                                    $file_before->move('img/malfunctionBeforeAfterImage/', $file_before->getClientOriginalName());
                                }else{
                                    if($malfunction->image_before == NULL && $malfunction->image_before == '')
                                        $file_name_before = NULL;
                                    else
                                        $file_name_before = $malfunction->image_before;
                                }

                                if(isset(array_keys($img_array)[1])){
                                    if(!empty($request->file(array_keys($img_array)[1]))){

                                        $this->validate($request, [
                                            array_keys($img_array)[1] => 'mimes:jpeg,jpg,png,svg',
                                        ]);

                                        $file_after = $request->file(array_keys($img_array)[1]);
                                        $file_name_after = $file_after->getClientOriginalName();
                                        $file_after->move('img/malfunctionBeforeAfterImage/', $file_after->getClientOriginalName());
                                    }else{
                                        if($malfunction->after == NULL && $malfunction->image_after == '')
                                            $file_name_after = NULL;
                                        else
                                            $file_name_after = $malfunction->image_after;
                                    }
                                }else{
                                    if($malfunction->after == NULL && $malfunction->image_after == '')
                                        $file_name_after = NULL;
                                    else
                                        $file_name_after = $malfunction->image_after;
                                }

                            }else if(isset(array_keys($img_array)[0]) && strpos(array_keys($img_array)[0], 'after') !== false){

                                if($malfunction->image_before == NULL && $malfunction->image_before == '')
                                    $file_name_before = NULL;
                                else
                                    $file_name_before = $malfunction->image_before;

                                if(!empty($request->file(array_keys($img_array)[0]))){

                                    $this->validate($request, [
                                        array_keys($img_array)[0] => 'mimes:jpeg,jpg,png,svg',
                                    ]);

                                    $file_after = $request->file(array_keys($img_array)[0]);
                                    $file_name_after = $file_after->getClientOriginalName();
                                    $file_after->move('img/malfunctionBeforeAfterImage/', $file_after->getClientOriginalName());
                                }else{
                                    if($malfunction->after == NULL && $malfunction->image_after == '')
                                        $file_name_after = NULL;
                                    else
                                        $file_name_after = $malfunction->image_after;
                                }
                            }
                            
                            $position = '';
                            if($request->add_malfunction_category_modal != ''){
                                $position = $request->add_malfunction_category_modal;
                            }else if($request->add_malfunction_category_modal == '' && $request->malfunction_image_position_modal != ''){
                                $position = $request->malfunction_image_position_modal;
                            }

                            $malfunction->update([
                                'name' => $request->malfunctionDetailsName,
                                'details' => $request->malfunctionDetails,
                                'date' => $request->malfunctionDetailsDate,
                                'end_date_reminder' => Carbon::parse($request->get('malfunctionDetailsEndDate')->format('Y-m-d')),
                                'image_before' => $file_name_before,
                                'image_after' => $file_name_after,
                                'kilometers_traveled' => $request->malfunctionKilometersTraveled,
                                'vehicle_image_position' => $position,
                                'cost' => $request->malfunctionCost,
                            ]);

                            $malfunction->vehicle()->associate($vehicle);
                            $malfunction->save();

                        }else{
                            throw new Exception(trans('default.notAllowedChooseVehicle'));
                        }

                    }else{
                        throw new Exception(trans('default.notAllowedUpdateMalfunction'));
                    }

                }


            return response()->json($msg . ' ' .$malfunction->name, 200, [], JSON_UNESCAPED_UNICODE);

        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }



    /**
     * Ajax complete malfunction with current date
     */
    public function completeMalfunction(Request $request){
        try{
            $malfunction = VehicleMalfunction::findOrFail($request->vm);

            //If status is not completed
            if(!$malfunction->isCompleted()){
                if(Auth::user()->hasAnyRole(['private', 'legal'])){

                    if(Auth::user()->ownsVehicle($malfunction->vehicle_id)){
                        
                        $malfunction->update([
                            'completed_date' => Carbon::now(),
                            'status' => 1
                        ]);

                        $malfunction->completedUserMalfunction()->associate(Auth::user());
                        $malfunction->save();

                    }else{
                        throw new Exception(trans('default.notAllowedToCompleteMalfunction'));
                    }

                }else if(Auth::user()->hasRole('admin')){

                    $malfunction->update([
                        'completed_date' => Carbon::now(),
                        'status' => 1
                    ]);

                    $malfunction->completedUserMalfunction()->associate(Auth::user());
                    $malfunction->save();

                }else if(Auth::user()->hasRole('employee')){

                    if(Auth::user()->legalEntityUser->ownsVehicle($malfunction->vehicle_id)){

                        $malfunction->update([
                            'completed_date' => Carbon::now(),
                            'status' => 1
                        ]);

                        $malfunction->completedUserMalfunction()->associate(Auth::user());
                        $malfunction->save();

                    }else{
                        throw new Exception(trans('default.notAllowedToCompleteMalfunction'));
                    }

                }
            }else{
                throw new Exception(trans('default.malfunctionAlreadyCompleted'));
            }

            // return ['success'=>true, 'text' => trans('default.malfunctionComplete').' '.$malfunction->name];
            return response()->json(trans('default.malfunctionComplete').' '.$malfunction->name, 200, [], JSON_UNESCAPED_UNICODE);

        }catch(\Exception $e){
            // return ['success'=>false, 'text' => $e->getMessage()];
            return response()->json($e->getMessage());
        }
    }



    /**
     * Malfunction details
     */
    public function details(Request $request)
    {
        $malfunction = VehicleMalfunction::findOrFail($request->id);

        $malfunction->push($malfunction->creator);
        $malfunction->push($malfunction->vehicle);
        $malfunction->push($malfunction->completedUserMalfunction);

        return response()->json($malfunction);
    }



    /**
     * Get distinct malfunction/reminder positions
     */
    public function malfunctionPositions()
    {
        $final_array_positions = [];

        for ($b=1; $b<10 ; $b++) {
            $posB = ['b'.$b => trans('vehicles.posB'.$b) ];
            array_push($final_array_positions, $posB);
        }

        for ($a=1; $a<14 ; $a++) {
            $posA = [ 'a'.$a => trans('vehicles.posA'.$a) ];
            array_push($final_array_positions, $posA);
        }

        /**
         * Get categories from malfunctions and reminders and set to $categories_final
         */
        //Get vehicles from Auth user

        if(Auth::user()->hasRole('admin')){
            $vehicles_list = App\Vehicle::all();
        }else if(Auth::user()->hasAnyRole(['legal', 'private'])){
            $vehicles_list = Auth::user()->vehiclesOwned;
        }else if(Auth::user()->hasRole('employee')){
            $vehicles_list = Auth::user()->legalEntityUser->vehiclesOwned;
        }

        //Get categories for each vehicle for reminder and malfunction and set to array results_for_each_vehicle
        $results_for_each_vehicle = [];
        foreach ($vehicles_list as $v) {
            $malfunction_categories = DB::table('vehicles_malfunction')->select('vehicle_image_position')->where('vehicle_id', $v->id)->distinct()->get();

            $reminder_categories = DB::table('reminders')->select('category')->where('vehicle_id', $v->id)->distinct()->get();

            array_push($results_for_each_vehicle, $malfunction_categories);
            array_push($results_for_each_vehicle, $reminder_categories);
        }

        //Sort results (remove empty arrays)
        $categories = [];
        foreach ($results_for_each_vehicle as $key => $value) {
            if($value != ''){
                foreach ($value as $key => $val) {
                    array_push($categories, $val);
                }
            }
        }

        //convert categories from object
        $categories_final = [];
        foreach ($categories as $key => $value) {
            if($value != ''){
                foreach ($value as $key => $val) {
                    array_push($categories_final, $val);
                }
            }
        }

        $default_array = ['a1','a2','a3','a4','a5','a6','a7','a8','a9','a10','a11','a12','a13', 'b1','b2','b3','b4','b5','b6','b7','b8','b9'];
        //Remove default image position (vehicle details view)
        foreach ($categories_final as $key => $value) {
            if(in_array($value, $default_array))
                unset($categories_final[$key]);
            else{
                array_push($final_array_positions,[$value => $value]);
            }
        }

        return response()->json($final_array_positions);
    }



    /**
     * Vehicle malfunction delete
     */
    public function delete($id){
        try{
            if(Auth::user()->hasAnyRole(['private', 'legal'])){
                /**
                 *  Check if private owns vehicle by Vehicle malfunction $id (/{id})
                 */
                $vm = VehicleMalfunction::findOrFail($id);

                if(Auth::user()->ownsVehicle($vm->vehicle_id)){
                    
                    $msg = trans('default.successfulDeleteMalfunction') . ' ' . $vm->name;
                    $vm->delete();

                }else{
                    throw new Exception(trans('default.notAllowedDelete'));
                }

            }else if(Auth::user()->hasRole('admin')){

                $vm = VehicleMalfunction::findOrFail($id);
                $msg = trans('default.successfulDeleteMalfunction') . ' ' . $vm->name;
                $vm->delete();

            }else if(Auth::user()->hasRole('employee')){

                $vm = VehicleMalfunction::findOrFail($id);

                if($vm->creator == Auth::user()){
                    $msg = trans('default.successfulDeleteMalfunction') . ' ' . $vm->name;
                    $vm->delete();
                
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
