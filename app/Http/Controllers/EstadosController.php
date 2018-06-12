<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Estado;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
    public function estados(Request $request){
        if(!empty($request->get('estado'))){
            return Estado
                ::where('estado','LIKE',"%{$request->get('estado')}%")
                ->orWhere('sigla','LIKE',"%{$request->get('estado')}%")
                ->get();
        }
        return [];
    }

    public function cidades(Request $request){
        if(!empty($request->get('estado')) && !empty($request->get('cidade'))){
            return Cidade
                ::where('cidade','LIKE',"%{$request->get('cidade')}%")
                ->where('estado_id','LIKE',"%{$request->get('estado')}%")
                ->get();
        }
        return [];
    }
}
