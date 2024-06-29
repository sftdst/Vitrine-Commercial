<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::all();
        return view('admin.produit',compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nom' => 'required',
        //     'description'=> 'required',
        //     'categorie'=> 'required',
        //     'prix'=> 'required',
        //     'statut'=> 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
        // return 1;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

        }

        $produit = new Produit;
        $produit->nom = $request->nom;
        $produit->description = $request->description;
        $produit->categorie = $request->categorie;
        $produit->prix = $request->prix;
        $produit->statut = $request->statut;
        $produit->image = 'images/'.$imageName;
        $produit->save();
        return redirect()->route('produit')->with('success','Ajout réussit');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        // $request->validate([
        //     'nom' => 'required',
        //     'description'=> 'required',
        //     'categorie'=> 'required',
        //     'prix'=> 'required',
        //     'statut'=> 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }
        DB::table('produits')->whereId($id)->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'categorie' => $request->categorie,
            'prix' => $request->prix,
            'statut' => $request->statut,
            // 'image' => 'images/'.$imageName,
        ]);
        return redirect()->route('produit')->with('success','Modification   réussit');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Produit::find($id)->delete();
        return redirect()->route('produit')->with('success','Suppression   réussit');
    }
}
