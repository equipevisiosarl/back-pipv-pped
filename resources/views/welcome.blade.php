<?php

use App\Http\Controllers\DemandeController;

function count_bilan($programme, $id_region, $statut){
($programme == 'PIPV') ? $count = DemandeController::countdemandeByRegionPIPV($id_region, $statut) 
: $count = DemandeController::countdemandeByRegionPPED($id_region, $statut);
return $count;
}
?>

@extends('templates.espace')

@section('title', 'Tableau de bord')


@section('content')

<section class="section dashboard">
    <div class="row">


        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                @foreach($recaps as $recap)
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">

                        <!-- <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>-->

                        <div class="card-body">
                            <h5 class="card-title">{{$recap['card_title'] ?? "titre"}}</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="{{$recap['icon']}}"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$recap['card_value'] ?? 0}}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                @endforeach

                <!-- Recent Sales -->
                @foreach($bilans as $bilan)
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Bilan <span>| {{ $bilan['programme'] ?? "PROGRAM"}}</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Regions</th>
                        <th scope="col">Nombre de demandes en cours</th>
                        <th scope="col">Nombre de bénéficiaires</th>
                        <th scope="col">Nombre de réjétés</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($bilan['regions'] as $region)
                      <tr>
                        <th scope="row">{{$region->regions}}</th>
                        <td>{{count_bilan($bilan['programme'], $region->id, 'en cours' )}}</td>
                        <td style="color:green;">{{count_bilan($bilan['programme'], $region->id, 'valider' )}}</td>
                        <td  style="color:red;">{{count_bilan($bilan['programme'], $region->id, 'rejeter' )}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div>
            @endforeach
            <!-- End Recent Sales -->

            </div>
        </div><!-- End Left side columns -->

    </div>
</section>

<script>
  setInterval(function() {
        location.reload();
    }, 60000);
</script>

@endsection