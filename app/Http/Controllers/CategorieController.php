<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorie;

class CategorieController extends Controller
{
    public function formcategorie()
    {
        return view('nos-categorie');
    }
    public function formcreatecat(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
            'description' => 'required', 
        ]);

        $categorie = new Categorie();
        $categorie->libelle = $request->libelle;
        $categorie->description = $request->description;
        
        $categorie->save();

        return redirect()->route('formcategorie')->with('success', 'Votre categorie a bien ete cree');
    }
    public function listecategories()
    {
        $categories = Categorie::orderBy('libelle', 'desc')->paginate(5);
        return view('listecategorie')->with('categories', $categories);
    }

}
