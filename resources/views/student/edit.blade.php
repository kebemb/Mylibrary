@extends('base')

@section('content')
    
    <div class="container">
        <h3 class="my-5">Edit</h3>

        <form class="row g-3" method="POST" action="{{ route('students.update', $student->id)}}">
            @method("PUT")
            @csrf
            <div class="col-md-4">
              <label>Prénom</label>
              <input type="text" value="{{ $student->first_name }}" class="form-control @error('first_name') is-invalid @enderror"  name="first_name">
              @error('first_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-md-4">
              <label>Nom</label>
              <input type="text" value="{{ $student->last_name }}" id="last_name" class="form-control @error('last_name') is-invalid @enderror"  name="last_name">
              @error('last_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-md-4">
              <label>Age</label>
              <input type="text" id="age" value="{{ $student->age }}" class="form-control @error('age') is-invalid @enderror"  name="age">
              @error('age ')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-md-4">
              <label>Genre</label>
              <input type="text" id="gender" value="{{ $student->gender }}" class="form-control @error('gender') is-invalid @enderror"  name="gender">
              @error('gender')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-md-4">
              <label>E-mail</label>
              <input type="email" value="{{ $student->email }}" id="email" class="form-control @error('email') is-invalid @enderror"  name="email">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-md-4">
              <label>Téléphone</label>
              <input type="number" id="phone" value="{{ $student->phone }}" class="form-control @error('phone') is-invalid @enderror"  name="phone">
              @error('phone')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-md-4">
              <label>Adresse</label>
              <input type="text" id="address" value="{{ $student->address }}" class="form-control @error('adress') is-invalid @enderror"  name="address">
              @error('address')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-md-4">
              <label>Classe</label>
              <input type="text" id="class" value="{{ $student->class }}" class="form-control @error('class') is-invalid @enderror"  name="class">
              @error('class')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-12">
              <button class="btn btn-dark" type="submit">Editer</button>
            </div>
          </form>
    </div>
@endsection