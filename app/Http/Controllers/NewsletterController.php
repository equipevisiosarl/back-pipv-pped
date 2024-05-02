<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampagneRequest;
use App\Models\Campagne;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;

class NewsletterController extends Controller
{
    public function index(){
        $newsletters = Newsletter::orderBy('id','desc')->paginate(10);
        $breadcrumbs = [
            "active" => "Newsletters",
            []
        ];

        $turl = explode('/', request() ->path() );
        $route = "newsletters";

        if (isset($turl[1]) && $turl[1] == 'campagnes'){
            $route = $turl[1];
        }

        $contenus = [
            ['title' => "Newsletters", 'contenu' => "liste_newsletters", 'url' => 'newsletters'],
            ['title' => "Campagnes", 'contenu' => "campagnes", 'url' => 'campagnes'],
        ];

        return view('newsletters', compact('newsletters', 'breadcrumbs', 'contenus', 'route'));
    }

    public function save_campagne(CampagneRequest $request){
        try{
            $vue = 'composants.newsletter.liste_partielle_campagne'; 
        $campagne = Campagne::create($request->validated());
        $campagnes = $this -> getcampagnes();

        //$destinataires = ['thiononkonate@gmail.com',  'mysterleking@gmail.com'];

        //foreach ($destinataires as $destinataire){

        $mail1 = new PHPMailer(); 
        $mail1->isSMTP();
        $mail1->Host = 'smtp.gmail.com';
        $mail1->SMTPAuth = true;
        $mail1->Username = 'thiononkonate@gmail.com';
        $mail1->Password = 'misterktk97';
        $mail1->SMTPSecure = 'tls';
        $mail1->Port = 465;
        
        $mail1->setFrom('thiononkonate@gmail.com', 'konate');  // address expediteur

        

            $mail1->addAddress('mysterektkg@gmail.com'); // Adresse de destination
        $mail1->isHTML(true);
        
        $mail1->Subject = "ps gouv";
        $mail1->Body = "test au micro";
        
        if ($mail1->send()) {
           
        } else {
        throw new \Exception("Erreur lors de l'envoie. Veuillez réessayer plus tard svp.", 1);
        }

       // }
        

        return view($vue, compact('campagnes') )->with('message','Campagne bien enregistrée !!!');
        }catch (\Exception $e) {
            // En cas d'erreur, capturez l'exception et transmettez le message d'erreur à la vue
            $errorMessage = $e->getMessage(); echo $errorMessage;
            $campagnes = $this -> getcampagnes();  
           // return view($vue , compact('campagnes'))->with('message', $errorMessage);
        }
    }

    public function campagne_ajax(){
        $vue = 'composants.newsletter.liste_partielle_campagne';
        $campagnes = $this -> getcampagnes();  
        return view($vue , compact('campagnes'));
    }

    public static function getcampagnes() {
        $campagnes = Campagne::orderBy('id','desc')
        ->paginate(10);

        return $campagnes;
    }

    public static function get_number_newsletter(){
         return Newsletter::count();
    }
    
}
