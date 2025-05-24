@extends('layout.layout')
@section('tytul','Pojedynczy post')
@section('podtytul','Szczegóły postu')
@section('tresc')
@isset($post)
        <div class="for-group">
            <label for="tytul" class="form-label">Tytuł</label>
            <input type="text" class="form-control" id="tytul" name="tytul" value="{{$post->tytul}}" disabled>
        </div>
        <div class="for-group">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor" value="{{$post->user->name}}" disabled>
        </div>
        <div class="for-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$post->user->email}}" disabled>
        </div>
        <div>Data utworzenia: <b>{{date('j F Y',strtotime($post->created_at))}}</b></div>
        <div>Data edycji: <b>{{date('j F Y',strtotime($post->updated_at))}}</b></div>
        <div class="for-group">
            <label for="tresc" class="form-label">Treść</label>
            <textarea class="form-control" name="tresc" id="tresc" cols="40" rows="5" disabled>{{$post->tresc}}</textarea>
        </div>   
        @auth
         <div class="d-flex">
            <a href="{{route('post.edit', $post->id)}}"><button class="btn btn-success m-1" type="submit">Edytuj post</button></a>  
            <form action="{{route('post.destroy', $post->id)}}" method="post" onsubmit="return confirm('Czy na pewno usunąć ten post?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger m-1" type="submit">Usuń post</button>
            </form>
        </div>           
        @endauth
@endisset

       <a href="{{route('post.index')}}"><button class="btn btn-primary m-1" type="submit">Powrót do listy</button></a> 
@endsection