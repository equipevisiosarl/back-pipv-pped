<table class="table table-hover table-responsive bg-white ">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Groupements</th>
            <th scope="col">Nature</th>
            <th scope="col">Responsable</th>
            <th scope="col">Postulants</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($groupements))
        @foreach($groupements as $index => $groupement)
        <tr>
            <th scope="row">{{ $index +1 }}</th>
            <td>{{ $groupement->nom_groupement }}</td>
            <td>{{ $groupement->nature_groupement }}</td>
            <td>{{ $groupement->nom_responsable }}</td>
            <td>{{ $groupement->nom_prenoms }}</td>
            <td><a href="" data-bs-toggle="modal" data-bs-target="#groupement{{ $index +1 }}Modal"><i class="ri-profile-line text-primary"></i></a></td>
        </tr>

        @include('composants.groupement.modal_groupements')

        @endforeach
        @else
        Aucun groupement trouvé
        @endif
    </tbody>
</table>