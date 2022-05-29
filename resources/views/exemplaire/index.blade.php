@extends('admin.sidebar')

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Copies</h1>
        <table class="table">
            <thead>
              <tr class="table-active">
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Livre</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($exemplaires as $exemplaire)
              <tr>
                    <th>{{ $exemplaire->id}}</th>
                    <td>{{ $exemplaire->nombre_exemplaires}}</td>
                    <td>{{ $exemplaire->book->title }}</td>
                    <td class="d-flex">
                      <a href="{{ route('exemplaires.edit', $exemplaire->id)}}" class="btn btn-warning mx-3">Editer</a>
                      <button type="button" class="btn btn-danger">Supprimer</button>
                     
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection