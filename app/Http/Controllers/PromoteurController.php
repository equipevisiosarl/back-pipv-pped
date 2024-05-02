<?php

namespace App\Http\Controllers;

use App\Models\Groupement;
use App\Models\Promoteur;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

//use function App\Http\constantes\fxdecrypt;

class PromoteurController extends Controller
{

   
    public function index()
    {
       // $promoteurs = Promoteur::all();
        $promoteurs = $this ->getPrmoteur('promoteurs.id', '!=', 'a');
        $breadcrumbs = [
            "active" => "Postulants",
            []
        ];
        return view("promoteurs", compact('promoteurs', 'breadcrumbs'));
    }

    public function searchPromoteurs(Request $request)
    {
        $query = $request->input('query');
        $promoteurs = $this -> getPrmoteur('regions', 'like', '%'.$query.'%', 'nom_prenoms', 'like');

        if ($query == '') {
            $promoteurs = $this ->getPrmoteur('promoteurs.id', '!=', 'a');
        }
        return view('composants.promoteur.liste_promoteurs_partielle' ,compact('promoteurs'));
    }

    public function groupements()
    {
       // $promoteurs = Promoteur::all();
        $groupements = $this ->getGroupemnts('groupements.id', '!=', 'a',);
        $breadcrumbs = [
            "active" => "Groupements",
            []
        ];
        return view("groupements", compact('groupements', 'breadcrumbs'));
    }

    public function searchGroupements(Request $request)
    {
        $query = $request->input('query');
        $groupements = $this -> getGroupemnts('regions', 'like', '%'.$query.'%', 'nom_groupement', 'like');
        if ($query == '') {
            $groupements = $this ->getGroupemnts('groupements.id', '!=', 'a',);;
        }
        return view('composants.groupement.liste_groupements_partielle' ,compact('groupements'));
    }


    public function getPrmoteur($champs, $operator, $value, $champs1=null, $operator1=null){
        $promoteurs = DB::table('promoteurs')
        ->leftJoin('villes', 'promoteurs.id_ville', '=', 'villes.id')
        ->leftjoin('regions', 'villes.id_region', '=', 'regions.id')
        ->leftjoin('demandes', 'promoteurs.id', '=', 'demandes.id_promoteur')
        ->leftjoin('programmes', 'demandes.id_programme', '=', 'programmes.id')
        ->leftjoin('secteurs_activites', 'demandes.id_secteur_activite', '=', 'secteurs_activites.id')
        ->select('*')
        ->where($champs, $operator, $value)
        ->orwhere($champs1, $operator1, $value)
        ->orderBy('promoteurs.id','desc')
        ->paginate(10);

        return $promoteurs;
    }
    
    public function getGroupemnts($champs, $operator, $value, $champs1=null, $operator1=null){
        $promoteurs = DB::table('groupements')
        ->leftJoin('promoteurs', 'promoteurs.id', '=', 'groupements.id_promoteur')
        ->leftJoin('documents_groupements', 'documents_groupements.id_promoteur', '=', 'groupements.id_promoteur')
        ->leftJoin('villes', 'promoteurs.id_ville', '=', 'villes.id')
        ->leftjoin('regions', 'villes.id_region', '=', 'regions.id')
        ->leftjoin('demandes', 'promoteurs.id', '=', 'demandes.id_promoteur')
        ->leftjoin('programmes', 'demandes.id_programme', '=', 'programmes.id')
        ->leftjoin('secteurs_activites', 'demandes.id_secteur_activite', '=', 'secteurs_activites.id')
        ->select('*')
        ->where($champs, $operator, $value)
        ->orwhere($champs1, $operator1, $value)
        ->orderBy('promoteurs.id','desc')
        ->paginate(10);

        return $promoteurs;
    }
    
    public static function get_number_promoteurs($region = 'all'){
        if ($region == 'all') {
            $promoteurs = Promoteur::count();
        } else {
            $promoteurs = Promoteur::where('regions', $region)->count();
        }
        
        return $promoteurs;
    }

    public static function get_number_groupements($region = 'all'){
        if ($region == 'all') {
            $groupements = Groupement::count();
        } else {
            $groupements = Groupement::where('regions', $region)->count();
        }
        
        return $groupements;
    }
    
    
}
