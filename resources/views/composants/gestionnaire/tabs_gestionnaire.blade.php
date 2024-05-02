<!-- Default Tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="profil-tab{{ $index }}" data-bs-toggle="tab" data-bs-target="#profil{{ $index }}" type="button" role="tab" aria-controls="profil{{ $index }}" aria-selected="true">Profile</button>
    </li>

    <li class="nav-item" role="mdp">
        <button class="nav-link " id="mdp-tab{{ $index }}" data-bs-toggle="tab" data-bs-target="#mdp{{ $index }}" type="button" role="tab" aria-controls="mdp{{ $index }}" aria-selected="true">changer le mot de passe</button>
    </li>
</ul>
<div class="tab-content pt-2" id="myTabContent">

    <div class="tab-pane fade show active" id="profil{{ $index }}" role="tabpanel" aria-labelledby="profil-tab{{ $index }}">
        <div class="container">
            <div class="row">
                @foreach ($profil as $key => $value)
                <div class="col-sm-{{ $value['col'] }}">
                    <div class="input-wrapper">
                        <input type="text" id="inputField" name="inputField" value="{{ $key }} : {{ $value['value'] }}" disabled>
                    </div>
                </div>
                @endforeach

                @php
                ($gestionnaire -> statut == 'admin') ? $checked = 'checked' : $checked = ''; 
                @endphp

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked{{ $index }}" {{$checked}}>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Admin</label>
                </div>

            </div>
        </div>
    </div>


    <div class="tab-pane fade " id="mdp{{ $index }}" role="tabpanel" aria-labelledby="mdp-tab{{ $index }}">
        <div class="container">
            <form action="" method="post">

            <div class="row text-center mt-4">
                <div class="col-sm-9">
                <input type="text" name="password" id="" class="form-control">
                </div>

                <div class="col-sm-3">
                <input type="submit" value="Valider" class="btn btn-primary ">
                </div>
            
                
            </div>
                
            </form>
        </div>
    </div>


</div><!-- End Default Tabs -->



<script>
    $(document).ready(function () {
        // Sélectionnez le commutateur par son ID
        var switchInput = $('#flexSwitchCheckChecked{{ $index }}');

        // Attachez un gestionnaire d'événements au changement d'état du commutateur
        switchInput.change(function () {
            // Récupérez l'état actuel du commutateur
            var isAdmin = switchInput.prop('checked');  

            // En fonction de l'état, envoyez la requête appropriée
            var url = isAdmin ? "{{ route('changeStatut', ['statut' => 'admin', 'id_gestionnaire' => $gestionnaire -> id]) }}" 
            : '{{ route("changeStatut", ["statut" => "gestionnaire", "id_gestionnaire" => $gestionnaire -> id]) }}'; 
            $.get(url, function (data) {
                // Traitez la réponse du contrôleur si nécessaire 
                //$('#message').html(data);
                alert(data);
                console.log('Requête envoyée avec succès');
                location.reload();
            });
        });
    });
</script>
