
<table class="table table-hover table-responsive bg-white ">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom Prenoms</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($gestionnaires as $index => $gestionnaire)
        <tr>
            <th scope="row">{{ $index +1 }}</th>
            <td>{{ $gestionnaire->name }}</td>
            <td>{{ $gestionnaire->statut }}</td>
            <td>
                <a href="" data-bs-toggle="modal" data-bs-target="#gestionnaire{{ $index +1 }}Modal"><i class="ri-profile-line text-primary" title="profil"></i></a>
                <a href="" data-bs-toggle="modal" data-bs-target="#supp{{ $index +1 }}Modal"><i class="ri-delete-bin-6-line" title="supprimer"></i></a>
            </td>
        </tr>

        @include('composants.gestionnaire.modal_gestionnaire')

        @include('composants.gestionnaire.modal_gestionnaire_supp')

        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $gestionnaires->links() }}
</div>