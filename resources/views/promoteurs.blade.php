@extends('templates.espace')

@section('title', 'Postulants')

@section('content')

@include('composants.pagetitle')

<div class="row">
   
        @if (session('etat'))

        @php
            if(session('etat') == 'valider'):
                $message = ' la demande est validée ';
                $alert = "success";
            else:
                $message = ' la demande est rejetée ';
                $alert = "danger";
            endif
        @endphp
            <div class="alert alert-{{ $alert }} alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Success!</strong> {{ $message }}
            </div>
        @endif
    
</div>

<div class="col-sm-12">
    @include('composants.promoteur.liste_promoteurs')
</div>
</div>


@endsection