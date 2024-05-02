@extends('templates.espace')
@section('title', 'gestionnaires')

@section('content')
@include('composants.pagetitle')


@if (session('message'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

<div class="container">
    <div class="row">

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Inscription</h5>

                    @include('composants.gestionnaire.form_gestionnaire')

                </div>
            </div>
        </div>


        <div class="col-sm-8">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->

                    <div id="liste_gestionnaire">
                        @include('composants.gestionnaire.liste_gestionnaire')
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>






@endsection