<div class="container">

<div class="row">
    @foreach($articles as $index => $article)

   <div class="col-sm-3">
   <div class="card">
        <img src="{{$article->miniature}}" class="card-img-top" alt="...">
        <div class="card-body">
            <a href="{{route('article', ['id' => $article->id])}}"><h5 class="card-title">{{$article->title}}</h5></a>
            <p class="card-text">{{substr($article->resume, 0, 50)}}...</p>
        </div>
    </div>
   
   </div>
    

    @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $articles->links() }}
    </div>
</div>



</div>