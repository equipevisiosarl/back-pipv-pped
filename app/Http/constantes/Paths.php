<?php

namespace App\Http\constantes;

use Illuminate\Support\Facades\Auth;

$_SESSION['status'] = 0;
class Paths
{

    public const DOMAINE = '../'; //en cas de disfontionnement a complet sur $path
    public const DASHBOARD =  ['icon' => 'bi bi-grid', 'path' => ''];
    public const PROMOTEURS = ['icon' => 'bi bi-person-fill', 'path' => 'promoteurs'];
    public const GROUPEMENTS =  ['icon' => 'ri-team-fill', 'path' => 'groupements'];
    public const PIPV =  ['icon' => '', 'path' => 'demandes/pipv/KABADOUGOU'];
    public const PPED = ['icon' => '', 'path' => 'demandes/pped/GBEKE'];
    public const BPIPV =  ['icon' => '', 'path' => 'beneficiaires/pipv/KABADOUGOU'];
    public const BPPED = ['icon' => '', 'path' => 'beneficiaires/pped/GBEKE'];
    public const RPIPV =  ['icon' => '', 'path' => 'rejeter/pipv/KABADOUGOU'];
    public const RPPED = ['icon' => '', 'path' => 'rejeter/pped/GBEKE'];
    public const DEMANDES = [
        'icon' => 'bi bi-layout-text-window-reverse', 'path' => 'demandes',
        'items' => ['PIPV' => self::PIPV, 'PPED' => self::PPED]
    ];
    public const BENEFICIAIRES =  [
        'icon' => 'ri-team-fill', 'path' => 'beneficiaires',
        'items' => ['PIPV' => self::BPIPV, 'PPED' => self::BPPED]
    ];
    public const REJETE =  [
        'icon' => 'ri-team-fill', 'path' => 'rejeter',
        'items' => ['PIPV' => self::RPIPV, 'PPED' => self::RPPED]
    ];
    public const NEWSLETTER = ['icon' => 'bi bi-envelope', 'path' => 'newsletter'];
    public const ARTICLE = ['icon' => 'bi bi-file-earmark-font-fill', 'path' => 'articles'];
    public const GESTIONNAIRES = ['icon' => 'bi bi-people-fill', 'path' => 'gestionnaires'];

    public static function getValueSidebar()
    {

        $ValueSidebar = [];

        $ValueSidebar['Tableau de bord'] = self::DASHBOARD;
        $ValueSidebar['Postulants'] = self::PROMOTEURS;
        $ValueSidebar['Groupements'] = self::GROUPEMENTS;
        $ValueSidebar['Demandes'] = self::DEMANDES;
        $ValueSidebar['Bénéficiaire'] = self::BENEFICIAIRES;
        $ValueSidebar['Rejetés'] = self::REJETE;
        $ValueSidebar['Abonnés Newsletter'] = self::NEWSLETTER;
        $ValueSidebar['Articles'] = self::ARTICLE;

        if (Auth::user()->statut == 'admin') {
            $ValueSidebar['Gestionnaires'] = self::GESTIONNAIRES;
        }


        return $ValueSidebar;
    }

    

}
