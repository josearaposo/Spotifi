<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArtistaRequest;
use App\Http\Requests\UpdateArtistaRequest;
use App\Models\Artista;

class ArtistaController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Artista::class, 'artista');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('artistas.index', [
            'artistas' => Artista::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artistas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArtistaRequest $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255',
        ]);

        $artista = new Artista();
        $artista->nombre = $validated['nombre'];
        $artista->save();
        session()->flash('success', 'El Artista se ha creado correctamente.');
        return redirect()->route('artistas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artista $artista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artista $artista)
    {
        return view('artistas.edit', [
            'artista' => $artista,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArtistaRequest $request, Artista $artista)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255',
        ]);

        $artista->nombre = $validated['nombre'];
        $artista->save();
        session()->flash('success', 'El Artista se ha editado correctamente.');
        return redirect()->route('artistas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artista $artista)
    {
        $artista->delete();
        return redirect()->route('artistas.index');
    }

}
