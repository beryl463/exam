@extends('user.template')

@section('h1',)
   Mes Livres lus
   @endsection

 @section('mycontent')
<div class="d-flex justify-content-center align-item-center my-3">
    <a href="{{ route('user.livres.create') }}" class="btn btn-primary"> Ajouter un nouveau livre</a>
</div>

 @if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session('warning')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif

    <div class="table-responsive">
        <table  id="table" class="table table-striped table-hover text-center">
            <thead class="bg-ocean text-dark">
                <tr>
                    
                    <th>Titre du livre</th>
                    <th>Nom de l'auteur</th>
                    <th>Avis</th>
                    <th>Note<th>
                    <th>Paramètres</th>
                </tr>
            </thead>
    
             <tbody>
                 @foreach ($livres as $livre)
                    <tr>
                         <td>{{ $livre->title }}</td>
                        <td>{{ $livre->name}}</td>
                        <td>{{ $livre->content}}</td>
                        <td>{{ $livre->note}}</td>
                        <td>{{ $livre->parametres}}</td>
                       {{--<td>
                            <a href="{{ route('user.livres.show',$livre->id)}}" class="btn btn-sm btn-info">Lire</a>
                        </td>--}}
                        
                        <td>
                            <a href="{{route('user.livres.edit', $livre->id)}}" class="btn btn-sm btn-secondary">Modifier</a>
                            <form action="{{ route('user.livres.delete', $livre->id) }}" method="POST" class="d-inline" onclick="return confirm('Confirmer la suppression ?')">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-sm btn-danger" value="supprimer" >
                            </form>
                        </td> 
                    </tr> 
                @endforeach
            </tbody>  
        </table>
    </div>
    {{--<div class="d-flex justify-content-end align-items-center">
        {{ $livres->links() }}
    </div> --}}
  @endsection