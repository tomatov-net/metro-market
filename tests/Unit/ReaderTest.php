<?php

namespace Tests\Unit;

use App\Collections\OfferCollection;
use App\DTO\Offers\OfferDTO;
use App\Services\Reader\GuzzleReader;
use App\Services\Reader\LocalReader;
use Tests\TestCase;

class ReaderTest extends TestCase
{
    public function test_guzzle_reader()
    {
        $reader = new GuzzleReader(new OfferCollection(), new OfferDTO());

        $collection = $reader->read('http://api-nginx2');

        $this->assertTrue(count($collection->getItems()) > 0);
    }

    public function test_local_reader()
    {
        $reader = new LocalReader(new OfferCollection(), new OfferDTO());
        $url = database_path('source.json');
        $collection = $reader->read($url);

        $this->assertTrue(count($collection->getItems()) > 0);
    }
}
