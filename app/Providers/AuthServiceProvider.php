<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Fotogaleria;
use App\Models\Jedla;
use App\Models\Reviews;
use App\Policies\FotkyPolicy;
use App\Policies\JedloPolicy;
use App\Policies\ReviewPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Reviews::class => ReviewPolicy::class,
        Jedla::class => JedloPolicy::class,
        Fotogaleria::class => FotkyPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
