<?php declare(strict_types=1);

namespace App\Services\Reader;

use App\Collections\OfferCollectionInterface;

interface ReaderInterface
{
    /**
     * Read in incoming data and parse to objects
     */
    public function read(string $input): OfferCollectionInterface;
}
