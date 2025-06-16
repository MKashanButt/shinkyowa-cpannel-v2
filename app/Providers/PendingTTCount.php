<?php

namespace App\Providers;

use App\Models\Payment;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class PendingTTCount extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $ttcount = Payment::where('status', 'not approved')
            ->count();

        View::composer('*', function ($view) use ($ttcount) {
            $view->with('ttcount', $ttcount);
        });
    }
}
