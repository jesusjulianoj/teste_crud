<?php

namespace App\Http\Controllers;

use App\Models\cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function lista($estado){

        $countCidade = cidade::where('id_estado', '=', $estado)->count();

        $lsCidade = cidade::where('id_estado', '=', $estado)->paginate();
        return view('listaCidade', ['lista_cidades' => $lsCidade, 'qtdCidade' => $countCidade]);
    }
}
