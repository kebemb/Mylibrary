@extends('incs.navslider')

@section('content')
    
    <div class="container">
        <h3 class="my-5">Processus d'emprunt</h3>

        <form class="row g-3" method="POST" action="{{ route('emprunts.store')}}" enctype="multipart/form-data">
          @csrf
            <div class="col-md-6">
              <label>N° Etudiant</label>
                <select data-placeholder="veuillez selectionner" name="student_id" id="student_id" class="form-control select2 col-md-12 col-xs-12">
                <option>Veuillez choisir</option>
                @foreach($students as $student)
                    <option value="{{$student->id}}">{{ $student->first_name }}</option>
                @endforeach
                </select>
            </div>
            
            <div class="col-md-6">
              <label>N° Livre</label>
                <select data-placeholder="veuillez selectionner" name="book_id" id="book_id" class="form-control select2 col-md-12 col-xs-12">
                <option>Veuillez choisir</option>
                @foreach($books as $book)
                    <option value="{{$book->id}}">{{ $book->title }}</option>
                @endforeach
                </select>
            </div>

            <div class="col-md-6">
              <label>Date emprunt</label>
              <input type="date" id="emprunt_date" class="form-control @error('emprunt_date') is-invalid @enderror"  name="emprunt_date">
              @error('emprunt_date')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-md-6">
              <label>Date de retour</label>
              <input type="date" id="return_date" class="form-control @error('return_date') is-invalid @enderror"  name="return_date">
              @error('return_date')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-12">
              <button class="btn btn-dark mt-3" type="submit" class="btn btn-secondary" style=" border-radius:35px;background-color: #772953 ;color:white;width: 100%;">Emprunter</button>
            </div>
          </form>
    </div>
@endsection