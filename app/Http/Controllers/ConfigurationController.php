<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Configuration;
use App\CostType;
use App\Country;
use App\GeographicalOriginLabel;
use App\Industry;
use App\Priority;
use App\RecurringReminder;
use App\Supplier;
use App\Vehicle;
use App\VehicleCategory;
use App\VehicleGroup;
use App\VehicleProperty;
use App\VehicleStatus;
use App\Wine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->hasRole('legal')) {
            $employees = $user->legalEntityEmployees;
        } else if ($user->hasRole('employee')) {
            $employees = $user->legalEntityUser->legalEntityEmployees;
        } else {
            $employees = collect();
        }

        list ($active_employees, $inactive_employees) = $employees->partition(function ($employee) {
            return (bool) $employee->is_active;
        });

        $recurring_reminders = RecurringReminder::all();
        $priorities = Priority::all();

        return view('configuration.index', [
            'active_employees' => $active_employees,
            'inactive_employees' => $inactive_employees,
            'recurring_reminders' => $recurring_reminders,
            'priorities' => $priorities,
        ]);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function winery(Request $request)
    {
        $user = $request->user();

        $recurring_reminders = RecurringReminder::all();
        $priorities = Priority::all();
        $configurations  = Configuration::all();
        $countries = Country::all();
        $geoigraphical_origin_labels = GeographicalOriginLabel::where('country_id', 1)->get();
        $colors = Color::all();


        return view('winery.index', [
            'recurring_reminders' => $recurring_reminders,
            'priorities' => $priorities,
            'configurations' => $configurations,
            'countries' => $countries,
            'geoigraphical_origin_labels' => $geoigraphical_origin_labels,
            'colors' => $colors,
        ]);
    }

    public function archive(Request $request){
        $wineries = Configuration::all();

        return view('winery.archive', [
            'wineries' => $wineries,
            
        ]);
    }

    public function getWineries(Request $request){
        $columns = array(
            0 => 'applicationName',
            1 => 'applicationAddress',
            2 => 'applicationCity',
            3 => 'applicationState',
            4 => 'emailForReports',
            5 => 'applicationPhone',
        );
    
        $current_user= Auth::user();
    
  
        $winery_list = Configuration::where('user_id',$current_user->id);
   
    

            // Izvrši left join s tablicom 'configurations'
        if ($current_user->hasRole('admin')) {
            $query = Configuration::select('configuration.*');
        } else if ($current_user->hasAnyRole(['legal', 'private'])) {
            $query = Configuration::where('user_id',$current_user->id)->select('configuration.*');
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
                $q->where('configuration.applicationName', 'LIKE', "%{$search}%")
                  ->orWhere('configuration.applicationAddress', 'LIKE', "%{$search}%")
                  ->orWhere('configuration.applicationCity', 'LIKE', "%{$search}%")
                  ->orWhere('configuration.applicationState', 'LIKE', "%{$search}%")
                  ->orWhere('configuration.emailForReports', 'LIKE', "%{$search}%")
                  ->orWhere('configuration.applicationPhone', 'LIKE', "%{$search}%");
            });
    
            $totalFiltered = $query->count();
            $wineries = $query->offset($start)
                             ->limit($limit)
                             ->orderBy($order, $dir);
        } else {
            $wineries = $query->offset($start)
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
		
        $wineries = $wineries->groupBy('configuration.id')
        ->offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();
    
        $data = array();
        foreach ($wineries as $winery) {
            $nestedData = array();
            $nestedData[] = $winery->applicationName ?? '-';
            $nestedData[] = $winery->applicationAddress ?? '-';
            $nestedData[] = $winery->applicationCity ?? '-';
            $nestedData[] = $winery->applicationCountry ?? '-';
            $nestedData[] = $winery->emailForReports ?? '-';
            $nestedData[] = $winery->applicationPhone ?? '-';
            if($current_user->hasRole('admin|private|legal')){
                $nestedData[] = '
                    <div class="equal-size-buttons">
                        <button onclick="editWinery(' . $winery->id . ')" class="btn" data-toggle="tooltip" data-placement="top" title="Uredi">
                            <img src="' . asset('img/interface/uredi.svg') . '">
                        </button>
                        <button onclick="deleteWinery(' . $winery->id  . ')" class="btn"  title="Obriši">
                            <img src="' . asset('img/interface/kanta.svg') . '" >
                        </button>
                        <a href="/winery/product/'.$winery->id .'" id="reminders" class="btn" title="Stranica proizvoda">
                            <img src="' .  asset('img/interface/vidiLozinku.svg') .'">
                        </a>
                        <a href="/winery/qr/'.$winery->id .'" id="reminders" class="btn" title="Vidi qr kod proizvoda">
                            <i class="fa-solid fa-qrcode" style="color:#717171"></i>
                        </a>

                    
                    </div>';
            }else{
                $nestedData[] = '<div class="equal-size-buttons">
                                    <button onclick="editWine(' . $winery->id . ')" class="btn" data-toggle="tooltip" data-placement="top" title="Uredi">
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

    public function details(Request $request)
    {
        $id = $request->id;
        
        $winery = configuration::findOrFail($id);
       
        return $winery;
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
       // Pronalaženje ili kreiranje konfiguracijskog zapisa
        $configuration = Configuration::where('user_id', $request->user()->id)->first();
        if (!$configuration) {
            $configuration = new Configuration();
            $configuration->user_id = $request->user()->id;
        }

        // Ažuriranje vrijednosti starih polja
        $configuration->applicationAddress = $request->applicationAddress;
        $configuration->applicationAddress2 = $request->applicationAddress2;
        $configuration->applicationCity = $request->applicationCity;
        $configuration->applicationState = $request->applicationState;
        $configuration->applicationZip = $request->applicationZip;
        $configuration->applicationCountry = $request->applicationCountry;
        $configuration->applicationPhone = $request->applicationPhone;
        $configuration->applicationIndustry = $request->applicationIndustry;
        $configuration->applicationPricePerLiter = $request->applicationPricePerLiter;

        // Ažuriranje vrijednosti novih polja
        $configuration->winery_description = $request->wineryDescription;
        $configuration->innovations = $request->innovations;
        $configuration->packaging = $request->packaging;
        $configuration->wine_assortment = $request->wineAssortment;
        $configuration->awards = $request->awards;
        $configuration->save();

        $msg = trans('default.successfulUpdateConfiguration');

        return Redirect::back()->with('message-success', $msg);
    }

    /**
     * Update Application name
     */
    public function updateConfigurationName($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'sometimes|string|max:255|nullable'
        ]);

        $user_config = Configuration::where('user_id', $id)->first();

        if ($user_config instanceof Configuration) {
            $user_config->update([
                'applicationName' => $request->get('name'),
            ]);
        }

        return Redirect::back();
    }

    /**
     * Update application image
     */
    public function updateConfigurationImage(Request $request)
    {
        $this->validate($request, [
            'u' => 'required|exists:users,id',
            'headline_image' => 'required|mimes:jpeg,jpg,png,svg|max:150'
        ]);

        $user_config = Configuration::where('user_id', $request->get('u'))->first();

        if ($user_config instanceof Configuration) {
            $path = 'img/applicationImage/';

            File::delete($path . $user_config->applicationImage);

            $file = $request->file('headline_image');

            $file->move($path, $file->getClientOriginalName());

            $user_config->update([
                'applicationImage' => $file->getClientOriginalName(),
            ]);
        }

        return Redirect::back();
    }

    /**
     * Remove configuration image
     */
    public function removeConfigurationImage(Request $request)
    {
        $this->validate($request, [
            'u' => 'required|exists:users,id'
        ]);

        $path = 'img/applicationImage/';

        $user_config = Configuration::where('user_id', $request->get('u'))->first();

        if ($user_config instanceof Configuration) {
            File::delete($path . $user_config->applicationImage);

            $user_config->update([
                'applicationImage' => NULL,
            ]);
        }

        return Redirect::back();
    }

    public function product($winery)
    {
        $winery = Configuration::findOrFail($winery);
        $wines = $winery->wines;
        return view('winery.product', 
        [
            'winery' => $winery,
            'wines' => $wines,
        ]);
        
    }

    public function wineryStore(Request $request){
      // dd($request->all());
        // Validacija
        $request->validate([
            'applicationName' => 'required|string',
            // 'applicationCity' => 'required|string',
            // 'applicationZip' => 'required|string',
            // 'applicationCountry' => 'required|string',
            // 'applicationPhone' => 'required|string',
            // 'emailForReports' => 'required|string',
            // 'OIB' => 'required|string',
            // 'winery_description' => 'required|string',
            // 'innovations' => 'required|string',
            // 'packaging' => 'required|string',
            // 'wine_assortment' => 'required|string',
            // 'awards' => 'required|string',
        ], [
            'applicationName.required' => 'Naziv vina je obvezan.',
            
        ]);

        if(isset($request->configuration_id)){
            $configuration = Configuration::findOrFail($request->configuration_id);
        }else{
            $configuration = new Configuration();
        }
       
        $configuration->applicationName = $request->applicationName;
        $configuration->applicationAddress = $request->applicationAddress;
        $configuration->applicationCity = $request->applicationCity;
        $configuration->applicationZip = $request->applicationZip;
        $configuration->applicationCountry = $request->applicationCountry;
        $configuration->applicationPhone = $request->applicationPhone;
        $configuration->emailForReports = $request->emailForReports;
        $configuration->OIB = $request->OIB;
        $configuration->winery_description = $request->winery_description;
        $configuration->innovations = $request->innovations;
        $configuration->packaging = $request->packaging;
        $configuration->wine_assortment = $request->wine_assortment;
        $configuration->awards = $request->awards;
       
        
        $configuration->save();
        $wineUrl = URL::to("/winery/product/{$configuration->id}"); 
        $configuration->qr =  QrCode::size(300)->generate($wineUrl);
        $configuration->save();

        $msg = 'Vinarija'. $configuration->applicationName .' uspješno spremljena';
        return redirect()->route('winery.index')->with('message', $msg);
    }

    public function delete($id)
    {
        $winery = Configuration::find($id);
        if (!$winery instanceof Configuration) {
            return Redirect::back();
        }
        $msg = trans('wines.deleteVehicleMsg_1').' '.$winery->name.' '.trans('wines.deleteVehicleMsg_2');
        $winery->delete();
        return redirect()->route('winery.index')->with('message', $msg);
    }

    public function qr($winery)
    {
        $winery = Configuration::findOrFail($winery);
        return view('winery.qr', 
        [
            'winery' => $winery,
        ]);
        
    }
}
