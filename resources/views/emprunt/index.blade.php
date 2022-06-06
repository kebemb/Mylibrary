@extends('admin.sidebar')

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Consultation Emprunt</h1>
        <div class="d-flex justify-content-center">
            {{-- <a class="btn btn-info my-3" href="#">Add new category</a> --}}
        </div>
        <table class="table">
            <thead>
              <tr class="table-active">
                <th scope="col">ID</th>
                
                <th scope="col">Livre</th>
                <th scope="col">Auteur du livre</th>
                <th scope="col"> Emprunté par</th>
                <th scope="col">Date Emprunt</th>
                <th scope="col"> Date fin emprunt </th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($emprunts as $emprunt)
              <tr>
                    <th>{{ $emprunt->id}}</th>
                    <td>{{ $emprunt->book->title}}</td>
                    <td>{{ $emprunt->book->author->first_name}} {{ $emprunt->book->author->last_name}}</td>
                    <td>{{ $emprunt->user->name}}</td>
                    <td>{{ $emprunt->emprunt_date}}</td>
                    <td>{{ $emprunt->return_date}}</td>

                    <td class="d-flex">
                        <a href="#" class="btn btn-warning mx-3">Editer</a>
                        <button type="button" class="btn btn-danger">Supprimer</button>
                       
                    </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection