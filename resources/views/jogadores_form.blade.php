@extends('principal')

@section('conteudo')

<div class="container">

  <div class="row" style="margin-top: 10px">
  <div class="col-sm-11">

  @if ($acao == 1)
    <h2>Inclusão de Jogadores</h2>
  @elseif ($acao == 2)
    <h2>Consulta de Jogadores</h2>
    @else
      <h2>Alteração de Jogadores</h2>
    @endif
  </div>
  <div class="col-sm-1">
  <a href="{{ route('jogadores.index') }}" class="btn btn-info" role="button">
    Voltar</a>
  </div>
  </div>
  @if($acao == 1)
    <form action="{{ route('jogadores.store') }}" method="POST">
  @elseif ($acao ==3)
    <form action="{{ route('jogadores.update', $reg->id) }}" method="POST">
    {{method_field('PUT') }}
    @endif

    {{ csrf_field() }}

    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" name="nome"
          value="{{$reg ->nome or old('nome') }}">
    </div>

    <div class="form-group">
      <label for="clube">Clube:</label>
      <input type="text" class="form-control" id="clube" name="clube"
          value="{{$reg ->clube or old('clube') }}">
    </div>
  
    <div class="form-group">
      <label for="idade">Idade:</label>
      <input type="text" class="form-control" id="idade" name="idade"
          value="{{$reg ->idade or old('idade') }}">
    </div>
    
    <div class="form-group">
      <label for="salario">Salário R$:</label>
      <input type="text" class="form-control" id="salario" name="salario"
          value="{{$reg ->salario or old('salario') }}">
    </div>
    @if($acao == 1 or $acao == 3)
    <button type="submit" class="btn btn-primary">Enviar</button>
    <button type="reset" class="btn btn-success">Limpar</button>
    @endif
  </form>

@endsection  