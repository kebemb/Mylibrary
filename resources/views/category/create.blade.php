@extends('admin.sidebar')

@section('content')
    
    <div class="container">
        <h3 class="my-5">Créer une nouvelle</h3>
        <form class="row g-3" method="POST" action="{{ route('categories.store')}}">
          @csrf
            <div class="col-md-4">
              <label>Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name">
              @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="col-12">
              <button class="btn btn-dark" type="submit">Enregistrer</button>
            </div>
          </form>
    </div>
@endsection