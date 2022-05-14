<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjetoRouanet;


class RouanetController extends Controller
{
    //
 
    public function index(Request $request)
    {
        $page = $request->query('page');
        $limit = $request->query('limit');
        $offset = ($limit * $page) - $limit;

        $projetos = ProjetoRouanet::offset($offset)->limit($limit)->get();
        return response()->json($projetos);
    }
    

}