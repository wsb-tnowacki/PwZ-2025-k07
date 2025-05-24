@extends('layout.layout')
@section('tytul','Lista postów')
@section('podtytul','Lista postów')
@section('tresc')
{{-- @dump($posty) --}}
@isset($posty)
    @if ($posty->count())
        <table class="table table-striped">
            <thead>
                <th scope="col">Lp.</th>
                <th scope="col">Tytuł</th>
                <th scope="col">Autor</th>
                <th scope="col">Data powstania</th>
                @auth
                <th scope="col">Akcja</th>                    
                @endauth

            </thead>
            <tbody>
                {{-- @php($lp=1) --}}
                @php($lp=$posty->firstItem())
                @foreach ($posty as $post)
                    <tr>
                        <td>{{$lp++}}</td>
                        <td><a href="{{route('post.show',$post->id)}}">{{$post->tytul}}</a></td>
                        <td>{{$post->user->name}}</td>
                        <td>{{date('j F Y',strtotime($post->created_at))}}</td>
                        @auth
                        <td class="d-flex">
                            <a href="{{route('post.edit',$post->id)}}">
                                <button class="btn btn-success m-1" type="submit">E</button>
                            </a>
                            <form action="{{route('post.destroy', $post->id)}}" method="post" onsubmit="return confirm('Czy na pewno usunąć ten post?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-1" type="submit">X</button>
                            </form>
                        </td>                            
                        @endauth

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$posty->links()}}
    @else
        <div>Nie ma żadnych postów</div>
    @endif
@else
    <div>Nie ma żadnych postów</div>
@endisset
@endsection
