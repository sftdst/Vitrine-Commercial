<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presents = Presentation::all();
        return view('admin.presentation',compact('presents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'statut' => 'required',
        ]);

        $present = new Presentation;
        $present->titre = $request->titre;
        $present->description = $request->description;
        $request->statut = $request->statut;
        $present->save();
        return redirect()->route('presentation')->with('success', 'Ajout réussit.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Presentation $presentation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'statut' => 'required',
        ]);

        DB::table('presentations')->whereId($id)->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'statut' => $request->statut,

        ]);
        return redirect()->route('presentation')->with('success', 'Modification réussit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Presentation::find($id)->delete();
        return redirect()->route('presentation')->with('success', 'suppression  réussit.');

    }
}
