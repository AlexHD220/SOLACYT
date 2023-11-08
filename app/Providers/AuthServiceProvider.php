<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Asesor;
use App\Models\User;
use App\Policies\asesorPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Asesor::class => asesorPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        ///Evitar que un usuario edite un asesor que no le pertenece
        Gate::define('admin-asesor', function (User $user, Asesor $asesor) { // Gate para limitar el acceso de un usuario a ciertos metodos o peticiones
            return $user->id === $asesor->user_id;
        });

        /// Limitar permisos de administrador
        Gate::define('only-admin', function (User $user) { // Gate para limitar el acceso de un usuario a ciertos metodos o peticiones
            return $user->tipo == 1;
        });

        Gate::define('only-user', function (User $user) { // Gate para limitar el acceso de un usuario a ciertos metodos o peticiones
            return $user->tipo == 2;
        });
    }
}
