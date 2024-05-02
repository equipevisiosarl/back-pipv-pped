<div class="container">
    <div class="col-sm-6">
        <input type="text" class="form-control mb-3" id="search" placeholder="Rechercher par region ou groupements...">
    </div>

    <div id="table-container">
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
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $groupements->links() }}
        </div>
    </div>



</div>


<script>
    $(document).ready(function() {
        $('#search').on('input', function() {
            var query = $(this).val();
            $.ajax({
                url: '{{route("searchGroupements")}}',
                type: 'GET',
                data: {
                    query: query
                },
                success: function(response) {
                    $('#table-container').html(response);
                }
            });
        });
    });
</script>