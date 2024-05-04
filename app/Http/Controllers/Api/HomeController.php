<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Vehicle;
use App\Monitoring;
use App\Comment;
use Carbon\Carbon;
use Exception;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->hasRole('admin')){
            $vehicles_list = Vehicle::all();

            $comments = Comment::all();
            foreach ($comments as $c) {
                if($c->commenters()->first() != NULL){
                    $last_comment = $c->commenters()->orderBy('comments_users.created_at','desc')->get()->first();
                    $c->commentUserDetails = $last_comment['pivot']['details'];
                    $c->dateFormatString = $last_comment['pivot']['created_at']->format('Y-m-d H:i:s'); //->diffForHumans();
                }else{
                    $c->commentUserDetails = '';
                    $c->dateFormatString = $c->created_at->format('Y-m-d H:i:s'); //->diffForHumans();
                }
            }
        }else if(Auth::user()->hasRole('legal')){
            $vehicles_list = Auth::user()->vehiclesOwned;

            $comments = Auth::user()->commentsCreated;
            foreach ($comments as $c) {
                $c->push($c->creator);
                $c->push($c->commenters()->orderBy('comments_users.created_at','desc'));


                if($c->commenters()->first() != NULL){
                    $last_comment = $c->commenters()->orderBy('comments_users.created_at','desc')->get()->first();
                    $c->commentUserDetails = $last_comment['pivot']['details'];
                    $c->dateFormatString = $last_comment['pivot']['created_at']->format('Y-m-d H:i:s'); //->diffForHumans();
                }else{
                    $c->commentUserDetails = '';
                    $c->dateFormatString = $c->created_at->format('Y-m-d H:i:s'); //->diffForHumans();
                }
            }

            foreach (Auth::user()->legalEntityEmployees as $u_obj) {
                foreach ($u_obj->commentsCreated as $c) {
                    $c->push($c->creator);
                    $c->push($c->commenters()->orderBy('comments_users.created_at','desc'));

                    if($c->commenters()->first() != NULL){
                        $last_comment = $c->commenters()->orderBy('comments_users.created_at','desc')->get()->first();
                        $c->commentUserDetails = $last_comment['pivot']['details'];
                        $c->dateFormatString = $last_comment['pivot']['created_at']->format('Y-m-d H:i:s'); //->diffForHumans();
                    }else{
                        $c->commentUserDetails = '';
                        $c->dateFormatString = $c->created_at->format('Y-m-d H:i:s'); //->diffForHumans();
                    }

                    $comments->push($c);
                }
            }
        }else if(Auth::user()->hasRole('employee')){
            $vehicles_list = Auth::user()->legalEntityUser->vehiclesOwned;

            $comments = Auth::user()->legalEntityUser->commentsCreated;

            foreach (Auth::user()->legalEntityUser->legalEntityEmployees as $u_obj) {
                foreach ($u_obj->commentsCreated as $c) {
                    $c->push($c->commenters()->orderBy('comments_users.created_at','desc'));

                    if($c->commenters()->first() != NULL){
                        $last_comment = $c->commenters()->orderBy('comments_users.created_at','desc')->get()->first();
                        $c->commentUserDetails = $last_comment['pivot']['details'];
                        $c->dateFormatString = $last_comment['pivot']['created_at']->format('Y-m-d H:i:s'); //->diffForHumans();
                    }else{
                        $c->commentUserDetails = '';
                        $c->dateFormatString = $c->created_at->format('Y-m-d H:i:s'); //->diffForHumans();
                    }

                    $comments->push($c);
                }
            }
        }else{
            $vehicles_list = Auth::user()->vehiclesOwned->first();
            $comments = Auth::user()->commentsCreated;
            foreach ($comments as $c) {
                $c->push($c->creator);
                $c->push($c->commenters()->orderBy('comments_users.created_at','desc'));

                if($c->commenters()->first() != NULL){
                    $last_comment = $c->commenters()->orderBy('comments_users.created_at','desc')->get()->first();
                    $c->commentUserDetails = $last_comment['pivot']['details'];
                    $c->dateFormatString = $last_comment['pivot']['created_at']->format('Y-m-d H:i:s'); //->diffForHumans();
                }else{
                    $c->commentUserDetails = '';
                    $c->dateFormatString = $c->created_at->format('Y-m-d H:i:s'); //->diffForHumans();
                }
            }
        }

        $comments_sort = $comments->toArray();
        // usort($comments_sort, function($a, $b) {
        //     return strtotime($b['created_at']) - strtotime($a['created_at']);
        // });

        if(isset($request->page) && $request->page != ''){
            $page = $request->page*10;

            $comments_sorted = collect($comments_sort)->sortBy(function($col){ 
                    return $col['dateFormatString']; 
                }, SORT_REGULAR, SORT_DESC)->values()->all();

            $comments_sort_results = array_slice($comments_sorted, $page-10, $page);

            return response()->json($comments_sort_results);

        }else{
            return response()->json(collect($comments_sort)->sortBy(function($col){ 
                    return $col['dateFormatString']; 
                }, SORT_REGULAR, SORT_DESC)->values()->all()
            );
        }


        // $results['comments'] = $comments_sort;
        // $results['au'] = Auth::user();

        // return response()->json($results);
    }


    /**
     * Insert new comment
     */
    public function store(Request $request){
        $this->validate($request, [
            'comment_title' => 'required',
            'comment_details' => 'required',
        ]);

        try{
            $c = new Comment();
            $c->title = $request->comment_title;
            $c->details = $request->comment_details;
            $c->creator()->associate(Auth::user());
            $c->save();

            return response()->json(trans('default.successfulStoreComment'), 200, [], JSON_UNESCAPED_UNICODE);

        }catch(\Exception $e){
            dump($e->getMessage());
            return Redirect::back();
        }
    }


    /**
     * Comment details page
     */
    public function commentDetails($id){
        $c = Comment::findOrFail($id);
        $c->push($c->creator);
        $c->push($c->commenters->sortByDesc('created_at'));
        if($c->commenters()->first() != NULL){
            $last_comment = $c->commenters()->orderBy('comments_users.created_at','desc')->get()->first();

            $c->dateFormatString = $last_comment['pivot']['created_at']->diffForHumans();
        }else{
            $c->dateFormatString = $c->created_at->diffForHumans();
        }
        return response()->json($c);
    }


    /**
     * Comment details page edit
     */
    public function commentDetailsEdit($id){
        return response()->json(Comment::findOrFail($id));
    }


    /**
     * Comment details page edit
     */
    public function commentDetailsUpdate($id, Request $request){
        $this->validate($request, [
            'comment_title' => 'required',
            'comment_details' => 'required',
        ]);

        try{
            $comment = Comment::findOrFail($id);

            if($comment->creator->id == Auth::user()->id){
                $comment->update([
                    'title' => $request->comment_title,
                    'details' => $request->comment_details
                ]);

                return Redirect::route('comments.details', [$id]);
            }else{
                throw new Exception(trans('default.notAllowedUpdate'));
            }

        }catch(\Exception $e){
            dump($e->getMessage());
            return Redirect::back();
        }
    }


    /**
     * Coment User reply post
     */
    public function commentUserReply($id, Request $request){
        $this->validate($request, [
            'comment_details' => 'required',
        ]);

        try{
            $c = Comment::findOrFail($id);
            $c->commenters()->attach(Auth::user(), ['details' => $request->comment_details]);
            $c->save();

            return response()->json(trans('default.successfulStoreComment'), 200, [], JSON_UNESCAPED_UNICODE);

        }catch(\Exception $e){
            dump($e->getMessage());
            return Redirect::back();
        }
    }


    /**
     * Ajax configuration to get
     */
    public function monitoringConfiguration(){
        $monitoring_config = Monitoring::where('configuration_id', Auth::user()->configuration->id )->get()->toarray();

        $items=array();

        if($monitoring_config != null){
            foreach ($monitoring_config as $key => $m) {
                if($m['type'] == 'malfunction'){

                    $malfunctions_failed_legal = collect();
                    $malfunctions_pending_legal = collect();

                    foreach (Auth::user()->vehiclesOwned as $v) {
                        foreach ($v->malfunctions as $vm) {
                            if(!$vm->isCompleted() && $vm->end_date_reminder->lt(Carbon::now())){
                                $malfunctions_failed_legal->push($vm);
                            }
                        }
                    }

                    foreach (Auth::user()->vehiclesOwned as $v) {
                        foreach ($v->malfunctions as $vm) {
                            if(!$vm->isCompleted() && $vm->end_date_reminder->gte(Carbon::now())){
                                $malfunctions_pending_legal->push($vm);
                            }
                        }
                    }

                    $m['total_failed'] = count($malfunctions_failed_legal);
                    $m['total_pending'] = count($malfunctions_pending_legal);

                    array_push($items, $m);
                    // array_push($m, count($malfunctions_failed_legal));
                    // array_push($m, count($malfunctions_pending_legal));

                }else if($m['type'] == 'reminder'){

                    $reminders_failed_legal = collect();
                    $reminders_pending_legal = collect();

                    foreach (Auth::user()->vehiclesOwned as $v) {
                        foreach ($v->reminders as $r) {
                            if(!$r->isCompleted() && $r->end_date_reminder->lt(Carbon::now())){
                                $reminders_failed_legal->push($r);
                            }
                        }
                    }

                    foreach (Auth::user()->vehiclesOwned as $v) {
                        foreach ($v->reminders as $r) {
                            if(!$r->isCompleted() && $r->end_date_reminder->gte(Carbon::now())){
                                $reminders_pending_legal->push($r);
                            }
                        }
                    }

                    $m['total_failed'] = count($reminders_failed_legal);
                    $m['total_pending'] = count($reminders_pending_legal);

                    array_push($items, $m);
                }

            }
        }

        return response()->json($items);
    }


    /**
     * Ajax configuration to get count of malfunction failed/pending
     */
    public function monitoringMalfunction(){
        $malfunctions_failed_legal = collect();
        $malfunctions_pending_legal = collect();

        foreach (Auth::user()->vehiclesOwned as $v) {
            foreach ($v->malfunctions as $vm) {
                if(!$vm->isCompleted() && $vm->end_date_reminder->lt(Carbon::now())){
                    $malfunctions_failed_legal->push($vm);
                }
            }
        }

        foreach (Auth::user()->vehiclesOwned as $v) {
            foreach ($v->malfunctions as $vm) {
                if(!$vm->isCompleted() && $vm->end_date_reminder->gte(Carbon::now())){
                    $malfunctions_pending_legal->push($vm);
                }
            }
        }

        return response()->json([
            'failed_count' => count($malfunctions_failed_legal),
            'pending_count' => count($malfunctions_pending_legal)
        ]);
    }


    /**
     * Ajax configuration to get count of malfunction failed/pending
     */
    public function monitoringReminder(){
        $reminders_failed_legal = collect();
        $reminders_pending_legal = collect();

        foreach (Auth::user()->vehiclesOwned as $v) {
            foreach ($v->reminders as $r) {
                if(!$r->isCompleted() && $r->end_date_reminder->lt(Carbon::now())){
                    $reminders_failed_legal->push($r);
                }
            }
        }

        foreach (Auth::user()->vehiclesOwned as $v) {
            foreach ($v->reminders as $r) {
                if(!$r->isCompleted() && $r->end_date_reminder->gte(Carbon::now())){
                    $reminders_pending_legal->push($r);
                }
            }
        }

        return response()->json([
            'failed_count' => count($reminders_failed_legal),
            'pending_count' => count($reminders_pending_legal)
        ]);
    }


    /**
     * Ajax store monitoring
     */
    public function monitoringStore(Request $request){
        $area_1 = $request->area_1;

        try{
            
            if($area_1 == ''){
                foreach (Auth::user()->configuration->monitorings as $value) {
                    $value->delete();
                }
                return 'success remove all';
                throw new Exception(trans('default.failedStore'));
            }else{
                //First remove all monitoring rows
                foreach (Auth::user()->configuration->monitorings as $value) {
                    $value->delete();
                }

                //Insert monitoring area_1
                if($area_1 != ''){
                    foreach ($area_1 as $value) {
                        $data = explode('=', $value);

                        $m = Monitoring::create([
                            'type' => $data[0],
                            'position' => $data[1],
                        ]);

                        $m->configuration()->associate(Auth::user()->configuration);
                        $m->save();
                    }
                }

                return 'success';
            }

        }catch(\Exception $e){
            dump($e->getMessage());
            return Redirect::back();
        }
    }
    

    public function authUser()
    {
    	$user = Auth::user();
        $user->role = Auth::user()->roles->first();
        return response()->json($user);
    }


    public function fillerList(){
        if(Auth::user()->hasRole('admin')){
            $filler_list[] = User::all();
        }else if(Auth::user()->hasRole('legal')){
            $filler_list = Auth::user()->legalEntityEmployees->toArray();
            $filler_list[] = Auth::user();
        }else if(Auth::user()->hasRole('employee')){
            $filler_list = Auth::user()->legalEntityUser->legalEntityEmployees->toArray();
            $filler_list[] = Auth::user()->legalEntityUser;
        }else{
            $filler_list[] = Auth::user();
        }
        
        return response()->json($filler_list);
    }


    public function destroy($id){
        $this->validate($request, [
            'comment_details' => 'required',
        ]);

        try{
            $c = Comment::findOrFail($id);

            $c->commenters()->attach(Auth::user(), ['details' => $request->comment_details]);
            $c->save();

            return Redirect::back();

        }catch(\Exception $e){
            dump($e->getMessage());
            return Redirect::back();
        }
    }


    public function homeRemindersList(Request $request){
        $type = $request->type_num;

        if(Auth::user()->hasRole('admin'))
            $vehicles_list = Vehicle::all();
        else if(Auth::user()->hasAnyRole(['legal', 'private']))
            $vehicles_list = Auth::user()->vehiclesOwned;
        else if(Auth::user()->hasRole('employee'))
            $vehicles_list = Auth::user()->legalEntityUser->vehiclesOwned;

        $vehicle_reminders = [];
        foreach($vehicles_list as $v){
            foreach($v->reminders as $r){
                if($type == 1){
                    if(!$r->isCompleted() && $r->end_date_reminder->lt(Carbon::now())){
                        array_push($vehicle_reminders, $r);
                    }
                }else{
                    if(!$r->isCompleted() && $r->end_date_reminder->gt(Carbon::now())){
                        array_push($vehicle_reminders, $r);
                    }
                }
                
            }
        }

        foreach($vehicle_reminders as $v){
            $v->push($v->reminders);
            $v->push($v->creator);
        }




        return response()->json(collect($vehicle_reminders)->sortBy(function($col){ 
                return $col['created_at']; 
            }, SORT_REGULAR, SORT_DESC)->values()->all()
        );
        
    }


    public function homeMalfunctionsList(Request $request){
        $type = $request->type_num;

        if(Auth::user()->hasRole('admin'))
            $vehicles_list = Vehicle::all();
        else if(Auth::user()->hasAnyRole(['legal', 'private']))
            $vehicles_list = Auth::user()->vehiclesOwned;
        else if(Auth::user()->hasRole('employee'))
            $vehicles_list = Auth::user()->legalEntityUser->vehiclesOwned;


        $vehicle_malfunctions = [];
        foreach($vehicles_list as $v){
            foreach($v->malfunctions as $vm){
                if($type == 1){
                    if(!$vm->isCompleted() && $vm->end_date_reminder->lt(Carbon::now())){
                        array_push($vehicle_malfunctions, $vm);
                    }
                }else{
                    if(!$vm->isCompleted() && $vm->end_date_reminder->gt(Carbon::now())){
                        array_push($vehicle_malfunctions, $vm);
                    }
                }
            }
        }

        foreach($vehicle_malfunctions as $v){
            $v->push($v->creator);
            $v->push($v->completedUserMalfunction);
        }

        return response()->json(collect($vehicle_malfunctions)->sortBy(function($col){ 
                return $col['created_at']; 
            }, SORT_REGULAR, SORT_DESC)->values()->all()
        );
    }

}
