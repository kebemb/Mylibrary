@extends('admin.header')

@section('content')
    
    <div class="container">
        <h3 class="my-5">Create a new</h3>

        <form class="row g-3" method="POST" action="{{ route('books.store')}}">
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
            
            <div class="form-group">
                <label for="category">Catégorie</label>
                <select name="category" class="form-control" >
                    @foreach ($categories as $category)
                        <option value="{{ $category->id}}">{{ $category->label}}</option>
                    @endforeach
                  </select>
            </div>
            
            <div class="col-12">
              <button class="btn btn-dark" type="submit">Creer</button>
            </div>
          </form>
    </div>
@endsection


