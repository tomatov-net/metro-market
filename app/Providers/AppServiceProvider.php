<?php

namespace App\Providers;

use App\Collections\OfferCollection;
use App\Collections\OfferCollectionInterface;
use App\DTO\DTOInterface;
use App\DTO\Offers\OfferDTO;
use App\Services\Reader\GuzzleReader;
use App\Services\Reader\LocalReader;
use App\Services\Reader\ReaderInterface;
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
        $this->app->bind(DTOInterface::class, OfferDTO::class);
        $this->app->bind(OfferCollectionInterface::class, OfferCollection::class);

        /*can be replaced with (below)*/
        $this->app->bind(ReaderInterface::class, LocalReader::class);

        //$this->app->bind(ReaderInterface::class, GuzzleReader::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        $this->app->bind(ReaderInterface::class, GuzzleReader::class);
    }
}
