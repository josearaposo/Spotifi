<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Album;
use App\Models\Artista;
use App\Models\Cancion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class AlbumController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Album::class, 'album');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('albums.index', [
            'albums' => Album::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('albums.create', [
            'artistas' => Artista::all(),
            'cancions' => Cancion::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $album = new album();
        $imagen = $request->file('foto');
        Storage::makeDirectory('public/album');
        $nombre = Carbon::now() . '.jpeg';
        $manager = new ImageManager(new Driver());

        $album->guardar_imagen($imagen, $nombre, 420, $manager);
        $album->titulo = $request->input('titulo');
        $album->foto = $nombre;
        $album->save();
        $album->artistas()->attach($request->artistas);
        $album->canciones()->attach($request->cancions);
        return redirect()->route('albums.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        //
    }
}
