@extends('app')

@section('titulo', 'Forme seu time')

@section('main')
    @if(isset($times))
        @if($times == 0)
            <h1>Não já jogadores confirmados suficiente para o sorteio</h1>
        @endif
    @else
        <h1>Sortei seu time</h1>
        <form action="{{ route('sorteio') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nJogadores">Quantos jogadores por time?</label>
                <input type="number" name="nJogadores" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Sortear</button>
        </form>
    @endif


@endsection
