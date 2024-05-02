<?php $quill = true; ?>

@extends('templates.espace')
@section('title', 'newsletters')

@section('content')

@include('composants.pagetitle')

<div class="row">
    <div class="col-xl-3">


        <div class="card">
            <div class="list-group">
                @foreach($contenus as $index => $contenu)
                @php ($contenu['title'] == ucfirst($route)) ? $active = 'nav-link active' : $active = ''; @endphp
                <a href="{{ route($contenu['url']) }}" class="list-group-item list-group-item-action {{ $active }}"> {{$contenu['title']}}</a>
                @endforeach
            </div>

        </div>

    </div>

    <div class="col-xl-9">

        <div class="card">
            <div class="card-body pt-3">
                <!-- Bordered Tabs -->

                <div class="tab-content pt-2">
                    @foreach($contenus as $index => $contenu)
                    @php ($contenu['title'] == ucfirst($route)) ? $active = 'show active' : $active = ''; @endphp
                    <div class="tab-pane fade {{$active}} tab-{{$index}}" id="tab-{{$index}}">
                        @include('composants.newsletter.'.$contenu["contenu"])
                    </div>
                    @endforeach
                </div><!-- End Bordered Tabs -->

            </div>
        </div>

    </div>
</div>

@endsection