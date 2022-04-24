@extends('base')

@section('content')
<div class="bg-light p-5 rounded-lg m-3">
    <div class="row md-3">
        <h1 class="display-3 text-left">Catégories</h1>
        <div class="categories row justify-content-left">
            @foreach ($categories as $category)
                <div class="row-md-3">
                    <div class="card-body">
                        <div class="card my-3">
                            <h5 class="card-name">{{$category->name}}</h5>
                            <a href="#" class="btn btn-primary">
                                Voir
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection