@extends('templates.espace')
@section('title', 'demandes')

@section('content')

@include('composants.pagetitle')

<div class="row">
    <div class="col-xl-3">


        <div class="card">
            <div class="list-group">
                @foreach($regions as $index => $region)
                @php ($region->regions == $region_choise) ? $active = 'nav-link active' : $active = '';
                
                $state = $page;
                if($page == 'Bénéficiaires' ){
                    $state = 'beneficiaires';
                }elseif($page == 'Dossiers Rejetés' ){
                    $state = 'rejeter';
                }

                @endphp
                <a href="{{strtolower($state).'/'.$programme.'/'.$region->regions}}" class="list-group-item list-group-item-action {{ $active }}" > {{$region->regions}}</a>
                @endforeach
            </div>

        </div>  

    </div>

    <div class="col-xl-9">

        <div class="card">
            <div class="card-body pt-3">
                <!-- Bordered Tabs -->

                <div class="tab-content pt-2">
                    @foreach($regions as $index => $region)
                    @php ($region->regions == $region_choise) ? $active = 'show active' : $active = ''; @endphp
                    <div class="tab-pane fade {{$active}} tab-{{$index}} " id="tab-{{$index}}">
                        @include('composants.demande.liste_demandes')
                    </div>
                    @endforeach
                </div><!-- End Bordered Tabs -->

            </div>
        </div>

    </div>
</div>

@endsection