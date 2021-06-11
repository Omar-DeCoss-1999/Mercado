<?php

namespace App\Providers;

use App\Models\Pregunta;
use App\Models\Producto;
use App\Models\ProductosConsignados;
use App\Policies\PreguntaPolicy;
use App\Policies\ProductoPolicy;
use App\Policies\ProductosPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Producto::class => ProductoPolicy::class,
        Pregunta::class => PreguntaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*         Gate::define('comprar', function ($user, Producto $producto){
            return $user->rol == "Cliente" && $producto->id_usuarios != $user->id;
        }); */
    }
}
