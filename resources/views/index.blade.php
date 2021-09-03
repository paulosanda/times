@extends('app')

@section('titulo', 'Forme seu time')

@section('main')
    @if(isset($jogadores[0]))
    <h1>Jogadores</h1>
    <table class="table table-striped">
        <thead>
            <th>Nome</th>
            <th>Confirmou?</th>
            <th>Joga no gol?</th>
            <th>Habilidade</th>
        </thead>
        <tbody>
            @foreach ($jogadores as $j)
                <tr>
                    <td>{{ $j->name}}</td>
                    <td>
                        @if($j->confirmed == 1)
                        <b>Confirmado</b>
                        @else
                        <a type="button" href="{{ url('/') }}/confirm/{{ $j->id }}"
                        class="btn btn-sm btn-warning" role="button">Confirmar</a>
                        @endif
                    </td>
                    <td>
                        @if($j->goalkeeper == 1)
                            Sim
                        @else
                            Não
                        @endif
                    </td>
                    <td>{{ $j->skill_level }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <h1>Não há jogadores</h1>
    @endif


@endsection
