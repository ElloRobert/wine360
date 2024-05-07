@extends('layouts.app')

@section('body_class', 'body__interface')

@section('content')


<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">

      <!-- Collapsed Hamburger -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!-- Branding Image -->
      <a class="navbar-brand" href="{{ url('/home') }}">
        <img class="logo" src="{{ asset('img/interface/logo.svg') }}" alt="Wine360 logo" />
      </a>
    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">
       <div id="edit-application-name" class="col-xs-12">
        <div class="">
          {{ csrf_field() }}
          <div class="d-none">
            @role('employee')
              @if(Auth::user()->legalEntityUser->configuration->applicationName != null)
                <span>
                  {{ Auth::user()->legalEntityUser->configuration->applicationName }}
                </span>
              @endif
            @endrole
            @role('admin|legal|private')
              <div class="app-name-block">
                <span
                  @if ($errors->has('headline_image')) style="margin-top: 0; margin-bottom: 0;" @endif id="editAppName">
                  {{ Auth::user()->configuration->applicationName }}
                </span>
              </div>

              <div class="form-group">
                <div class="col-xs-12 col-sm-12 padding0">
                  @if ($errors->has('headline_image'))
                    <span class="help-block text-center">
                      <strong>{{ $errors->first('headline_image') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
            @endrole
        </div>
        </div>
      </div> 
      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          @if(empty(Auth::user()->image))
          <div class="user-image-circle">
            <form id="edit-user-image" action="{{ route('user.image.edit') }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}

              <label for="headline-user-image">
                <img src="{{ url('/img/interface/add-icon.svg') }}">
              </label>
              <input style="display: none;" id="headline-user-image" type="file" name="headline-user-image">
            </form>
          </div>

          @else
          <div style="background-image: url('{{ url('img/userImage') }}/{{Auth::user()->image}}');" class="user-image-circle user-has-image">
          </div>
          @endif
          <div class="row" style="margin-top: 20px; margin-left:15px;">
            <div class="com-sm-12">
              <span>
                {{ Auth::user()->name }}
              </span>
            </div>
            <div class="com-sm-12">
              <span>
                {{ Auth::user()->roles->first()->name }}
              </span>
            </div>
          </div>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="margin-top: 35px">
            <img src="{{ url('/img/interface/load-more-icon.svg') }}">
          </a>
          <ul class="dropdown-menu" role="menu">
            <li>
              <a href="{{ route('user-settings.edit', [Auth::user()->id]) }}">{{ trans('user.title') }}</a>
            </li>
            <li>
              <a href="{{ route('configuration') }}" id="settings">
                <span>{{ trans('default.settings') }}</span>
              </a>
            </li>
            <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ trans('default.logout') }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown mr-15">
           <a href="{{ route('reminders.index') }}" id="remindersZvonce">
            <img src="{{ asset('img/interface/zvonce.svg') }}" class="smanjena-slika" id="zvonce">
          </a> 
        </li>
        <li class="dropdown mr-25">
          <img src="{{ asset('img/interface/plus.svg') }}" class="smanjena-slika" id="plus">
          <ul class="padajuci-izbornik" id="padajuciIzbornik">
            <li class="plusElementiIzbornika">
              <div>
                <a href="{{ url('/users') }}" id="usersTabPlus" class="elementIzbornika">
                  <span>Korisnik</span>
                </a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div id="dashboard-content" class="row" style="margin-left:15px;">
  {{-- <img id="dashboard-content-bg" src="{{ asset('img/interface/dashboard-bg-img.svg') }}"> --}}
  <div class="sidebar">
    <div class="hamburger">
      <div id="burger-container" class="open">
        <div id="burger">
       
          <img id="smanji" src="{{ asset('img/interface/smanji.svg') }}" style="width: 20px; height:auto;">
          <img id="povecaj" class="d-none" src="{{ asset('img/interface/povecaj.svg') }}" style="width: 20px; height:auto;">
        </div>
      </div>
    </div>
    <ul>
      <li class="mt-5" id="dashboardTab">
        <a href="{{ url('/home') }}" class="poravnajne" id="dashboard">
           <img src="{{ asset('img/interface/radnaPloca.svg') }}" class="smanjena-slika" id="dashboard">
          <span class="ml-15">{{ trans('default.dashboard') }}</span>
        </a>
      </li>
      <li class="mt-5" id="wineryTab">
        <a href="{{ route('winery.index') }}"  id="wineryTab">
          <i class="fa-regular fa-building  " style="color: #590C13; margin-left: 8px;" class="smanjena-slika"></i>
          <span class="ml-15">{{ trans('default.winery') }}</span>
        </a>
      </li>
      <li class="mt-5 " id="winesTab">
        <a href="{{ route('wines.index') }}" id="wines">
          <i class="fa-solid fa-wine-bottle " style="color: #590C13; margin-left: 8px;" ></i>
          <span class="ml-15" >{{ trans('default.wines') }}</span>
        </a>
      </li>
      <li class="mt-5" id="messagesTab">
        <a href="{{ route('messages.index') }}" id="messages">
          <i class="fa-regular fa-envelope" style="color: #590C13; margin-left: 8px;" ></i>
          <span class="ml-15">{{ trans('default.messages') }}</span>
        </a>
      </li>
      <li class="mt-5" id="remindersTab">
        <a href="{{ route('reminders.index') }}" id="reminders">
          <i class="fa-regular fa-clock" style="color: #590C13; margin-left: 8px;"></i>
          <span class="ml-15">{{ trans('default.reminders') }}</span>
        </a>
      </li>
      <li class="mt-5"  id="usersTab">
        <a href="{{ url('/users') }}" class="poravnajne" id="users">
          <i class="fa-solid fa-users" style="color: #590C13; margin-left: 8px;"></i>
          <span class="ml-15">{{ trans('default.users') }}</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="content">
    @yield('dashboard-content')
  </div>
    @include('reminder.addModal') 
    @include('users.addModal')
</div>

<script>
  $(document).ready(function () {
    $("#plus").click(function () {
      $("#padajuciIzbornik").toggle();
    });

    // Zatvori padajući izbornik ako korisnik klikne izvan njega
    $(document).click(function (e) {
      if (!$(e.target).closest("#plus").length && !$(e.target).closest("#padajuciIzbornik").length) {
        $("#padajuciIzbornik").hide();
      }
    });

    $("#slikaI").click(function () {
      $("#ipadajuciIzbornik").toggle();
    });

    // Zatvori padajući izbornik ako korisnik klikne izvan njega
    $(document).click(function (e) {
      if (!$(e.target).closest("#slikaI").length && !$(e.target).closest("#ipadajuciIzbornik").length) {
        $("#ipadajuciIzbornik").hide();
      }
    });
    $('#usersTabPlus').click(function(e){
      // Spriječavamo podrazumijevano ponašanje linka
      e.preventDefault();
      
      // Otvaramo modal
      $('#addUserModal').modal('show');

      // Čekamo da se modal zatvori prije preusmjeravanja
      $('#addUserModal').on('hidden.bs.modal', function (e) {
        // Preusmjeravamo na željenu rutu
        window.location.href = $('#usersTabPlus').attr('href');
      });
    });

    $('#remindersZvonce').click(function(e){
      // Spriječavamo podrazumijevano ponašanje linka
      e.preventDefault();
      
      // Otvaramo modal
      $('#addReminderModal').modal('show');

      // Čekamo da se modal zatvori prije preusmjeravanja
      $('#addReminderModal').on('hidden.bs.modal', function (e) {
        // Preusmjeravamo na željenu rutu
        window.location.href = $('#remindersZvonce').attr('href');
      });
    });

    $('.select2').select2();
});
</script>

@endsection


