<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $recaps = self::recap();
        $bilans = self::bilan();
        return view("welcome", compact('recaps', 'bilans'));
    }

    public static function recap(){
        return [
            [
                'card_title' => 'Postulants',
                'card_value' => PromoteurController::get_number_promoteurs(),
                'icon' => 'bi bi-person-fill'
            ],
            [
                'card_title' => 'Groupements',
                'card_value' => PromoteurController::get_number_groupements(),
                'icon' => 'bi bi-people-fill'
            ],
            [
                'card_title' => 'Newsletters',
                'card_value' => NewsletterController::get_number_newsletter(),
                'icon' => 'bi bi-envelope'
            ]
            ];
    }

    public static function bilan(){
        return [
            [
                'programme' => "PIPV",
                'function' => 'countdemandeByRegionPIPV',
                'regions' => DB::table('regions')->where('pipv', "=", 1)->get()
            ],
            [
                'programme' => "PPED",
                'function' => 'countdemandeByRegionPPED',
                'regions' => DB::table('regions')->where('pped', "=", 1)->get()
            ]
        ];
    }
}
