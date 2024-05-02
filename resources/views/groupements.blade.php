@extends('templates.espace')

@section('title', 'Groupements')

@section('content')

@include('composants.pagetitle')

<div class="row">

    

    </div>

    <div class="col-sm-12">
        @include('composants.groupement.liste_groupements')
    </div>
</div>


@endsection