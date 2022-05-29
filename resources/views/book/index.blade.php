@extends('admin.sidebar')

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Livres</h1>
        <div class="d-flex justify-content-center">
            <a class="btn btn-info my-3" href="{{ route('books.create')}}">Ajouter un nouveau livre</a>
        </div>
        <table class="table">
            <thead>
              <tr class="table-active">
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Titre</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Auteur(s)</th>
                <th scope="col">Nombre exemplaire</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($books as $book)
              <tr>
                    <th>{{ $book->id}}</th>
                    <td>
                    <img class="margin-right-15 width-hight" width="50" height="50" align="left" src="{{url('images/books/'.$book->image)}}"
                        title="{{ $book->title }}">
                    </td>
                    <td>{{ $book->title}}</td>
                    <td>{{ $book->category->name}}</td>
                    <td> {{ $book->author->first_name}} {{ $book->author->last_name}}</td>
                    <td> {{ $book->exemplaire[0]->nombre_exemplaires}}
                    <td>{{ $book->description}}</td>
                    <td class="d-flex">
                        <a href="{{ route('books.edit', $book->id)}}" class="btn btn-warning mx-3">Editer</a>
                        <button type="button" class="btn btn-danger" onclick="document.getElementById('model-open-{{ $book->id }}').style.display='block'">Supprimer</button>
                        <form action="{{ route('books.delete', $book->id)}}" method="POST">
                          @csrf
                          @method("DELETE")
                          <div class="modal" id="model-open-{{ $book->id }}" tabindex="-1">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">La suprression d'un élèment est définitive</h5>
                                  <button type="button" class="btn-close" onclick="document.getElementById('model-open-{{ $book->id }}').style.display='none'" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <p>Etes vous sur de vouloir supprimer cet élèment ?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" onclick="document.getElementById('model-open-{{ $book->id }}').style.display='none'" data-bs-dismiss="modal">Annuler</button>
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
            {!! $books->links() !!}
        </div>
    </div>
@endsection