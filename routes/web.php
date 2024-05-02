<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\GestionnaireController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PromoteurController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class ,'index'])->name('dashboard');

    Route::prefix('promoteurs')->controller()->group(function () {
        Route::get('/', [PromoteurController::class, 'index'])->name('promoteurs');
        Route::get('/search', [PromoteurController::class, 'searchPromoteurs'])
            ->name('searchPromoteurs');
    });

    Route::get('/groupements', [PromoteurController::class, 'groupements'])
        ->name('groupements');
    Route::get('/searchGroupements', [PromoteurController::class, 'searchGroupements'])
        ->name('searchGroupements');

    Route::prefix('demandes')->controller()->group(function () {
        Route::get('/{programme}/{region}', [DemandeController::class, 'demande_programme'])->name('demandes');
        Route::post('/statut', [DemandeController::class, 'change_statut'])
            ->name('change_statut');
    })->where(['programme' => '[a-z]+'], ['region' => '[a-z]+']);


    Route::prefix('beneficiaires')->controller()->group(function () {
        //Route::get('/{programme}', [DemandeController::class, 'demande_programme'])->name('beneficiaire');
        Route::get('/{programme}/{region}', [DemandeController::class, 'demande_programme'])->name('beneficiaire_region');
    })->where(['programme' => '[a-z]+'], ['region' => '[a-z]+']);

    Route::prefix('rejeter')->controller()->group(function () {
        //Route::get('/{programme}', [DemandeController::class, 'demande_programme'])->name('beneficiaire');
        Route::get('/{programme}/{region}', [DemandeController::class, 'demande_programme'])->name('beneficiaire_region');
    })->where(['programme' => '[a-z]+'], ['region' => '[a-z]+']);



    Route::prefix('newsletter')->controller()->group(function () {
        Route::get('/', [NewsletterController::class, 'index'])->name('newsletters');
        Route::get('/campagnes', [NewsletterController::class, 'index'])->name('campagnes');
        Route::post('/newcampagne', [NewsletterController::class, 'save_campagne'])->name('newcampagne');
        Route::get('/newcampagne', [NewsletterController::class, 'save_campagne']);
    });

    Route::middleware(['checkAdminStatus'])->group(function () {
        Route::prefix('gestionnaires')->controller()->group(function () {
            Route::get('/', [GestionnaireController::class, 'index'])->name('gestionnaires');
            Route::post('/newgestionnaire', [GestionnaireController::class, 'create'])->name('newgestionnaire');
            Route::get('/{statut}/{id_gestionnaire}', [GestionnaireController::class, 'changeStatut'])->name('changeStatut');
            Route::post('/suppGestionnaire', [GestionnaireController::class, 'suppGestionnaire'])->name('suppGestionnaire');
        })->where(['statut' => '[a-z]+'], ['id_gestionnaire' => '[0-9]+']);
    });

    Route::prefix('profile')->controller()->group(function () {
        Route::get('/', [GestionnaireController::class, 'profile'])->name('profile_gestionnaire');
        Route::post('/update_gestionnaire', [GestionnaireController::class, 'update_gestionnaire'])->name('update_user');
        Route::post('/update_mdp', [GestionnaireController::class, 'update_mdp'])->name('update_mdp');
    });

    Route::prefix('articles')->controller()->group(function () {
        Route::get('/', [ArticleController::class, 'index'])->name('articles');
        Route::get('/article-{id}', [ArticleController::class, 'article'])->name('article');
        //Route::post('/update_gestionnaire', [ArticleController::class, 'update_gestionnaire'])->name('update_user');
        //Route::post('/update_mdp', [ArticleController::class, 'update_mdp'])->name('update_mdp');
    });
});



Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/dgest', function () {
    return view('dgest');
})->name('dgest');

Route::post('/login', [LoginController::class, 'authenticate'])->name('connexion');
Route::get('/deconnexion', [LoginController::class, 'logout'])->name('deconnexion');
