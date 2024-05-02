@extends('templates.espace')
@section('title', 'Article')

@section('content')
@include('composants.pagetitle')

@include('composants.article.listeArticle')
@endsection