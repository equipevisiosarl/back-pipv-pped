@php

$infos = [
    ['Nom Prenoms' , Auth::user()->name, 'name', 'text'], 
    ['Email' , Auth::user()->email, 'email', 'email'],
    ['Username', Auth::user()->login, 'login', 'text'],
];

@endphp

<form action="{{route('update_user')}}" method="POST">

@csrf

    @foreach($infos as $info)
    <div class="row mb-3">
        <label for="Job" class="col-md-4 col-lg-3 col-form-label">{{$info[0]}}</label>
        <div class="col-md-8 col-lg-9">
            <input name="{{$info[2]}}" type="{{$info[3]}}" class="form-control" value="{{$info[1]}}" required> 
        </div>
    </div>
    @endforeach

    <div class="text-center">
        <input type="submit" value="Valider" class="btn btn-primary ">
    </div>

</form>