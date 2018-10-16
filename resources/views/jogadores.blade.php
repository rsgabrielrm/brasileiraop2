@extends('principal')
@section('conteudo')
<div class="container">

  <div class="row" style="margin-top: 10px">
  <div class="col-sm-11">
    <h2>Cadastro de Atletas</h2>
  </div>
  <div class="col-sm-1">
  <a href="{{ route('jogadores.create') }}" class="btn btn-info" role="button">
    Novo</a>
  </div>
  </div>

  @if (session('status'))
  <div class="alert alert-success">
      {{ session('status') }}
  </div>
  @endif
  @if (count($lista)>0)
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Clube</th>
          <th>Idade</th>
          <th>Salário R$</th>
          <th>Menu</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($lista as $p)
          <tr>
            <td>{{$p->nome}}</td>
            <td>{{$p->clube}}</td>
            <td>{{$p->idade}}</td>
            <td>{{ number_format($p->salario, 2, ',', '.') }}</td>
            <td>
            <a href="{{route('jogadores.show',$p->id) }}" class="btn btn-success btn-sm" role="button">Consultar</a>

            <a href="{{route('jogadores.edit',$p->id) }}" class="btn btn-warning btn-sm" role="button">Alterar</a>

            <form action="{{route('jogadores.destroy', $p->id)}}" method="POST" style="display: inline-block" onsubmit="return confirm('Confirma Exclusão?')">
              {{method_field('DELETE')}}
              {{csrf_field()}}
              <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
            </form>
            
            </td>
          </tr>  
        @endforeach
      </tbody>
    </table>
    <p>A média salárial dos jogadores cadastrados é de R$ {{$mediaSalario}}</p>
  @else
    <p>Não temos jogadores cadastrados!</p>
  @endif
</div>

@endsection