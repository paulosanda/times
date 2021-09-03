@extends('app')

@section('titulo', 'Forme seu time')

@section('main')
   @if($ntimes < 2)
   <h1>Não é possível formar 2 times</h1>
   @else
   <h1>Estes são os times</h1>
   <table class="table">
    <!-- {{ $letra = "A"}} -->
    <thead>
        <th>Nome</th>
        <th>Nivel de habilidade</th>
        <th>Goleiro?</th>
    </thead>
    <tbody>
    @foreach ($times as $ts)
        <tr>
            <td colspan="3" align="center"><b>Time {{  $letra }}</b></td>
        </tr>
        @foreach ($ts as $t)
            <tr>
                <td>
                    {{ $t['name'] }}

                </td>
                <td>{{ $t['skill_level'] }}</td>
                <td>
                    @if($t['goalkeeper'] == 1)
                    goleiro
                    @endif
                </td>
            </tr>
        @endforeach
        <!-- {{ ++$letra }} -->
    @endforeach
    </tbody>
   </table>
   @endif
@endsection
