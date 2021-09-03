@extends('app')

@section('titulo', 'Forme seu time')

@section('main')
<h1>Cadastrar Jogador</h1>
<form action="{{ route('cad.player')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nome: </label>
        <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="skill">Habilidade</label>
        <select class="form-control" name="skill" id="skill" required>
            <option value="">Selecione</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    <div class="form-group">
        <label for="goalkeeper">É goleiro?</label>
        <select class="form-control" name="goalkeeper" id="goalkeeper" required>
            <option value="">Selecione</option>
            <option value="0">Não</option>
            <option value="1">Sim</option>
        </select>
    </div>





    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
@endsection
