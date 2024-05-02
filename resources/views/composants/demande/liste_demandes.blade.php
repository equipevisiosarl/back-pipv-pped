<?php

use App\Http\Controllers\DemandeController;

if ($page == "Demandes") {
    if ($programme == 'pipv') {
        $demandes = DemandeController::demandeByRegionPIPV($region->id);
    } else {
        $demandes = DemandeController::demandeByRegionPPED($region->id);
    }
} elseif($page == "Bénéficiaires") {
    if ($programme == 'pipv') {
        $demandes = DemandeController::demandeByRegionPIPV($region->id, 'valider');
    } else {
        $demandes = DemandeController::demandeByRegionPPED($region->id, 'valider');
    }
}else {
    if ($programme == 'pipv') {
        $demandes = DemandeController::demandeByRegionPIPV($region->id, 'rejeter');
    } else {
        $demandes = DemandeController::demandeByRegionPPED($region->id, 'rejeter');
    }
}


?>

<div id="liste">
    <table class="table table-hover table-responsive bg-white ">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Postulants</th>
                @if($programme == 'pped')
                <th scope="col">Groupements</th>
                @endif
                <th scope="col">Telephone</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($demandes as $index => $demande)
            <tr>
                <th scope="row">{{ $index +1 }}</th>
                <td>{{ date("d-m-Y", strtotime($demande -> created_at)) }}</td>
                <td>{{ $demande-> nom_prenoms }}</td>
                @if($programme == 'pped')
                <td>{{ $demande-> nom_groupement }}</td>
                @endif
                <td>{{ $demande->telephone }}</td>
                <td><a href="" data-bs-toggle="modal" data-bs-target="#demande{{ $region->id.$index +1 }}Modal"><i class="ri-profile-line text-primary"></i></a></td>
            </tr>

            @include('composants.demande.modal_demandes')

            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center" id="pagination">
    {{ $demandes->links() }}
</div>



<script>
    $(document).ready(function() { 
        $('#pagination').on('click', 'a', function(e) { alert('77777');
            e.preventDefault();
            var $url = '{{"beneficiaires/$programme"}}'; 
            $get($url, function(data) {
                $get('#liste').html(data);
            });
        } );
    });
</script>