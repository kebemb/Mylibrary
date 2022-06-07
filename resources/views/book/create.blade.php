@extends('admin.sidebar')

@section('content')
    
    <div class="container">
        <h3 class="my-5">Création d'un nouveau livre</h3>

        <form class="row g-3" method="POST" action="{{ route('books.store')}}" enctype="multipart/form-data">
          @csrf
            <div class="col-md-4">
              <label>Titre</label>
              <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"  name="title">
              @error('title')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="col-md-4">
                <label> Description</label><br>
                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="2" >
                {{old('description')}}
                </textarea><br>
                <small class="txt-desc">(Veuillez saisir une description)</small>
            </div>

            <div class="col-md-4">
                <label> Image:</label>
                <input type="file" id="image" name="image" class="form-control col-md-7 col-xs-12">
                <small class="txt-desc">(Veuillez choisir l'image de la catégorie)</small>
            </div>

            <div class="col-md-4">
              <label>Année pub</label>
              <input type="text" id="year_publication" class="form-control @error('year_publication') is-invalid @enderror"  name="year_publication">
              @error('year_publication')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-md-4">
              <label>Maison édition</label>
              <input type="text" id="edition_home" class="form-control @error('edition_home') is-invalid @enderror"  name="edition_home">
              @error('edition_home ')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-md-4">
              <label>Date édition</label>
              <input type="date" id="edition_date" class="form-control @error('edition_date') is-invalid @enderror"  name="edition_date">
              @error('edition_date')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-md-4">
                <label>Nom Catégorie:</label>
                <select data-placeholder="veuillez selectionner" name="category_id" id="category_id" class="form-control select2 col-md-7 col-xs-12">
                <option>Veuillez choisir</option>
                @foreach($nomcategories as $nomcategorie)
                    <option value="{{$nomcategorie->id}}">{{ $nomcategorie->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label>Nom de l'auteur:</label>
                <select data-placeholder="Veuillez selectionner" multiple name="author_id[]" id="author_id" class="form-control select2 col-md-7 col-xs-12">
                <option>Veuillez choisir</option>
                @foreach($authors as $author)
                    <option value="{{$author->id}}">{{ $author->first_name }} {{ $author->last_name }}</option>
                @endforeach
                </select>
            </div>
            <div class="col-md-4">
              <label>Nombre exemplaires</label>
              <input type="number" id="nombre_exemplaires" class="form-control @error('nombre_exemplaires') is-invalid @enderror"  name="nombre_exemplaires">
              @error('nombre_exemplaires')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-12">
              <button class="btn btn-dark" type="submit">Créer</button>
            </div>
          </form>
    </div>
@endsection