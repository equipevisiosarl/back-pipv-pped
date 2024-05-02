@php
use App\Http\Controllers\NewsletterController;

$campagnes = newsletterController::getcampagnes() ;

@endphp


<button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#newcampagne">+ Nouvelle campagne</button>

@include('composants.newsletter.modal_new_campagne')

<div id="listeCampagne">
    <table class="table table-hover table-responsive bg-white">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">objet</th>
                <th scope="col">Date d'envoie</th>
            </tr>
        </thead>
        <tbody>
            @foreach($campagnes as $index => $campagne)
            <tr>
                <th scope="row">{{ $index +1 }}</th>
                <td>{{ $campagne->objet }}</td>
                <td>{{ $campagne->send_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $campagnes->links() }}
    </div>
</div>



<script>
    $(document).ready(function() {
        $('.ajax-form').submit(function(e) {
            e.preventDefault();

            // Obtenez le contenu Quill
            var quillContent = quill.root.innerHTML;
            $('#quillContent').val(quillContent);
            //alert(quillContent); exit();
            if (quillContent == '<p><br></p>') {
                alert('erreur lors de la creation de la campagne le contenue est vide !!!');
                exit();
            } else {
                // Effectuez la requête Ajax
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#listeCampagne').html(response);
                        console.log(response);
                        alert("Campagne bien enregistrée !!!");
                    },
                    error: function(error) {
                        alert('erreur lors de la creation de la campagne, l\'objet existe deja veillez changer !!!');
                        console.log(error);
                    }
                });
            }
            
        });
    });
</script>