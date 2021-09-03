<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    /**
     * Página inicial
     *
     * @return void
     */
    public function index()
    {
        $jogadores = Player::all();
        return view('index',['jogadores' => $jogadores]);
    }

    /**
     * Rota para formulário de cadastro de jogadores
     *
     * @return void
     */
    public function formPlayer()
    {
        return view('cadastrar');
    }

    /**
     * Cadastra novo jogador
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $cadplayer = new Player();
        $cadplayer->name = $request->nome;
        $cadplayer->skill_level = $request->skill;
        $cadplayer->goalkeeper = $request->goalkeeper;
        $cadplayer->save();

        return redirect()->action([PlayerController::class, 'index']);
    }

    /**
     * Confirma presença de jogador
     *
     * @param [type] $id
     * @return void
     */
    public function confirm($id)
    {
        Player::where('id', $id)->update([
            'confirmed' => 1
        ]);
        return redirect()->action([PlayerController::class, 'index']);
    }

    /**
     * Página de sorteio
     *
     * @return void
     */
    public function sorteio(){
        return view('sorteio');
    }

    public function dosorteio(Request $request)
    {
        $jogadores = Player::where('confirmed', 1)
        ->where('goalkeeper', 0)
        ->orderBy('skill_level', 'desc')->get();
        $jogadores = ($jogadores->toArray());
        $goleiros = Player::where('goalkeeper', 1)
        ->get();
        $goleiros = ($goleiros->toArray());
        $ntimes = 0;
        $numjogadores = count($jogadores);
        $numgoleiros = count($goleiros);
        $times = array();
        while($numjogadores >= $request->nJogadores){
            $time = array();
            for($i = 0; $i < $request->nJogadores; $i++){
                $jogador = array_shift($jogadores);
                array_push($time, $jogador);
                $jogadores = array_reverse($jogadores);
                $numjogadores--;
            }
            if($numgoleiros > 0){
                $retornajogador = array_shift($time);
                array_push($jogadores, $retornajogador);
                $goleiro = array_shift($goleiros);
                array_push($time, $goleiro);
                $numgoleiros--;
                $numjogadores++;
            }
            $ntimes++;
            array_push($times, $time);
        }
        $ultimotime = array();
        foreach($jogadores as $j){
            $qtida = count($ultimotime);
            if($qtida < 5){
                array_push($ultimotime, $j);
            }
        }
        if($numgoleiros > 0){
            $goleiro = array_shift($goleiros);
            array_push($ultimotime, $goleiro);
        }
        $nultimotime = count($ultimotime);
        if($nultimotime == $request->nJogadores){
            $ntimes++;
        }
        return view('times', ['times' => $times, 'ntimes' => $ntimes]);
    }
}
