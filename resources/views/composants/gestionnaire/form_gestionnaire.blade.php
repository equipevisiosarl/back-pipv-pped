<!-- Vertical Form -->
<form class="row g-2 form-ajax" method="post" action="{{route('newgestionnaire')}}" id="monFormulaire">
    @csrf
    <div class="col-12">
        <label for="inputNanme4" class="form-label">Nom et Prenoms</label>
        <input type="text" name="name" class="form-control" id="inputNanme4" value="{{ @old('name') }}" required>
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label for="inputLogin" class="form-label">Username</label>
        <input type="text" name="login" class="form-control" id="inputLogin" value="{{ @old('login') }}" required>
        @error('login')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail4"  value="{{ @old('email') }}"  required>
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label for="inputPassword4" class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="inputPassword4" value="{{ @old('password') }}" required>
        @error('password')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="text-center mt-4">
        <input type="submit" value="Valider" class="btn btn-primary">
    </div>
</form><!-- Vertical Form -->



<script>
    /* $(document).ready(function() {
        $('.form-ajax').submit(function(e) {
            e.preventDefault();
            // Effectuez la requête Ajax
            $.ajax({
                type: 'POST',
                url: "{{ route('newgestionnaire') }}",
                data: $(this).serialize(),
                success: function(response) {
                    $('#liste_gestionnaire').html(response);
                    console.log(response);
                    var formulaire = document.getElementById('monFormulaire');

                    // Réinitialisez le formulaire
                    formulaire.reset();
                    alert(" bien enregistrée !!!");
                },
                error: function(error) {
                    alert("erreur lors de l'enregistrement email ou login deja occupé");
                    console.log(error);
                }
            });


        });
    });*/
</script>