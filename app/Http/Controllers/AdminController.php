<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function form_register(Request $request)
    {
        if($request->session()->get('Admin')){
            return redirect('/espace-membre')->with('status', 'vous devez vous deconnecter avant de vous re-inscrire.');
        }
        return view('register');
    }
    public function form_login(Request $request)
    {
        if($request->session()->get('Admin')){
            return redirect('/espace-membre')->with('status', 'vous devez vous deconnecter avant de vous re-connecter.');
        }
        return view('login');
    }
    public function traitement_register(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'password' => 'required|min:8',
            'email' => 'email|required|unique:clients',
        ]);

        $admin = new Admin();
        $admin->nom = $request->input('nom');
        $admin->prenom = $request->input('prenom');
        $admin->password = bcrypt($request->input('password'));
        $admin->email = $request->input('email');
        $admin->save();

        return redirect('/register')->with('status', 'votre compte a bien ete cree.');

    }

    public function traitement_login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required|min:8',
            
        ]);
    $admin = Admin::where('email', $request->input('email'))->first();
    if($admin){
        if(Hash::check($request->input('password'), $admin->password)){

            $request->session()->put('admin', $admin);
            return redirect('/espace-membre');

        }else{
            return back()->with('status', "identifiant ou mot de passe incorrect.");
        }

    }else{
        return back()->with('status', "desole vous n'avez pas de compte a cet email.");
    }

    }
    public function form_logout(Request $request)
    {
        $request->session()->forget('admin');
        return redirect('/login')->with('status', 'vous venez de vous deconnecter.');
    }
}
