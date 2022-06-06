@extends('admin.sidebar')

@section('content')
    
    <div class="container">
        <h3 class="my-5">Modifier un auteur</h3>

        <form class="row g-3" method="POST" action="{{ route('authors.update', $author->id)}}">
            @method("PUT")
          @csrf
            <div class="col-md-4">
              <label>First Name</label>
              <input type="text" value="{{$author->first_name}}" class="form-control @error('first_name') is-invalid @enderror"  name="first_name">
              @error('first_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-md-4">
                <label> Last Name</label><br>
                <input type="text" value="{{$author->last_name}}" class="form-control @error('last_name') is-invalid @enderror"  name="last_name">
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            

            <div class="col-md-4">
              <label>Email</label>
              <input type="email" value="{{$author->email}}" class="form-control @error('email') is-invalid @enderror"  name="email">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-md-4">
              <label>Pays</label>
              <input type="text" value="{{$author->country}}"  class="form-control @error('country') is-invalid @enderror"  name="country">
              @error('country ')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="col-md-4">
              <label>Adresse</label>
              <textarea class="form-control" name="address" rows="3">{{$author->address}}</textarea>
            </div>
            <div class="col-12">
              <button class="btn btn-dark" type="submit">Modifier</button>
            </div>
          </form>
    </div>
@endsection