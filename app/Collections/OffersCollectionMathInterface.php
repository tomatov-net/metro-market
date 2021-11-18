<?php


namespace App\Collections;


interface OffersCollectionMathInterface
{
    public function countByPriceRange(float $from, float $to): int;
    public function countByVendorId(int $vendorId): int;
}
