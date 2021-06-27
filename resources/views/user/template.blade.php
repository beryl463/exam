@extends('layouts.app'){{--on herite de layout.app--}}

@section('content')
{{--Ce content représente le dashboard (dans la sidebar)de l'aministrateur--}}
    <div class="row" style="margin:0px;">
        <div class="col-md-2 bg-ocean text-center sidebar">
            <ul class="list-group bg-ocean">
                <div class="list-group  ">
                    <a href="{{ route('user.index') }}" class="list-group-item bg-ocean text-white">Accueil</a>
                    <a href="{{ route('user.livres.index') }}" class="list-group-item bg-ocean text-white">Livres</a>


                </div>
            </ul>
        </div>
        <div class="col-md-10">
            <h1 class="text-center text-ocean my-3">
                @yield('h1')
            </h1>
           @yield('mycontent')
        </div>
    </div>
@endsection
