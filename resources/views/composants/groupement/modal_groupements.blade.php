<?php
$docs = [
    "Status et reglements",
    "Récipissé de depot",
    "Récipissé d 'existence",
    "DEF",
    "Registre de commerce",
];

$groupement_info = [
    "Nom du groupement" => ["value" => $groupement->nom_groupement, 'col' => 12],
    "Nature du groupement" => ["value" => $groupement->nature_groupement, 'col' => 6],
    "Nom du responsable" => ["value" => $groupement->nom_responsable, 'col' => 6],
    "nombre de membres" => ["value" => $groupement->nb_homme + $groupement->nb_femme, 'col' => 4],
    "Femme" => ["value" => $groupement->nb_femme, 'col' => 4],
    "Hommes" => ["value" => $groupement->nb_homme, 'col' => 4],
    "Status et reglements" => ["value" => $groupement->statut_reglement, 'col' => 4],
    "Récipissé de depot" => ["value" => $groupement->recipisse_depot, 'col' => 4],
    "Récipissé d 'existence" => ["value" => $groupement->recipisse_existence, 'col' => 4],
    "DEF" => ["value" => $groupement->def, 'col' => 4],
    "Registre de commerce" => ["value" => $groupement->registre_commerce, 'col' => 4],
];


($groupement->personne_handicape == 1) ? $ph = "Oui" : $ph = "Non";
$profil = [
    'Nom Prenoms' => ["value" => $groupement->nom_prenoms, "col" => 7],
    'Email' => ["value" => $groupement->email, "col" => 5],
    'Tel' => ["value" => $groupement->telephone, "col" => 4],
    'Genre' => ["value" => $groupement->genre, "col" => 4],
    "Handicapé" => ["value" => $ph, "col" => 4],
    'Region' => ["value" => $groupement->regions, "col" => 4],
    'Ville' => ["value" => $groupement->ville, "col" => 4],
    'Village' => ["value" => $groupement->village, "col" => 4],
    'date de naissance' => ["value" => $groupement->date_naissance, "col" => 4],
    'CNI' => ["value" =>  $groupement->cni, "col" => 4],
    'CMU' => ["value" => $groupement->cmu, "col" => 4],
    'Certificat de résidence' => ["value" => $groupement->certificat_residence, "col" => 4],
];

$projet = [
    "Objet" => ["value" => $groupement->objet, 'col' => 12],
    "Titre du projet" => ["value" => $groupement->titre_projet, 'col' => 12],
    "Programme" => ["value" => $groupement->programme, 'col' => 6],
    "Secteur d'activité" => ["value" => $groupement->secteur, "col" => 6],
    "Etat du projet" => ["value" => $groupement->etat_projet, "col" => 6],
    "Status de la demande" => ["value" => $groupement->statut, 'col' => 6],
    "Coût du projet" => ["value" => $groupement->cout_projet, "col" => 6],
    "Montant de la demande" => ["value" => $groupement->montant_demande, 'col' => 6],
];

$id_promoteur = $groupement->id_promoteur;

?>



<!-- The Modal -->
<div class="modal fade" id="groupement{{ $index +1 }}Modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="ri-team-fill" style="font-size: 50px;"></i>
                    {{ $groupement -> nom_groupement}}
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                @include('composants.groupement.tabs_groupements')
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>