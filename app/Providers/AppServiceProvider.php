<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\Lloguer;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // es admin?
        Gate::define('is-admin', function (User $user) {
            return $user->isAdmin();
        });

        // es el propietari del lloguer?
        Gate::define('is-owner', function (User $user, Lloguer $lloguer) {
            return $user->id === $lloguer->user_id;
        });

        // si pot gestionar el lloguer (admin o propietari)?
        Gate::define('manage-lloguer', function (User $user, Lloguer $lloguer) {
            return $user->isAdmin() || $user->id === $lloguer->user_id;
        });
    }
}
