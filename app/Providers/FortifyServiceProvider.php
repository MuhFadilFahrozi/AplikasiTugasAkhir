<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // ===============================
        // LOGIN PAKAI NIM
        // ===============================
        Fortify::username('nim');

        // ===============================
        // AUTHENTICATION LOGIC
        // ===============================
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('nim', $request->nim)->first();

            if ($user && Hash::check($request->password, $user->password)) {

                // 🔥 PENTING: MATIKAN intended redirect
                $request->session()->forget('url.intended');

                return $user;
            }

            return null;
        });

        // ===============================
        // ACTIONS
        // ===============================
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // ===============================
        // RATE LIMITER
        // ===============================
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(
                Str::lower($request->nim) . '|' . $request->ip()
            );

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by(
                $request->session()->get('login.id')
            );
        });

        // ===============================
        // AUTH VIEWS
        // ===============================
        Fortify::loginView(function () {
            return view('auth.login');
        });

        Fortify::registerView(function () {
            return view('auth.register');
        });

        // ===============================
        // 🔥 PAKSA SEMUA LOGIN KE /home
        // ===============================
        config(['fortify.home' => '/home']);
    }
}
