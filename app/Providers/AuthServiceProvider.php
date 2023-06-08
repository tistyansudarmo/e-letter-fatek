<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Surat;
use App\Policies\SuratPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Surat::class => SuratPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('register', function(User $user){
            return $user->level->jabatan == 'Admin';
        });

        Gate::define('prodi_ti', function(User $user){
            return $user->prodi_id == 1 || $user->level->jabatan == 'Admin';
        });

        Gate::define('prodi_ptik', function(User $user){
            return $user->prodi_id == 2 || $user->level->jabatan == 'Admin';
        });

        Gate::define('prodi_sipil', function(User $user){
            return $user->prodi_id == 3 || $user->level->jabatan == 'Admin';
        });
    }
}
