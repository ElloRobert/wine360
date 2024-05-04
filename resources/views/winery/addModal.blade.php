

<div class="modal fade" id="addWineryModal" role="dialog" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-custom" role="document">
        <div class="modal-content">
            <!-- Sadržaj modala -->
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{ asset('img/interface/close.svg') }}"></button>
                <h2 class="modal-title modal-naslov" id="addVehicleModalLabel">{{ trans('winery.add') }}</h2>
            </div>
            <div class="modal-body">
                <div class="card text-center">
                    <div class="card-header mt-15">
                            <ul class="nav nav-pills card-header-pills">
                              <li class="nav-item col liPoravnanje active2" style="width:49%">
                                <a class="nav-link active" href="#" id="podaciOVinariji">Podaci o vinariji</a>
                              </li>
                              <li class="nav-item col liPoravnanje" style="width:50%">
                                <a class="nav-link " href="#" id="podaciWebStranica">Podaci za web stranicu </a>
                              </li>
                            </ul>
                    </div>
                    <div class="card-body mt-15">
                      
                    </div>
                  </div>
                    <div class="row">
                        <form method="POST" action="{{ route('winery.store') }}" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                            <input class="form-control1 text-center" type="text" name="configuration_id" id="configuration_id" value="{{ old('configuration_id') }}" hidden/>
                            <div id="podaciOVinarijiInputi" class="">
                                <div class="col-xs-12 col-sm-6 padding0">
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="applicationName">{{ trans('winery.applicationName') }}</label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <input class="form-control1 text-center" type="text" name="applicationName" id="winery-applicationName" value="{{ old('applicationName') }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                @if($errors->has('applicationName'))
                                                    <span class="help-block text-right">
                                                    <strong>{{ $errors->first('applicationName') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="applicationAddress">{{ trans('winery.applicationAddress') }}</label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <input class="form-control1 text-center" type="text" name="applicationAddress" id="winery-applicationAddress" value="{{ old('applicationAddress') }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                @if($errors->has('applicationAddress'))
                                                    <span class="help-block text-right">
                                                    <strong>{{ $errors->first('applicationAddress') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="applicationCity">{{ trans('winery.applicationCity') }}</label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <input class="form-control1 text-center" type="text" name="applicationCity" id="winery-applicationCity" value="{{ old('applicationCity') }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                @if($errors->has('applicationCity'))
                                                    <span class="help-block text-right">
                                                    <strong>{{ $errors->first('applicationCity') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="applicationZip">{{ trans('winery.applicationZip') }}</label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <input class="form-control1 text-center" type="text" name="applicationZip" id="winery-applicationZip" value="{{ old('applicationZip') }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                @if($errors->has('applicationZip'))
                                                    <span class="help-block text-right">
                                                    <strong>{{ $errors->first('applicationZip') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="col-xs-12 col-sm-6 padding0">
                                  
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="applicationCountry">{{ trans('winery.applicationCountry') }}</label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <input class="form-control1 text-center" type="text" name="applicationCountry" id="winery-applicationCountry" value="{{ old('applicationCountry') }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                @if($errors->has('applicationCountry'))
                                                    <span class="help-block text-right">
                                                    <strong>{{ $errors->first('applicationCountry') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="applicationPhone">{{ trans('winery.applicationPhone') }}</label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <input class="form-control1 text-center" type="text" name="applicationPhone" id="winery-applicationPhone" value="{{ old('applicationPhone') }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                @if($errors->has('applicationPhone'))
                                                    <span class="help-block text-right">
                                                    <strong>{{ $errors->first('applicationPhone') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="emailForReports">{{ trans('winery.emailForReports') }}</label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <input class="form-control1 text-center" type="text" name="emailForReports" id="winery-emailForReports" value="{{ old('emailForReports') }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                @if($errors->has('emailForReports'))
                                                    <span class="help-block text-right">
                                                    <strong>{{ $errors->first('emailForReports') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="OIB">{{ trans('winery.OIB') }}</label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <input class="form-control1 text-center" type="text" name="OIB" id="winery-OIB" value="{{ old('OIB') }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                @if($errors->has('OIB'))
                                                    <span class="help-block text-right">
                                                    <strong>{{ $errors->first('OIB') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                            <div id="podaciWebStranicaInputi" class="d-none">
                                <div class="col-xs-12 col-sm-6 padding0">
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="winery_description">{{ trans('winery.winery_description') }}</label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <textarea class="form-control1 text-center" name="winery_description" id="winery_description">{{ old('winery_description') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                @if($errors->has('winery_description'))
                                                    <span class="help-block text-right">
                                                        <strong>{{ $errors->first('winery_description') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="innovations">{{ trans('winery.innovations') }}</label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <textarea class="form-control1 text-center" name="innovations" id="winery-innovations">{{ old('innovations') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                @if($errors->has('innovations'))
                                                    <span class="help-block text-right">
                                                        <strong>{{ $errors->first('innovations') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="packaging">{{ trans('winery.packaging') }}</label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <textarea class="form-control1 text-center" name="packaging" id="winery-packaging">{{ old('packaging') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                @if($errors->has('packaging'))
                                                    <span class="help-block text-right">
                                                        <strong>{{ $errors->first('packaging') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 padding0">
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="wine_assortment">{{ trans('winery.wine_assortment') }}</label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <textarea class="form-control1 text-center" name="wine_assortment" id="winery-wine_assortment">{{ old('wine_assortment') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                @if($errors->has('wine_assortment'))
                                                    <span class="help-block text-right">
                                                        <strong>{{ $errors->first('wine_assortment') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="awards">{{ trans('winery.awards') }}</label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <textarea class="form-control1 text-center" name="awards" id="winery-awards">{{ old('awards') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                @if($errors->has('awards'))
                                                    <span class="help-block text-right">
                                                        <strong>{{ $errors->first('awards') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>   
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

    $('#podaciOVinariji').on('click', function() {
        $('#podaciOVinarijiInputi').removeClass('d-none');
        $('#podaciWebStranicaInputi').addClass('d-none');
    });

    $('#podaciWebStranica').on('click', function() {
        $('#podaciWebStranicaInputi').removeClass('d-none');
        $('#podaciOVinarijiInputi').addClass('d-none');
       
    });
    $('.select2').select2();

  </script>
  
