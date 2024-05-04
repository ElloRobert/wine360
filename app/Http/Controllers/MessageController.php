<?php

namespace App\Http\Controllers;

use App\Color;
use App\Configuration;
use App\Country;
use App\GeographicalOriginLabel;
use App\Message;
use App\Priority;
use App\RecurringReminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_user = Auth::user();
        if($current_user->hasRole('admin')){
            $configurations = Configuration::all();
        }else{
            $configurations = null;
        }

        $priorities = Priority::all();
        $recurring_reminders  = RecurringReminder::all();
        $countries = Country::all();
        $geoigraphical_origin_labels = GeographicalOriginLabel::where('country_id', 1)->get();
        $colors = Color::all();
        
       
        return view('messages.index')->with([
            'configurations' => $configurations,
            'priorities' => $priorities,
            'recurring_reminders' => $recurring_reminders,
            'countries' => $countries,
            'geoigraphical_origin_labels' => $geoigraphical_origin_labels,
            'colors' => $colors,
        ]);
    }

    public function getMessages(Request $request){
        $columns = array(
            0 => 'user_name',
            1 => 'email',
            2 => 'message',
            3 => 'created_at',
        );
    
        $current_user= Auth::user();
    
        $query = Message::query(); // Initialize query for all vehicles


        if ($current_user->hasRole('admin')) {
            $message_list = Message::all();
        } else if ($current_user->hasAnyRole(['legal', 'private', 'employee'])) {
            $message_list =$query->where('configuration_id', $current_user->companyConfiguration->id);
        } else {
            $query->where('id', null); // Uzrokuje da upit ne vrati ništa
        }
    

            // Izvrši left join s tablicom 'configurations'
        $query->leftJoin('configuration', 'configuration.id', '=', 'messages.configuration_id') 
        ->select('messages.*');

        // Ako korisnik nema ulogu admina, onda je potrebno izvršiti još jedan whereIn
        if (!$current_user->hasRole('admin')) {
        $message_list = $query->whereIn('messages.id', $message_list->pluck('id'))->get();
        } else {
        $message_list = $query->get();
        }
    

    
        $totalData = $query->count();
    
        $totalFiltered = $totalData;
    
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
    
        $search = $request->input('search.value');
    
        if (!empty($search)) {
            $query = $query->where(function ($q) use ($search) {
                $q->where('messages.user_name', 'LIKE', "%{$search}%")
                  ->orWhere('messages.email', 'LIKE', "%{$search}%")
                  ->orWhere('messages.message', 'LIKE', "%{$search}%")
                  ->orWhere('messages.created_at', 'LIKE', "%{$search}%");
            });
    
            $totalFiltered = $query->count();
            $messages = $query->offset($start)
                             ->limit($limit)
                             ->orderBy($order, $dir);
        } else {
            $messages = $query->offset($start)
                             ->limit($limit)
                             ->orderBy($order, $dir);
        }
        

        // // Filteri
		// $statusFilter = $request->input('statusFilter');
		// if (!empty($statusFilter)) {
		// 	$vehicles->where('vehicle_status_id', $statusFilter);
		// }

		// $grupaVozilaFilter = $request->input('grupaVozilaFilter');
		// if (!empty($grupaVozilaFilter)) {
		// 	$vehicles->where('vehicle_groups.id', $grupaVozilaFilter);
		// }

		// $podkategorijaFilter = $request->input('podkategorijaFilter');
		// if (!empty($podkategorijaFilter)) {
		// 	$vehicles->where('vehicles.subcategory_id', $podkategorijaFilter);
		// }
        
        // $categoryFilter = $request->input('categoryFilter');
        
		// if (!empty($categoryFilter)) {
		// 	$vehicles->where('vehicle_category_id', $categoryFilter);
		// }

		// $markaFilter = $request->input('markaFilter');
		// if (!empty($markaFilter)) {
		// 	$vehicles->where('make_id', $markaFilter);
		// }

        // $modelFilter = $request->input('modelFilter');
		// if (!empty($modelFilter)) {
		// 	$vehicles->where('vehicles.model', $modelFilter);
		// }
        // $propertyFilter = $request->input('propertyFilter');
		// if (!empty($propertyFilter)) {
		// 	$vehicles->where('vehicle_property_id', $propertyFilter);
		// }
		
        $messages = $messages->groupBy('messages.id')
        ->offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();
    
        $data = array();
        foreach ($messages as $message) {
            $nestedData = array();
            $nestedData[] = $message->user_name ?? '-';
            $nestedData[] = $message->email ?? '-';
            $nestedData[] = isset($message->created_at) ? Carbon::parse($message->created_at)->format('d.m.Y H:i:s') : '-';
            $nestedData[] = $message->message ?? '-';
            if($current_user->hasRole('admin|private|legal')){
                $nestedData[] = '
                    <div class="equal-size-buttons">
                        <button onclick="editWine(' . $message->id . ')" class="btn" data-toggle="tooltip" data-placement="top" title="Uredi">
                            <img src="' .  asset('img/interface/vidiLozinku.svg') .'">
                        </button>
                        <button onclick="deleteWine(' . $message->id  . ')" class="btn"  title="Obriši">
                            <img src="' . asset('img/interface/kanta.svg') . '" >
                        </button>
                        <a href="/wines/product/'.$message->id .'" id="reminders" class="btn" title="Stranica proizvoda">
                            <img src="' .  asset('img/interface/vidiLozinku.svg') .'">
                        </a>
                    </div>';
            }else{
                $nestedData[] = '<div class="equal-size-buttons">
                                    <button onclick="editWine(' . $message->id . ')" class="btn" data-toggle="tooltip" data-placement="top" title="Uredi">
                                        <img src="' . asset('img/interface/vidiLozinku.svg') . '">
                                    </button>
                                </div>';
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

    public function store(Request $request)
    {
        // Validacija podataka
        $request->validate([
            'user_name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
            'configuration_id' => 'required|integer',
        ]);

        // Spremanje podataka u bazu
        $message = Message::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'message' => $request->message,
            'configuration_id' => $request->configuration_id,
        ]);

        // Provjera jesu li podaci uspješno spremljeni
        if ($message) {
            // Ako je sve u redu, vraćamo odgovor s uspjehom
            return Redirect::back();
        } else {
            // Ako se dogodila greška pri spremanju, vraćamo odgovor s greškom
            return Redirect::back();
        }
    }
}
