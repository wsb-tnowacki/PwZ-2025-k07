@extends('layout.layout')
@section('tytul','Dodawanie postu')
@section('podtytul','Dodaj post')
@section('tresc')
    <form action="{{route('post.store')}}" method="POST">
        @csrf
        <div class="for-group">
            <label for="tytul" class="form-label">Tytuł</label>
            <input type="text" class="form-control" id="tytul" name="tytul" value="{{old('tytul')}}" placeholder="Podaj tytuł">
            @error('tytul')
                <div style="color:red">{{$message}}</div>
            @enderror
        </div>
        <div class="for-group">
            <label for="tresc" class="form-label">Treść</label>
            <textarea class="form-control" name="tresc" id="tresc" cols="40" rows="5">{{old('tresc')}}</textarea>
            @error('tresc')
                <div style="color:red">{{$message}}</div>
            @enderror
        </div>
        <button class="btn btn-success m-1" type="submit">Dodaj post</button>
    </form>
    <a href="{{route('post.index')}}"><button class="btn btn-primary m-1" type="submit">Powrót do listy</button></a>
@endsection