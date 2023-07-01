<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Auth::viaRequest('account-credentials', function (Request $request){
            $email = $request->input('email');
            $password = $request->input('password');


            $models = [
                'admins' => Admin::class,
                'sellers' => Seller::class,
                'buyers' => Buyer::class
            ];

            foreach($models as $model => $class){
                $account = $class::where('email', $email)
                            ->where('password', $password)
                            ->first();
                
                if($account){
                    return $account;
                }
            }

            return null;
        });
    }
}
