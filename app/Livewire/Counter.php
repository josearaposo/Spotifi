<?php

namespace App\Livewire;

use App\Models\Artista;
use Livewire\Component;

class Counter extends Component
{
    public $campo = '';
    public $busqueda = '';

    public function insertar()
    {
        Artista::create(['nombre' => $this->campo]);
    }
    public function editar()
    {
        Artista::updated(['nombre' => $this->campo]);
    }

    public function render()
    {
        return view('livewire.counter', [
            'artistas' => Artista::where('nombre', 'like', "%{$this->busqueda}%")->get(),
        ]);
    }
}
