<?php

namespace App\Http\Controllers;
use App\Models\Gallery;
use App\Models\Partenaire;
use App\Models\Presentation;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
   
    public function index(){
        $produit = Produit::count();
        $partenaire = Partenaire::count();
        $image = Gallery::count();
        return view('admin.dashboard',compact('produit','partenaire','image'));

    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user != null && Hash::check($request->password, $user->password)) {
            $produit = Produit::count();
            $partenaire = Partenaire::count();
            $image = Gallery::count();
            $nom = $user->nom;
            return view('admin.dashboard',compact('produit','partenaire','partenaire','image','nom'));

        }
        return back()->with( ["message" => "Email ou mot de password incorrect."]);
    }
}
