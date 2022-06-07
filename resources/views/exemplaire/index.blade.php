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
              </tr>
            </thead>
            <tbody>
              @foreach ($exemplaires as $exemplaire)
              <tr>
                    <th>{{ $exemplaire->id}}</th>
                    <td>{{ $exemplaire->nombre_exemplaires}}</td>
                    <td>{{ $exemplaire->book->title }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection