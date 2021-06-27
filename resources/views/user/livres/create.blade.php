@extends('user.template')

@section('summernote')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endsection

@section('h1')
    Nouveau livre
@endsection

@section('mycontent')
    <div class="container">
        <form action="{{ route('user.livres.store') }}" method="post" >
            @csrf
            
            <div class="form-group">
                <label for="title">Titre du livre</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                <div class="text-danger">{{ $errors->first('title', ":message")}} 
            </div>
            <div class="form-group">
                <label for="name">Nom de l'auteur</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    
                    {{--@foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name}}</option>{{--pour faire apparaitre les choix des categories
                    @endforeach --}}
                
                 <div class="text-danger">{{ $errors->first('name', ":message")}} 
            </div>
            
          
            </div>
            <div class="form-group">
                <label for="content">avis</label>
                <textarea name="content" id="content" class="form-control" rows="10">{{ old('content') }}</textarea>
                <div class="text-danger">{{ $errors->first('content', ":message")}}
                <script>
                    $('mycontent').summernote({//#content ca doit etre le meme nom que l'id du textarea ds ce cas car c ca quon veut modifié
                      placeholder: 'Bonne rédaction',
                      tabsize: 2,
                      height: 500
                    });
                  </script>

            <div class="form-group">
                <label for="note">Note</label>
                <input type="integer" name="note" id="note" class="form-control" value="{{ old('note') }}">
                <div class="text-danger">{{ $errors->first('note', ":message")}} 
            </div>   
              
        
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="sauvegarder">
            </div>
        </form>
    </div>
@endsection