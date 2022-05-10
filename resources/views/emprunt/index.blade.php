@extends('admin.sidebar')

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Emprunt</h1>
        <div class="d-flex justify-content-center">
            <a class="btn btn-info my-3" href="#">Add new category</a>
        </div>
        <table class="table">
            <thead>
              <tr class="table-active">
                <th scope="col">ID</th>
                <th scope="col">Date Emprunt</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($emprunts as $emprunt)
              <tr>
                    <th>{{ $emprunt->id}}</th>
                    <td>{{ $emprunt->emprunt_date}}</td>

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