<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemandeController extends Controller
{
    public function demande_programme(string $programme, string $region_choise ){
        $id_programme = $this->getProgramme($programme);
        $regions = $this->getRegions($programme);

        $turl = explode('/', request() ->path() );
        $url = $turl[0];
        ($url == "demandes") ? $page = "Demandes" : $page = "Bénéficiaires";
        if ($url == "rejeter") {
            $page = "Dossiers Rejetés";
        }
        $breadcrumbs = [
            "active" => "$page ".strtoupper($programme),
            []
        ];

        
            return view('demandes', compact('programme', 'regions', 'page', 'breadcrumbs', 'region_choise'));
        
        
    
    }

    
    

    protected function getProgramme(string $programme){
        if ($programme == 'pipv') {
            $id = 1;
        } elseif ($programme == 'pped') {
            $id = 2;
        } else {
            exit('programme no  definied');
        }
        return $id;        
    
    }

    public function change_statut(Request $request){
        $id_promoteur = $request->get('id_promoteur');
        $statut = $request->get('statut'); 
        Demande::where('id_promoteur', $id_promoteur)->update(['statut' => $statut]);
        return redirect(route('promoteurs'))->with('etat', "$statut");
    }

    protected function getregions(string $programme){
        $regions = DB::table('regions')->where($programme, "=", 1)->get();
        return $regions;
    }

    public static function demandeByRegionPIPV($id_region, $statut= 'en cours'){
        $demandes = DB::table('demandes')
        ->leftJoin('promoteurs', 'promoteurs.id', '=', 'demandes.id_promoteur')
        ->leftJoin('villes', 'promoteurs.id_ville', '=', 'villes.id')
        ->leftjoin('regions', 'villes.id_region', '=', 'regions.id')
        ->leftjoin('programmes', 'demandes.id_programme', '=', 'programmes.id')
        ->leftjoin('secteurs_activites', 'demandes.id_secteur_activite', '=', 'secteurs_activites.id')
        ->select('*')
        ->where(['regions.id' => $id_region, 'demandes.statut' => $statut, 'programmes.id' => 1])
        ->orderBy('promoteurs.id')
        ->paginate(10);

        return $demandes;
    }

    public static function demandeByRegionPPED($id_region, $statut= 'en cours'){
        $demandes = DB::table('demandes')
        ->leftJoin('promoteurs', 'promoteurs.id', '=', 'demandes.id_promoteur')
        ->leftJoin('groupements', 'promoteurs.id', '=', 'groupements.id_promoteur')
        ->leftJoin('documents_groupements', 'documents_groupements.id_promoteur', '=', 'groupements.id_promoteur')
        ->leftJoin('villes', 'promoteurs.id_ville', '=', 'villes.id')
        ->leftjoin('regions', 'villes.id_region', '=', 'regions.id')
        ->leftjoin('programmes', 'demandes.id_programme', '=', 'programmes.id')
        ->leftjoin('secteurs_activites', 'demandes.id_secteur_activite', '=', 'secteurs_activites.id')
        ->select('*')
        ->where(['regions.id' => $id_region, 'demandes.statut' => $statut, 'programmes.id' => 2])
        ->orderBy('promoteurs.id')
        ->paginate(10);

        return $demandes;
    }

    public static function countdemandeByRegionPIPV($id_region, $statut= 'en cours'){
        $demandes = DB::table('demandes')
        ->leftJoin('promoteurs', 'promoteurs.id', '=', 'demandes.id_promoteur')
        ->leftJoin('villes', 'promoteurs.id_ville', '=', 'villes.id')
        ->leftjoin('regions', 'villes.id_region', '=', 'regions.id')
        ->leftjoin('programmes', 'demandes.id_programme', '=', 'programmes.id')
        ->leftjoin('secteurs_activites', 'demandes.id_secteur_activite', '=', 'secteurs_activites.id')
        ->select('*')
        ->where(['regions.id' => $id_region, 'demandes.statut' => $statut, 'programmes.id' => 1])
        ->orderBy('promoteurs.id')
        ->count();

        return $demandes;
    }

    public static function countdemandeByRegionPPED($id_region, $statut= 'en cours'){
        $demandes = DB::table('demandes')
        ->leftJoin('promoteurs', 'promoteurs.id', '=', 'demandes.id_promoteur')
        ->leftJoin('groupements', 'promoteurs.id', '=', 'groupements.id_promoteur')
        ->leftJoin('documents_groupements', 'documents_groupements.id_promoteur', '=', 'groupements.id_promoteur')
        ->leftJoin('villes', 'promoteurs.id_ville', '=', 'villes.id')
        ->leftjoin('regions', 'villes.id_region', '=', 'regions.id')
        ->leftjoin('programmes', 'demandes.id_programme', '=', 'programmes.id')
        ->leftjoin('secteurs_activites', 'demandes.id_secteur_activite', '=', 'secteurs_activites.id')
        ->select('*')
        ->where(['regions.id' => $id_region, 'demandes.statut' => $statut, 'programmes.id' => 2])
        ->orderBy('promoteurs.id')
        ->count();

        return $demandes;
    }
}
