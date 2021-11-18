<?php


namespace App\Collections;

use App\DTO\OfferInterface;

interface OfferCollectionInterface
{
    public function get(int $index): OfferInterface;
    public function getIterator(): \Iterator;

    public function getItems(): array;
    public function addItem(OfferInterface $offer): self;
}
