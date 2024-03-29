<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Album;
use App\Models\Artista;
use App\Policies\AlbumPolicy;
use App\Policies\ArtistaPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Artista::class => ArtistaPolicy::class,
        Album::class => AlbumPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
