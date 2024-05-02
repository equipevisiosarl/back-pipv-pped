@extends('templates.espace')
@section('title', $article->title)

@section('content')
@include('composants.pagetitle')

<div class="container">
    <div class="row">
        <div class="col-sm-7">
            <img src="{{$article -> miniature}}" alt="">
        </div>
        <div class="col-sm-5">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$article -> title}}</h5>
              {{$article -> resume}}
            </div>
          </div>
         <br> 
        </div>
    </div>
</div>


@endsection