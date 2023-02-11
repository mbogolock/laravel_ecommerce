<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produit;
use App\Models\Categorie;

class ProduitController extends Controller
{
    public function formproduit()
    {
        return view('nos-produits');
    }
    public function formcreateprod(Request $request)
    {
        $request->validate([
            'name_produit' => 'required',
            'cat_id' => 'required',
            'description_produit' => 'required',  
            'prix_produit' => 'required',
            'image_produit' => 'required', 
        ]);

        $produit = new Produit();
        $produit->name_produit = $request->name_produit;
        $produit->description_produit = $request->description_produit;
        $produit->prix_produit = $request->prix_produit;
        $produit->cat_id = $request->cat_id;
        $produit->image_produit = $request->image_produit;
        
        $produit->save();

        return redirect()->route('formproduit')->with('success', 'Votre produit a bien ete cree');
    }

    public function show($id)
    {
        $produit = Produit::find($id);
        $produits = Produit::all() ;
        return view('produit',['produits'=>$produits,'produit'=>$produit,'layout'=>'show']);
    }

    public function edit($id)
    {
        $produit = Produit::find($id);
        $produits = Produit::all() ;
        return view('produit',['produits'=>$produits,'produit'=>$produit,'layout'=>'edit']);
    }

    public function update(Request $request, $id)
    {
        $produit = Produit::find($id);
        $produit->name_produit = $request->name_produit;
        $produit->description_produit = $request->description_produit;
        $produit->prix_produit = $request->prix_produit;
        $produit->image_produit = $request->image_produit;
        $produit->save();
        return redirect()->route('formproduit')->with('success', 'Votre produit a bien ete mis a jour');

    }
    public function destroy($id)
    {
        $produit = Produit::find($id);
        $produit->delete() ;
        return redirect()->route('formproduit')->with('success', 'Votre produit a bien ete supprime');
        
    }

    public function listeproduits()
    {
        $produits = Produit::orderBy('name_produit', 'desc')->paginate(5);
        return view('listeproduit')->with('produits', $produits);
    }

}
