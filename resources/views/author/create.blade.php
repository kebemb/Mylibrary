@extends('admin.header')

@section('content')
    
    <div class="container">
        <h3 class="my-5">Create a new</h3>

        <form class="row g-3" method="POST" action="{{ route('authors.store')}}">
          @csrf
            <div class="col-md-4">
              <label>First Name</label>
              <input type="text" id="first_name" class="form-control @error('first_name') is-invalid @enderror"  name="first_name">
              @error('first_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-md-4">
                <label> Last Name</label><br>
                <input type="text" id="last_name" class="form-control @error('last_name') is-invalid @enderror"  name="last_name">
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            

            <div class="col-md-4">
              <label>Email</label>
              <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"  name="email">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-md-4">
              <label>Country</label>
              <select class="selectpicker countrypicker" data-live-search="true" ></select>
              @error('address ')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-12">
              <button class="btn btn-dark" type="submit">Creer</button>
            </div>
          </form>
    </div>
@endsection