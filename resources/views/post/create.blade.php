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
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor" value="{{old('autor')}}" placeholder="Podaj autora">
            {{-- @if ($errors->has('autor'))
            <div style="color:red">
                @foreach ($errors->get('autor') as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
            @endif --}} 
            @error('autor')
                <div style="color:red">{{$message}}</div>
            @enderror

        </div>
        <div class="for-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Podaj email autora">
            @error('email')
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