@extends('admin.sidebar')

@section('content')
    <div class="container">
        <h3 class="my-5"> Détails de l'emprunt</h3>
      
            <div class="col-md-4">
                <p>Titre : {{ $detemprunt->book->title}}</p>
                <p>Auteur : {{ $detemprunt->book->author->first_name}} {{ $detemprunt->book->author->last_name}}</p>
                <p>Emprunteur :{{ $detemprunt->user->name}}</p>
                <p>Email Emprunteur :{{ $detemprunt->user->email}}</p>
                <p>Adresse Emprunteur :{{ $detemprunt->user->address}}</p>
                <p>Téléphone Emprunteur :{{ $detemprunt->user->tel}}</p>
                <p> Date Emprunt : {{ $detemprunt->emprunt_date}}</p>
                <p>Date retour :{{ $detemprunt->return_date}}</p>
            </div>
            <div class="col-12">
                <a href="{{route('emprunts')}}">
                <button class="btn btn-dark" type="submit">
                     Retour
                </button>
               </a>
            </div>
    </div>
@endsection