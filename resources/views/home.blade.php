@extends('base')

@section('content')
<div class="bg-light p-5 rounded-lg m-3">
    <div class="row md-3">
        
        <div class="categories row justify-content-left">
            
                <div class="row">
                    <div class="col-sm-4">
                        <h3>Toutes les catégories</h3>
                        @foreach ($categories as $category)
                            <li>{{$category->name}}</li>
                        @endforeach
                    </div>
                    <div class="col-sm-8">

                        <h3>Les livres de la catégorie</h3>
                    </div>
                </div>
            
        </div>
    </div>
</div>
@endsection