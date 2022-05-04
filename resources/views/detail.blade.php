@extends('incs.navslider')

@section('content')

<style>
    .position-relative{
        
        border-radius: 15px;
        background-color: #92959a;
    }
</style>
    <!-- Featured Start -->
    <div class="container">
        <div class="row px-xl-5 pb-3 position-relative text-white mb-1 py-5 px-5">
        @foreach ($booksres as $book)    
            <dl class="row">
                <dt class="col-sm-6">
                    <img class="margin-right-15 width-hight" align="left" src="{{url('images/books/'.$book->image)}}"
                        title="{{ $book->title }}"><br>
                </dt>
                <dd class="col-sm-6">
                   <h2>Titre: {{$book->title}}</h2>
                   <h5>Sa description: {{$book->description}}</h5>
                   <h5>Année de publication: {{$book->year_publication}}</h5>
                   <h5>Maison d'édition: {{$book->edition_home}}</h5>
                   <h5>Date d'édition: {{$book->edition_date}}</h5>
                </dd>
                <button class="btn btn-secondary" style=" border-radius:35px;background-color: #772953 ;color:white;width: 100%;">Enprunter</button>
            </dl>    
        @endforeach
        </div>

    </div>
    <!-- Featured End -->
@endsection
