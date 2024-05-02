<table class="table table-hover table-responsive bg-white ">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Nom Prenoms</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($promoteurs)
                @foreach($promoteurs as $index => $promoteur)
                <tr>
                    <th scope="row">{{ $index +1 }}</th>
                    <td><img src="{{ ($promoteur -> photo_promoteur !== '') ? $promoteur -> photo_promoteur :  'https://cdn-icons-png.freepik.com/512/3177/3177440.png' }}" class="profil"></td>
                    <td>{{ $promoteur->nom_prenoms }}</td>
                    <td>{{ $promoteur->telephone }}</td>
                    <td><a href="" data-bs-toggle="modal" data-bs-target="#promoteur{{ $index +1 }}Modal"><i class="ri-profile-line text-primary"></i></a></td>
                </tr>

                @include('composants.promoteur.modal_promoteur')

                @endforeach
                @else
                Aucun promoteur trouvé
                @endif 
            </tbody>
        </table>
