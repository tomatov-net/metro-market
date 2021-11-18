<?php

namespace Tests\Unit;

use App\Collections\OfferCollection;
use App\DTO\Offers\OfferDTO;
use Tests\TestCase;

class CollectionMathTest extends TestCase
{
    private array $items = [
        [
            "offerId" => 122,
            "productTitle" => 'Toster',
            "vendorId" => 31,
            "price" => 1.1
        ],
        [
            "offerId" => 123,
            "productTitle" => 'Coffee machine',
            "vendorId" => 35,
            "price" => 10.1
        ],
        [
            "offerId" => 124,
            "productTitle" => 'Some other staff',
            "vendorId" => 35,
            "price" => 20.1
        ],
        [
            "offerId" => 125,
            "productTitle" => 'Some other staff 2',
            "vendorId" => 36,
            "price" => 30.1
        ],
    ];

    public function test_range_count()
    {
        $collection = new OfferCollection();

        foreach ($this->items as $item) {
            $collection->addItem(OfferDTO::make($item));
        }

        $from = 1;
        $to = 11;

        $this->assertSame($collection->countByPriceRange($from, $to), 2);
    }

    public function test_vendor_count()
    {
        $collection = new OfferCollection();

        foreach ($this->items as $item) {
            $collection->addItem(OfferDTO::make($item));
        }

        $this->assertSame($collection->countByVendorId(31), 1);
        $this->assertSame($collection->countByVendorId(35), 2);
    }
}
