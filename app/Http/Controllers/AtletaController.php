<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atletas;

class AtletaController extends Controller
{
    public function index() {
		$jogadores = new Atletas();
		$lista = $jogadores->all();
		// verifica se tem mais pelo menos 1 jogador
		if(count($lista)>0){
			//faz a média do salário
			$acumulaValores = 0;
			foreach($lista as $j){
				$acumulaValores += $j->salario;
			}
			// faz a divisão
			$calculoMediaSalario = $acumulaValores / count($lista);
			// formata numero final
			$mediaSalario = number_format($calculoMediaSalario, 2, ',', '');
			return view('jogadores', ['lista' => $lista, 'mediaSalario' => $mediaSalario]);
		} else {
			return view('jogadores', ['lista' => $lista]);
		}

	}

	public function show($id) {
		 $reg = Atletas::find($id);

        return view('jogadores_form',['reg' => $reg, 'acao' => 2]);
	}

	public function create() {

		return view('jogadores_form',['acao' => 1]);
	}

	public function store(Request $request) {
        $dados = $request->all();

        $jog = Atletas::create($dados);

        if ($jog) {
            return redirect()->route('jogadores.index')
            ->with('status', 'Jogador ' . $request->nome . ' inserido com sucesso!!');
        }
    }

	public function edit($id) {
		$reg = Atletas::find($id);
        return view('jogadores_form',['reg' => $reg, 'acao' => 3]);
	}

	public function update(Request $request, $id) {
        //posiciona registro a ser alterado
        $reg = Atletas::find($id);

        //obtém os campos do formulário
        $dados = $request ->all();

        //altera registro passando os novos dados
        $alt = $reg -> update($dados);

        if($alt){
            return redirect()->route('jogadores.index')
            ->with('status', 'Jogador ' . $request->nome . ' alterado com sucesso!!');
        }
    }

	public function destroy($id){
		$reg = Atletas::find($id);
        if($reg->delete()){
            return redirect()->route('jogadores.index')
            ->with('status', 'Jogador ' . $reg->nome . ' excluido com sucesso!!');
        }
	}
}
