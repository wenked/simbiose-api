<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjetoRouanet;




class RouanetController extends Controller
{
    //
 
    public function index(Request $request)
    {   
      
        try {
          
            $page = $request->query('page');
            $limit = $request->query('limit');
    
            if(!$page && !$limit) {
                $projetos = ProjetoRouanet::all();
                return response()->json(['data' => $projetos]);
            }
            
            $offset = ($limit * $page) - $limit;
    
            $projetos = ProjetoRouanet::offset($offset)->limit($limit)->get();

            $total = ProjetoRouanet::count();
            return response()->json(['data' => $projetos, 'current_page' => (int)$page, 'limit' => (int)$limit, 'total_pages' => ceil($total / $limit)]);
       
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
       
    }
    

}