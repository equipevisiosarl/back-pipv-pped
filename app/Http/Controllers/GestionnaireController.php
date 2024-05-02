<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use function Laravel\Prompts\table;

class GestionnaireController extends Controller
{
    public function index()
    {
        $gestionnaires = User::paginate(10);
        $breadcrumbs = [
            "active" => "Gestionnaires",
            []
        ];
        return view('gestionnaires', compact('gestionnaires', 'breadcrumbs'));
    }

    public function create(UserRequest $request)
    {
        $gestionnaire = User::create($request->validated());
        $gestionnaires = User::paginate(10);
        //return view('composants.gestionnaire.liste_gestionnaire', compact('gestionnaires'));
        return redirect(route('gestionnaires'))->with('message', "le gestionnaire à bien été crée");
    }

    public function changeStatut($statut, $id_gestionnaire)
    {

        User::where('id', $id_gestionnaire)->update(['statut' => $statut]);
        echo 'statut changé avec success';
    }

    public function suppGestionnaire(Request $request)
    {
        $id_gestionnaire = $request->id;
        $gestionnaire = User::find($id_gestionnaire);
        $gestionnaire->delete();
        return redirect(route('gestionnaires'))->with('message', "le gestionnaire à bien été supprimé");
    }

    public function profile()
    {

        $breadcrumbs = [
            "active" => "Profile-" . Auth::user()->statut,
            []
        ];
        return view('composants.gestionnaire.profile', compact('breadcrumbs'));
    }


   /* public function update_gestionnaire(Request $request)
    {
        // Récupérez l'utilisateur actuel
        $user = User::find(Auth::user()->id);



        // Vérifiez si l'utilisateur existe
        if ($user) {
            // Mettez à jour l'utilisateur avec les données validées
            $user->update($request->validate(
                [
                    'name' => ['required'],
                    'login' => ['required', 'unique:users'],
                    'email' => ['required', 'email', 'unique:users'],
                ]
            ));

            // Régénérez la session
            $request->session()->regenerate();

            // Redirigez l'utilisateur vers le profil avec un message
            return redirect(route('profile_gestionnaire'))->with('message', 'Modifications réussies');
        } else {
            // Gérez le cas où l'utilisateur n'est pas trouvé
            return redirect(route('profile_gestionnaire'))->with('error', 'Utilisateur non trouvé');
        }
    }*/

    public function update_gestionnaire(Request $request)
{
    // Récupérez l'utilisateur actuel
    $user = User::find(Auth::user()->id);

    // Vérifiez si l'utilisateur existe
    if ($user) {
        // Validez les données reçues du formulaire
        $validatedData = $request->validate([
            'name' => ['required'],
            'login' => ['required', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
        ]);

        // Mettez à jour l'utilisateur avec les données validées
        $user->update($validatedData);

        // Régénérez la session
        $request->session()->regenerate();

        // Redirigez l'utilisateur vers le profil avec un message
        return redirect(route('profile_gestionnaire'))->with('message', 'Modifications réussies');
    } else {
        // Gérez le cas où l'utilisateur n'est pas trouvé
        return redirect(route('profile_gestionnaire'))->with('error', 'Utilisateur non trouvé');
    }
}



    public function update_mdp(Request $request)
{
    $request->validate([
        'password' => 'required',
        'newpassword' => 'required|min:8',
        'renewpassword' => 'required|same:newpassword',
    ]);

    $user = User::find(Auth::user()->id);

    // Vérifiez si l'utilisateur existe
    if ($user) {
        // Vérifiez si l'ancien mot de passe correspond
        if (Hash::check($request->password, $user->password)) {
            // Mettez à jour le mot de passe avec le nouveau
            $user->update([
                'password' => Hash::make($request->newpassword),
            ]);

            // Régénérez la session
            $request->session()->regenerate();

            // Redirigez l'utilisateur vers le profil avec un message
            return redirect(route('profile_gestionnaire'))->with('message', 'Mot de passe modifié avec succès');
        } else {
            // Mot de passe actuel incorrect
            return redirect(route('profile_gestionnaire'))->with('error', 'Mot de passe actuel incorrect');
        }
    } else {
        // Gérez le cas où l'utilisateur n'est pas trouvé
        return redirect(route('profile_gestionnaire'))->with('error', 'Utilisateur non trouvé');
    }
}


}
