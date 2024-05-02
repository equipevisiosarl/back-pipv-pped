@if (session('message'))

<div class="alert alert-success">
    {{ session('message') }}
</div>

@endif

<table class="table table-hover table-responsive bg-white ">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Date d'inscription</th>
        </tr>
    </thead>
    <tbody>
        @foreach($newsletters as $index => $newsletter)
        <tr>
            <th scope="row">{{ $index +1 }}</th>
            <td>{{ $newsletter->email }}</td>
            <td>{{ $newsletter->create_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $newsletters->links() }}
</div>