<?php

namespace App\Http\Controllers;

use App\Color;
use App\Configuration;
use App\Country;
use App\GeographicalOriginLabel;
use App\Priority;
use App\RecurringReminder;
use App\Wine;


use App\User;
use App\Variety;
use App\Vineyard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Facades\Image;

use SimpleSoftwareIO\QrCode\Facades\QrCode;




class WineController extends Controller
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
       
        return view('wine.index')->with([
            'configurations' => $configurations,
            'priorities' => $priorities,
            'recurring_reminders' => $recurring_reminders,
            'countries' => $countries,
            'geoigraphical_origin_labels' => $geoigraphical_origin_labels,
            'colors' => $colors
        ]);
    }

    public function getGeoigraphicalOriginLabel(Request $request){

        $geoigraphical_origin_label = GeographicalOriginLabel::where('country_id', $request->id);
        return $geoigraphical_origin_label; 
    }

    public function getVineyards(Request $request){
        // Dobijamo vinograde za odabrani geografski region
        $vineyards = Vineyard::where('geographical_origin_id', $request->id)->get();
    
        // Vraćamo vinograde u obliku JSON-a
        return response()->json($vineyards);
    }

    public function getVariety(Request $request){
        // Dobijamo vinograde za odabrani geografski region
        $varieties = Variety::where('color_id', $request->id)->get();
       // dd($varieties);
        // Vraćamo vinograde u obliku JSON-a
        return response()->json($varieties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details(Request $request)
    {
        $id = $request->id;
        
        $wine = Wine::findOrFail($id);
       
        return $wine;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        // Validacija
        $request->validate([
            'name' => 'required|string',
            // 'harvest_date' => 'required|date',
            // 'harvest_method' => 'required|string',
            // 'vintage_variety' => 'required|string',
            // 'nutrition_data' => 'required|string',
            // 'allergen_declaration' => 'required|string',
            // 'country_of_origin' => 'required|string',
            // 'importer_bottler_manufacturer' => 'required|string',
            // 'geographical_origin_labels' => 'required|string',
            // 'harvest_year' => 'required|string',
            // 'alcohol_by_volume' => 'required|string',
            // 'net_quantity_ml' => 'required|string',
            // 'sugar_content' => 'required|string',
            // 'grape_variety_harvest_specific' => 'required|string',
            // 'product_description' => 'required|string',
            // 'expiration_date' => 'required|date',
        ], [
            'name.required' => 'Naziv vina je obvezan.',
            'harvest_date.required' => 'Datum berbe je obvezan.',
            'harvest_date.date' => 'Datum berbe mora biti u ispravnom formatu.',
            'harvest_method.required' => 'Način berbe je obvezan.',
            'vintage_variety.required' => 'Vintidž sorta je obvezna.',
            'nutrition_data.required' => 'Nutritivni podaci su obvezni.',
            'allergen_declaration.required' => 'Deklaracija alergena je obvezna.',
            'country_of_origin.required' => 'Zemlja podrijetla je obvezna.',
            'importer_bottler_manufacturer.required' => 'Uvoznik/Buteljer/Proizvođač je obvezan.',
            'geographical_origin_labels.required' => 'Geografske oznake podrijetla su obvezne.',
            'harvest_year.required' => 'Godina berbe je obvezna.',
            'alcohol_by_volume.required' => 'Alkohol po volumenu je obvezan.',
            'net_quantity_ml.required' => 'Neto količina u mililitrima je obvezna.',
            'sugar_content.required' => 'Sadržaj šećera je obvezan.',
            'grape_variety_harvest_specific.required' => 'Specifična sorta grožđa u berbi je obvezna.',
            'product_description.required' => 'Opis proizvoda je obvezan.',
            'expiration_date.required' => 'Datum isteka je obvezan.',
            'expiration_date.date' => 'Datum isteka mora biti u ispravnom formatu.',
        ]);
        if(isset($request->wine_id)){
            $wine = Wine::findOrFail($request->wine_id);
        }else{
            $wine = new Wine();
        }
       
        $wine->name = $request->name;
        $wine->harvest_date = $request->harvest_date;
        $wine->harvest_method = $request->harvest_method;
        $wine->vintage_variety = $request->vintage_variety;
        $wine->nutrition_data = $request->nutrition_data;
        $wine->allergen_declaration = $request->allergen_declaration;
        $wine->country_of_origin = $request->country_of_origin;
        $wine->importer_bottler_manufacturer = $request->importer_bottler_manufacturer;
        $wine->geographical_origin_labels = $request->geographical_origin_labels;
        $wine->harvest_year = $request->harvest_year;
        $wine->alcohol_by_volume = $request->alcohol_by_volume;
        $wine->net_quantity_ml = $request->net_quantity_ml;
        $wine->sugar_content = $request->sugar_content;
        $wine->grape_variety_harvest_specific = $request->grape_variety_harvest_specific;
        $wine->product_description = $request->product_description;
        $wine->expiration_date = $request->expiration_date;
        $wine->configuration_id = Auth::user()->companyConfiguration->id;
        $wine->price = $request->price;
        $wine->color_id = $request->color;
        $wine->variety_id = $request->vintage_variety;
        $wine->vineyard_id = $request->vineyard;
      
        if ($request->hasFile('wine_image_front')) {
            $frontImage = $request->file('wine_image_front')->store('public/wine_images');
            // Ukloni 'public/' iz putanje slike
            $frontImage = str_replace('public/', '', $frontImage);
            $wine->file_name_front = $frontImage;
        }
        
        if ($request->hasFile('wine_image_back')) {
            $backImage = $request->file('wine_image_back')->store('public/wine_images');
            // Ukloni 'public/' iz putanje slike
            $backImage = str_replace('public/', '', $backImage);
            $wine->file_name_back = $backImage;
        }
        
        $wine->save();
        $wineUrl = URL::to("/wines/product/{$wine->id}");
        $wine->qr =  QrCode::size(300)->generate($wineUrl);
        $wine->save();

        return redirect()->route('wines.index');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wine  $wine
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $wine = Wine::find($id);
        if (!$wine instanceof Wine) {
            return Redirect::back();
        }
        $msg = trans('wines.deleteVehicleMsg_1').' '.$wine->name.' '.trans('wines.deleteVehicleMsg_2');
        $wine->delete();
        return redirect()->route('wines.index')->with('message', $msg);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wine  $wine
     * @return \Illuminate\Http\Response
     */
    public function product($wine)
    {
        $wine = Wine::findOrFail($wine);
        // Dohvati URL-ove slika iz storage-a
        $frontImageUrl = asset('storage/' . $wine->file_name_front);
        $backImageUrl = asset('storage/' . $wine->file_name_back);
        $wines = Wine::where('configuration_id', $wine->configuration_id)
                        ->whereNotIn('id', [$wine->id]) // Isključujemo vino s odgovarajućim ID-om
                        ->inRandomOrder() // Koristimo inRandomOrder() umjesto orderByRaw('RAND()') za slučajni redoslijed
                        ->take(3)
                        ->get();// Ovde dobijamo cijele instance vina
        
        return view('wine.product', 
        [
            'wine' => $wine,
            'wines' => $wines,
            'frontImageUrl' => $frontImageUrl,
            'backImageUrl' => $backImageUrl,
        ]);
        
    }


    public function qr($wine)
    {
        $wine = Wine::findOrFail($wine);
        return view('wine.qr', 
        [
            'wine' => $wine,
        ]);
        
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wine  $wine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wine $wine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wine  $wine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wine $wine)
    {
        //
    }

    public function getWines(Request $request){
        $columns = array(
            0 => 'name',
            1 => 'vintage_variety',
            2 => 'harvest_year',
            3 => 'country_of_origin',
            4 => 'net_quantity_ml',
            5 => 'grape_variety_harvest_specific',
            6 => 'expiration_date',
        );
    
        $current_user= Auth::user();
    
        $query = Wine::query(); // Initialize query for all vehicles


        if ($current_user->hasRole('admin')) {
            $wine_list = Wine::all();
        } else if ($current_user->hasAnyRole(['legal', 'private', 'employee'])) {
            $wine_list =$query->where('configuration_id', $current_user->companyConfiguration->id);
        } else {
            $query->where('id', null); // Uzrokuje da upit ne vrati ništa
        }
    

            // Izvrši left join s tablicom 'configurations'
        $query->leftJoin('configuration', 'configuration.id', '=', 'wines.configuration_id') 
        ->select('wines.*');

        // Ako korisnik nema ulogu admina, onda je potrebno izvršiti još jedan whereIn
        if (!$current_user->hasRole('admin')) {
        $wine_list = $query->whereIn('wines.id', $wine_list->pluck('id'))->get();
        } else {
        $wine_list = $query->get();
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
                $q->where('wines.name', 'LIKE', "%{$search}%")
                    ->orWhereHas('configuration', function($query) use ($search) {
                        $query->where('applicationName', 'LIKE', "%{$search}%");
                    })
                  ->orWhere('wines.vintage_variety', 'LIKE', "%{$search}%")
                  ->orWhere('wines.harvest_year', 'LIKE', "%{$search}%")
                  ->orWhere('wines.country_of_origin', 'LIKE', "%{$search}%")
                  ->orWhere('wines.net_quantity_ml', 'LIKE', "%{$search}%")
                  ->orWhere('wines.grape_variety_harvest_specific', 'LIKE', "%{$search}%")
                  ->orWhere('wines.expiration_date', 'LIKE', "%{$search}%");
            });
    
            $totalFiltered = $query->count();
            $wines = $query->offset($start)
                             ->limit($limit)
                             ->orderBy($order, $dir);
        } else {
            $wines = $query->offset($start)
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
		
        $wines = $wines->groupBy('wines.id')
        ->offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();
    
        $data = array();
        foreach ($wines as $wine) {
            $nestedData = array();
            $nestedData[] = $wine->name ?? '-';
            $nestedData[] = $wine->variety->name ?? '-';
            $nestedData[] = isset($wine->harvest_date) ? \Carbon\Carbon::parse($wine->harvest_date)->format('d.m.Y') : '-';
            $nestedData[] = $wine->country->name ?? '-';
            $nestedData[] = $wine->net_quantity_ml ?? '-';
            $nestedData[] = isset($wine->price) ? $wine->price . '€' : '-';
            if($current_user->hasRole('admin|private|legal')){
                $nestedData[] = '
                    <div class="equal-size-buttons">
                        <button onclick="editWine(' . $wine->id . ')" class="btn" data-toggle="tooltip" data-placement="top" title="Uredi">
                            <img src="' . asset('img/interface/uredi.svg') . '">
                        </button>
                        <button onclick="deleteWine(' . $wine->id  . ')" class="btn"  title="Obriši">
                            <img src="' . asset('img/interface/kanta.svg') . '" >
                        </button>
                        <a href="/wines/product/'.$wine->id .'" id="reminders" class="btn" title="Stranica proizvoda">
                            <img src="' .  asset('img/interface/vidiLozinku.svg') .'">
                        </a>
                        <a href="/wines/qr/'.$wine->id .'" id="reminders" class="btn" title="Vidi qr kod proizvoda">
                        <img src="' .  asset('img/interface/vidiLozinku.svg') .'">
                    </a>

                    
                    </div>';
            }else{
                $nestedData[] = '<div class="equal-size-buttons">
                                    <button onclick="editWine(' . $wine->id . ')" class="btn" data-toggle="tooltip" data-placement="top" title="Uredi">
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

    public function archive(Request $request){
        $wines = Wine::all();

        return view('wine.archive', [
            'wines' => $wines,
            
        ]);
    }
}
