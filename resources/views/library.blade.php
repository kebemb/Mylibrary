@extends('incs.navslider')

@section('content')

<style>
</style>
    <!-- Featured Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row text-center text-md-left text-white mb-5 py-5 px-5">
                @foreach ($booksres as $book)
                <a href="{{ route('book.detail', $book->id)}}" class="card col-lg-4 col-md-6 col-sm-6 col-12">
                        <img class="card-img-top" src="{{url('images/books/'.$book->image)}}" alt="{{ $book->title }}"
                         style="height: 200px; width:250px;">
                        <div class="card-body">
                            <h5 class="card-title">
                                <p>Titre: {{ $book->title }} </p>
                                <p>Auteur :  {{$book->author->first_name}} {{$book->author->last_name}}</p>
                            </h5>
                        </div>
                </a>
                @endforeach
            </div>
            
        </div>
    </div>
@endsection