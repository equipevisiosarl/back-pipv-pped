<?php


use App\Models\Groupement;

$docs = [
    "Status et reglements",
    "Récipissé de depot",
    "Récipissé d 'existence",
    "DEF",
    "Registre de commerce",
];

$groupement = Groupement::where('groupements.id_promoteur', $promoteur->id_promoteur)
    ->leftJoin('documents_groupements', 'documents_groupements.id_promoteur', '=', 'groupements.id_promoteur')
    ->first();

if (isset($groupement)) {
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
} else {
    $groupement_info = [];
}

($promoteur->personne_handicape == 1) ? $ph = "Oui" : $ph = "Non";
$profil = [
    'Nom Prenoms' => ["value" => $promoteur->nom_prenoms, "col" => 7],
    'Email' => ["value" => $promoteur->email, "col" => 5],
    'Tel' => ["value" => $promoteur->telephone, "col" => 4],
    'Genre' => ["value" => $promoteur->genre, "col" => 4],
    "Handicapé" => ["value" => $ph, "col" => 4],
    'Region' => ["value" => $promoteur->regions, "col" => 4],
    'Ville' => ["value" => $promoteur->ville, "col" => 4],
    'Village' => ["value" => $promoteur->village, "col" => 4],
    'date de naissance' => ["value" => $promoteur->date_naissance, "col" => 4],
    'CNI' => ["value" =>  $promoteur->cni, "col" => 4],
    'CMU' => ["value" => $promoteur->cmu, "col" => 4],
    'Certificat de résidence' => ["value" => $promoteur->certificat_residence, "col" => 4],
];

$projet = [
    "Objet" => ["value" => $promoteur->objet, 'col' => 12],
    "Titre du projet" => ["value" => $promoteur->titre_projet, 'col' => 12],
    "Programme" => ["value" => $promoteur->programme, 'col' => 6],
    "Secteur d'activité" => ["value" => $promoteur->secteur, "col" => 6],
    "Etat du projet" => ["value" => $promoteur->etat_projet, "col" => 6],
    "Status de la demande" => ["value" => $promoteur->statut, 'col' => 6],
    "Coût du projet" => ["value" => $promoteur->cout_projet, "col" => 6],
    "Montant de la demande" => ["value" => $promoteur->montant_demande, 'col' => 6],
];

$id_promoteur = $promoteur->id_promoteur;

?>



<!-- The Modal -->
<div class="modal fade" id="promoteur{{ $index +1 }}Modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">
                    <img src="{{ ($promoteur -> photo_promoteur !== '') ? $promoteur -> photo_promoteur :  'https://cdn-icons-png.freepik.com/512/3177/3177440.png' }}" height="50px" width="50px">
                    {{ $promoteur -> nom_prenoms }}
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                @include('composants.promoteur.tabs_promoteur')
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>