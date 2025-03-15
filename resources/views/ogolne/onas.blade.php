@extends('layout.layout')
@section('tytul','O nas')
@section('podtytul','O nas')
@section('tresc')
    <div>
        Strona o nas
        <div>
            <ol>
                {{-- 
            <?php foreach ($zadania ?? '' as $zadanie) : ?>
            <li><?= $zadanie ?></li>
            <?php endforeach; ?>  
            --}}  
            @isset($zadania)
            @foreach ($zadania as $zadanie)
                <li>{{ $zadanie }}</li>
            @endforeach                
            @endisset  
          
            </ol>

        </div>
    </div>
@endsection