<table class="table table-hover table-responsive bg-white ">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">objet</th>
            <th scope="col">Date Creation</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($campagnes as $index => $campagne)
        <tr>
            <th scope="row">{{ $index +1 }}</th>
            <td>{{ $campagne->objet }}</td>
            <td>{{ $campagne->created_at }}</td>
            <td>env mod sup</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $campagnes->links() }}
</div>