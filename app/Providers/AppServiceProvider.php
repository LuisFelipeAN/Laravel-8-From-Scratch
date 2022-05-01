<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use MailchimpMarketing\ApiClient;
use App\Services\MailchimpNewsletter;
use App\Services\INewsletter;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(INewsletter::class,function(){
                $client= (new ApiClient())->setConfig([
                    'apiKey' => config('services.mailchimp.key'),
                    'server' => 'us18'
                ]);

                return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useTailwind();
        Model::unguard();
        Gate::define('admin',function(User $user){
            return $user->username=='luisfelipe';
        });

        Blade::if('admin',function(){
           return request()->user()?->can('admin');
        });
    }
}
