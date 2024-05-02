<div class="pagetitle">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ '/' }}">Tableau de bords</a></li>
            @foreach($breadcrumbs[0] as $key => $value)
                <li class="breadcrumb-item"><a href="{{ route($key) }}">{{ $value }}</a></li>
            @endforeach
            <li class="breadcrumb-item active">{{ $breadcrumbs['active'] }}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->