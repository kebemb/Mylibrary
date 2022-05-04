@extends('admin.sidebar')

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Etudiant</h1>
        <div class="d-flex justify-content-center">
            <a class="btn btn-info my-3" href="{{ route('students.create')}}">Ajouter</a>
        </div>
        <table class="table">
            <thead>
              <tr class="table-active">
                <th scope="col">ID</th>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Age</th>
                <th scope="col">Genre</th>
                <th scope="col">E-mail</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Adresse</th>
                <th scope="col">Classe</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($students as $student)
              <tr>
                    <th>{{ $student->id}}</th>
                    <td>
                        {{$student->first_name}}
                    </td>
                    <td>{{ $student->last_name}}</td>
                    <td>{{ $student->age}}</td>
                    <td>
                        {{$student->gender}}
                    </td>
                    <td>{{ $student->email}}</td>
                    <td>{{ $student->phone}}</td>
                    <td>{{ $student->address}}</td>
                    <td>{{ $student->class}}</td>
                    <td class="d-flex">
                        <a href="{{ route('students.edit', $student->id)}}" class="btn btn-warning mx-3">Editer</a>
                        <button type="button" class="btn btn-danger" onclick="document.getElementById('model-open-{{ $student->id }}').style.display='block'">Supprimer</button>
                        <form action="{{ route('students.delete', $student->id)}}" method="POST">
                          @csrf
                          @method("DELETE")
                          <div class="modal" id="model-open-{{ $student->id }}" tabindex="-1">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">La suprression d'un élèment est définitive</h5>
                                  <button type="button" class="btn-close" onclick="document.getElementById('model-open-{{ $student->id }}').style.display='none'" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <p>Etes vous sur de vouloir supprimer cet élèment ?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" onclick="document.getElementById('model-open-{{ $student->id }}').style.display='none'" data-bs-dismiss="modal">Annuler</button>
                                  <button type="submit" class="btn btn-primary">Oui</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                    </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            {!! $students->links() !!}
        </div>
    </div>
@endsection