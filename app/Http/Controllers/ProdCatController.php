<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdCatController extends Controller
{
    function showData(){
        return DB::table('produit')
        ->join('categorie','categorie.id',"=",'produit.cat_id')
        ->get();
        
    }
}
