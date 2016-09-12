<?php

namespace scp\Http\Controllers;

use Illuminate\Http\Request;

use scp\Http\Requests;

class ProdutoController extends Controller
{
    public function produtos(){
        $lista = ['id' => 1, 'produto' => 'Produto'];

        return response()->json(compact('lista'));
    }
}
