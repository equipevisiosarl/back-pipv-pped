<?php

use App\Models\Groupement;


$profil = [
    'Nom Prenoms' => ["value" => $gestionnaire->name, "col" => 7],
    'Email' => ["value" => $gestionnaire->email, "col" => 5],
    'Statut' => ["value" => $gestionnaire->statut, "col" => 4],
];


?>



<!-- The Modal -->
<div class="modal fade" id="gestionnaire{{ $index +1 }}Modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">
                    <img src="{{ ($gestionnaire -> photo !== null) ? $gestionnaire -> photo :  'https://cdn-icons-png.freepik.com/512/3177/3177440.png' }}" height="50px" width="50px">
                    {{ $gestionnaire -> name }}
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                @include('composants.gestionnaire.tabs_gestionnaire')
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
            </div>

        </div>
    </div>
</div>