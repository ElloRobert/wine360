

<div class="modal fade" id="addWineModal" role="dialog" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-custom" role="document">
        <div class="modal-content">
            <!-- Sadržaj modala -->
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{ asset('img/interface/close.svg') }}"></button>
                <h2 class="modal-title modal-naslov" id="addVehicleModalLabel">{{ trans('wines.add') }}</h2>
            </div>
            <div class="modal-body">
               
                <div class="card text-center">
                    <div class="card-header mt-15">
                            <ul class="nav nav-pills card-header-pills">
                              <li class="nav-item col liPoravnanje active2">
                                <a class="nav-link active" href="#" id="identifikacijskiPodaci">Osnovni podaci</a>
                              </li>
                              <li class="nav-item col liPoravnanje">
                                <a class="nav-link " href="#" id="odrzavanje">Etiketa</a>
                              </li>
                              <li class="nav-item col liPoravnanje">
                                <a class="nav-link" href="#" id="status">Fotografije</a>
                              </li>
                            </ul>
                    </div>
                  </div>
                    <div class="row">
                        <form method="POST" action="{{ route('wines.store') }}" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                            <input class="form-control1 text-center" type="text" name="wine_id" id="wine_id" value="{{ old('id') }}" hidden/>
                            <div id="identifikacijskiPodaciInputi" class="">
                                <div class="col-xs-12 col-sm-6 padding0">
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="wine-name">{{ trans('wines.name') }}</label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <input class="form-control1 text-center" type="text" name="name" id="wine-name" value="{{ old('name') }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                @if($errors->has('name'))
                                                    <span class="help-block text-right">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="wine-harvest-date">{{ trans('wines.harvest_date') }}</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <input class="form-control1 text-center" type="date" name="harvest_date" id="wine-harvest-date" value="{{ old('harvest_date') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            @if($errors->has('harvest_date'))
                                                <span class="help-block text-right">
                                                    <strong>{{ $errors->first('harvest_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="wine-harvest-method">{{ trans('wines.harvest_method') }}</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <input class="form-control1 text-center" type="text" name="harvest_method" id="wine-harvest-method" value="{{ old('harvest_method') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            @if($errors->has('harvest_method'))
                                                <span class="help-block text-right">
                                                    <strong>{{ $errors->first('harvest_method') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="color">{{ trans('wines.color') }}</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <select class="form-control1 text-center" name="color" id="color">
                                                    @foreach ($colors as $color)
                                                        <option value="{{$color->id}}">{{$color->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            @if($errors->has('vintage_variety'))
                                                <span class="help-block text-right">
                                                    <strong>{{ $errors->first('vintage_variety') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="wine-vintage-variety">{{ trans('wines.vintage_variety') }}</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <select class="form-control1 text-center"  name="vintage_variety" id="wine-vintage-variety" ></select>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            @if($errors->has('vintage_variety'))
                                                <span class="help-block text-right">
                                                    <strong>{{ $errors->first('vintage_variety') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 padding0">
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="wine-country-of-origin">{{ trans('wines.country_of_origin') }}</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <select class="form-control1 text-center" name="country_of_origin" id="wine-country-of-origin">
                                                    @foreach ($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            @if($errors->has('country_of_origin'))
                                                <span class="help-block text-right">
                                                    <strong>{{ $errors->first('country_of_origin') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="wine-geographical-origin-label">{{ trans('wines.geographical_origin_label') }}</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <select class="form-control1 text-center" name="geographical_origin_labels" id="wine-geographical-origin-label">
                                                    <option value="">Odaberite geografski region</option>
                                                    @foreach($geoigraphical_origin_labels as $geoigraphical_origin_label)
                                                    <option value="{{$geoigraphical_origin_label->id}}">{{$geoigraphical_origin_label->region}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            @if($errors->has('geographical_origin_labels'))
                                                <span class="help-block text-right">
                                                    <strong>{{ $errors->first('geographical_origin_labels') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="vineyard">{{ trans('wines.vineyard') }}</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <select class="form-control1 text-center" name="vineyard" id="vineyard">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            @if($errors->has('geographical_origin_labels'))
                                                <span class="help-block text-right">
                                                    <strong>{{ $errors->first('geographical_origin_labels') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="price">{{ trans('wines.price') }}</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <input class="form-control1 text-center" type="text" name="price" id="wine-price" value="{{ old('price') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            @if($errors->has('price'))
                                                <span class="help-block text-right">
                                                    <strong>{{ $errors->first('price') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="odrzavanjeInputi" class="d-none">
                                <div class="col-xs-12 col-sm-6 padding0">
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="wine-nutrition-data">{{ trans('wines.nutrition_data') }}</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <input class="form-control1 text-center" type="text" name="nutrition_data" id="wine-nutrition-data" value="{{ old('nutrition_data') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            @if($errors->has('nutrition_data'))
                                                <span class="help-block text-right">
                                                    <strong>{{ $errors->first('nutrition_data') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="wine-allergen-declaration">{{ trans('wines.allergen_declaration') }}</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <textarea class="form-control1" name="allergen_declaration" id="wine-allergen-declaration">{{ old('allergen_declaration') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            @if($errors->has('allergen_declaration'))
                                                <span class="help-block text-right">
                                                    <strong>{{ $errors->first('allergen_declaration') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="wine-importer-bottler-manufacturer">{{ trans('wines.importer_bottler_manufacturer') }}</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <input class="form-control1 text-center" type="text" name="importer_bottler_manufacturer" id="wine-importer-bottler-manufacturer" value="{{ old('importer_bottler_manufacturer') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            @if($errors->has('importer_bottler_manufacturer'))
                                                <span class="help-block text-right">
                                                    <strong>{{ $errors->first('importer_bottler_manufacturer') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                  
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="wine-harvest-year">{{ trans('wines.harvest_year') }}</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <input class="form-control1 text-center" type="text" name="harvest_year" id="wine-harvest-year" value="{{ old('harvest_year') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            @if($errors->has('harvest_year'))
                                                <span class="help-block text-right">
                                                    <strong>{{ $errors->first('harvest_year') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="wine-sugar-content">{{ trans('wines.sugar_content') }}</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <input class="form-control1 text-center" type="text" name="sugar_content" id="wine-sugar-content" value="{{ old('sugar_content') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            @if($errors->has('sugar_content'))
                                                <span class="help-block text-right">
                                                    <strong>{{ $errors->first('sugar_content') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-xs-12 col-sm-6 padding0">
                                   
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="wine-alcohol-by-volume">{{ trans('wines.alcohol_by_volume') }}</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <input class="form-control1 text-center" type="text" name="alcohol_by_volume" id="wine-alcohol-by-volume" value="{{ old('alcohol_by_volume') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            @if($errors->has('alcohol_by_volume'))
                                                <span class="help-block text-right">
                                                    <strong>{{ $errors->first('alcohol_by_volume') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="wine-net-quantity-ml">{{ trans('wines.net_quantity_ml') }}</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <input class="form-control1 text-center" type="text" name="net_quantity_ml" id="wine-net-quantity-ml" value="{{ old('net_quantity_ml') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            @if($errors->has('net_quantity_ml'))
                                                <span class="help-block text-right">
                                                    <strong>{{ $errors->first('net_quantity_ml') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="wine-grape-variety-harvest-specific">{{ trans('wines.grape_variety_harvest_specific') }}</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <input class="form-control1 text-center" type="text" name="grape_variety_harvest_specific" id="wine-grape-variety-harvest-specific" value="{{ old('grape_variety_harvest_specific') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            @if($errors->has('grape_variety_harvest_specific'))
                                                <span class="help-block text-right">
                                                    <strong>{{ $errors->first('grape_variety_harvest_specific') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="wine-product-description">{{ trans('wines.product_description') }}</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <textarea class="form-control1" name="product_description" id="wine-product-description">{{ old('product_description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            @if($errors->has('product_description'))
                                                <span class="help-block text-right">
                                                    <strong>{{ $errors->first('product_description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="wine-expiration-date">{{ trans('wines.expiration_date') }}</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <input class="form-control1 text-center" type="date" name="expiration_date" id="wine-expiration-date" value="{{ old('expiration_date') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            @if($errors->has('expiration_date'))
                                                <span class="help-block text-right">
                                                    <strong>{{ $errors->first('expiration_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                  
                                </div>
                                
                            </div>
                            <div id="statusInputi" class="d-none">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <label for="wine-image-front">Slika vina (prednja strana):</label>
                                        <input type="file" class="form-control" id="wine-image-front" name="wine_image_front">
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <label for="wine-image-back">Slika vina (mala za karticu):</label>
                                        <input type="file" class="form-control" id="wine-image-back" name="wine_image_back">
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div id="zivotniVijekInputi" class="d-none">
                                <div class="card">
                                    <div class="card-header">
                                        <h2></h2>
                                    </div>
                                    <div class="card-body" id="qrCode">
                                     {!! QrCode::size(300)->generate('https://shop.belje.hr/'); !!}
                                    </div>
                                </div>
                            </div>
                            @role('admin|private|legal')
                                <div class="form-group row mt-15">
                                    <div class="col-xs-12 col-sm-12 text-center padding0 mt-mt-15">
                                        <button id="insertEditSubmitAction" class="btn gumb mt-15">{{ trans('default.save') }}</button>
                                    </div>
                                </div>
                            @endrole
                        </form>
            </div>
        </div>
    </div>
</div>
</div>


<script>
    $(document).ready(function() {
      $('.nav-pills .nav-item').on('click', function() {
        // Ukloni class 'active' s trenutno aktivnog elementa
        $('.nav-pills .nav-item .nav-link.active').removeClass('active');
        // Ukloni class 'active2' s trenutno aktivnog elementa
        $('.nav-pills .nav-item.active2').removeClass('active2');

        $(this).addClass('active2');

        $(this).find('.nav-link').addClass('active');
      });

       // Provjeravamo ulogu korisnika
       var isEmployee = {{ auth()->user()->hasRole('employee') ? 'true' : 'false' }};
        if (isEmployee) {
            // Dodjeljujemo disabled atribut svim inputima i selectima unutar određenih elemenata
            $('#addVehicleModal input, select').prop('disabled', true);
        }
    });

    $('#identifikacijskiPodaci').on('click', function() {
        $('#identifikacijskiPodaciInputi').removeClass('d-none');

        $('#odrzavanjeInputi').addClass('d-none');
        $('#statusInputi').addClass('d-none');
        $('#zivotniVijekInputi').addClass('d-none');
        $('#nabavaInputi').addClass('d-none');
        $('#tehnickiPodaciInputi').addClass('d-none');
    });

    $('#odrzavanje').on('click', function() {
        $('#odrzavanjeInputi').removeClass('d-none');

        $('#identifikacijskiPodaciInputi').addClass('d-none');
        $('#statusInputi').addClass('d-none');
        $('#zivotniVijekInputi').addClass('d-none');
        $('#nabavaInputi').addClass('d-none');
        $('#tehnickiPodaciInputi').addClass('d-none');
    });

    $('#status').on('click', function() {
        $('#statusInputi').removeClass('d-none');

        $('#identifikacijskiPodaciInputi').addClass('d-none');
        $('#odrzavanjeInputi').addClass('d-none');
        $('#zivotniVijekInputi').addClass('d-none');
        $('#nabavaInputi').addClass('d-none');
        $('#tehnickiPodaciInputi').addClass('d-none');
    });

    $('#zivotniVijek').on('click', function() {
        $('#zivotniVijekInputi').removeClass('d-none');

        $('#identifikacijskiPodaciInputi').addClass('d-none');
        $('#odrzavanjeInputi').addClass('d-none');
        $('#statusInputi').addClass('d-none');
        $('#nabavaInputi').addClass('d-none');
        $('#tehnickiPodaciInputi').addClass('d-none');
    });

    $('#nabava').on('click', function() {
        $('#nabavaInputi').removeClass('d-none'); 

        $('#identifikacijskiPodaciInputi').addClass('d-none');
        $('#odrzavanjeInputi').addClass('d-none');
        $('#statusInputi').addClass('d-none');
        $('#zivotniVijekInputi').addClass('d-none');
        $('#tehnickiPodaciInputi').addClass('d-none');
    });

    $('#tehnickiPodaci').on('click', function() {
        $('#tehnickiPodaciInputi').removeClass('d-none');

        $('#nabavaInputi').addClass('d-none'); 
        $('#identifikacijskiPodaciInputi').addClass('d-none');
        $('#odrzavanjeInputi').addClass('d-none');
        $('#statusInputi').addClass('d-none');
        $('#zivotniVijekInputi').addClass('d-none');
        
    });

    $('.select2').select2();
  </script>

<script>
    $(document).ready(function () {
        $('#wine-geographical-origin-label').change(function () {
            var geoOriginId = $(this).val();

            // Ako nije odabran nijedan geografski region, ne radimo ništa
            if (!geoOriginId) {
                $('#vineyard').html('<option value="">Odaberite vinograd</option>');
                return;
            }

            // Napravimo Axios upit ka ruti
            axios.get('{{ route("winery.getVineyards") }}', {
                params: {
                    id: geoOriginId
                }
            })
            .then(function (response) {
                // Uspješno dohvaćeni podaci
                var vineyards = response.data;

                // Očistimo prethodne opcije u selectu
                $('#vineyard').html('');

                // Dodajemo opcije u select pomoću jQuery-a
                $.each(vineyards, function (index, vineyard) {
                    $('#vineyard').append('<option value="' + vineyard.id + '">' + vineyard.name + '</option>');
                });
            })
            .catch(function (error) {
                // Greška prilikom dohvaćanja podataka
                console.error('Greška prilikom dohvaćanja vinograda:', error);
                // Ako se dogodi greška, obrišemo opcije u selectu
                $('#vineyard').html('<option value="">Nema dostupnih vinograda</option>');
            });
        });

        $('#color').change(function() {
            var colorId = $(this).val(); // Dobivanje ID-a odabrane boje

            axios.get('{{ route("wine.getVariety") }}', {
                params: {
                    id: colorId
                }
            })
            .then(function (response) {
                // Dohvaćanje sorti iz odgovora
                var varieties = response.data;

                // Ažuriranje polja "vintage_variety" s novim opcijama
                var options = '';
                varieties.forEach(function(variety) {
                    options += '<option value="' + variety.id + '">' + variety.name + '</option>';
                });
                $('#wine-vintage-variety').html(options);
            })
            .catch(function (error) {
                console.error('Došlo je do greške:', error);
            });
        });
    });
</script>

  
