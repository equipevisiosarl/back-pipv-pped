<?php
$docs = [
    "Status et reglements",
    "Récipissé de depot",
    "Récipissé d 'existence",
    "DEF",
    "Registre de commerce",
];
$groupement_info = [];
if ($programme == 'pped') {
    $groupement_info = [
        "Nom du demande" => ["value" => $demande->nom_groupement, 'col' => 12],
        "Nature du demande" => ["value" => $demande->nature_groupement, 'col' => 6],
        "Nom du responsable" => ["value" => $demande->nom_responsable, 'col' => 6],
        "nombre de membres" => ["value" => $demande->nb_homme + $demande->nb_femme, 'col' => 4],
        "Femme" => ["value" => $demande->nb_femme, 'col' => 4],
        "Hommes" => ["value" => $demande->nb_homme, 'col' => 4],
        "Status et reglements" => ["value" => $demande->statut_reglement, 'col' => 4],
        "Récipissé de depot" => ["value" => $demande->recipisse_depot, 'col' => 4],
        "Récipissé d 'existence" => ["value" => $demande->recipisse_existence, 'col' => 4],
        "DEF" => ["value" => $demande->def, 'col' => 4],
        "Registre de commerce" => ["value" => $demande->registre_commerce, 'col' => 4],
    ];
}


($demande->personne_handicape == 1) ? $ph = "Oui" : $ph = "Non";
$profil = [
    'Nom Prenoms' => ["value" => $demande->nom_prenoms, "col" => 7],
    'Email' => ["value" => $demande->email, "col" => 5],
    'Tel' => ["value" => $demande->telephone, "col" => 4],
    'Genre' => ["value" => $demande->genre, "col" => 4],
    "Handicapé" => ["value" => $ph, "col" => 4],
    'Region' => ["value" => $demande->regions, "col" => 4],
    'Ville' => ["value" => $demande->ville, "col" => 4],
    'Village' => ["value" => $demande->village, "col" => 4],
    'date de naissance' => ["value" => $demande->date_naissance, "col" => 4],
    'CNI' => ["value" =>  $demande->cni, "col" => 4],
    'CMU' => ["value" => $demande->cmu, "col" => 4],
    'Certificat de résidence' => ["value" => $demande->certificat_residence, "col" => 4],
];

$projet = [
    "Objet" => ["value" => $demande->objet, 'col' => 12],
    "Titre du projet" => ["value" => $demande->titre_projet, 'col' => 12],
    "Programme" => ["value" => $demande->programme, 'col' => 6],
    "Secteur d'activité" => ["value" => $demande->secteur, "col" => 6],
    "Etat du projet" => ["value" => $demande->etat_projet, "col" => 6],
    "Status de la demande" => ["value" => $demande->statut, 'col' => 6],
    "Coût du projet" => ["value" => $demande->cout_projet, "col" => 6],
    "Montant de la demande" => ["value" => $demande->montant_demande, 'col' => 6],
];

$id_promoteur = $demande->id_promoteur;

?>



<!-- The Modal -->
<div class="modal fade" id="demande{{ $region->id.$index +1 }}Modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="bi bi-layout-text-window-reverse" width="50px" heigth="50px"></i>
                    {{ $demande -> titre_projet}}
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                @include('composants.demande.tabs_demandes')
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>