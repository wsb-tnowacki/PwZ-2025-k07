@extends('layout.layout')
@section('tytul','Edycja postu')
@section('podtytul','Edytuj post')
@section('tresc')
@isset($post)
    <form action="{{route('post.update', $post->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="for-group">
            <label for="tytul" class="form-label">Tytuł</label>
            <input type="text" class="form-control" id="tytul" name="tytul" value="@if(old('tytul') !== null){{old('tytul')}}@else{{$post->tytul}}@endif" placeholder="Podaj tytuł">
            @error('tytul')
                <div style="color:red">{{$message}}</div>
            @enderror
        </div>
        <div class="for-group">
            <label for="tresc" class="form-label">Treść</label>
            <textarea class="form-control" name="tresc" id="tresc" cols="40" rows="5">@if(old('tresc') !== null){{old('tresc')}}@else{{$post->tresc}}@endif</textarea>
            @error('tresc')
                <div style="color:red">{{$message}}</div>
            @enderror
        </div>
        <button class="btn btn-success m-1" type="submit">Zmień post</button>
    </form>
    <a href="{{route('post.index')}}"><button class="btn btn-primary m-1" type="submit">Powrót do listy</button></a>
@endisset

@endsection
