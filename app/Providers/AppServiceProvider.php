<?php

namespace App\Providers;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Repositories\Contracts\AddressRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ClientRepository;
use App\Repositories\AddressRepository;
use App\Models\Category;
use App\Models\Product;
use App\Models\Client;
use App\Models\Address;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class, function() {
            return new CategoryRepository(new Category());
        });

        $this->app->bind(ProductRepositoryInterface::class, function() {
            return new ProductRepository(new Product());
        });

        $this->app->bind(ClientRepositoryInterface::class, function() {
            return new ClientRepository(new Client());
        });

        $this->app->bind(AddressRepositoryInterface::class, function() {
            return new AddressRepository(new Address());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
