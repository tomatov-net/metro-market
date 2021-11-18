<?php declare(strict_types=1);

namespace App\Collections;

use App\DTO\OfferInterface;
use App\Patterns\OfferIterator;

class OfferCollection implements OfferCollectionInterface, OffersCollectionMathInterface
{
    private array $items;

    public function get(int $index): OfferInterface
    {
        return $this->items[$index];
    }

    public function getIterator(): \Iterator
    {
        return new OfferIterator($this);
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function addItem(OfferInterface $offer): self
    {
        $this->items[] = $offer;
        return $this;
    }

    public function countByPriceRange(float $from, float $to): int
    {
        $result = 0;

        foreach ($this->items as $item) {
            $price = $item->getPrice();
            if ($price >= $from && $price <= $to) {
                $result++;
            }
        }

        return $result;
    }

    public function countByVendorId(int $vendorId): int
    {
        $result = 0;

        foreach ($this->items as $item) {
            $itemVendorId = $item->getVendorId();
            if ($itemVendorId === $vendorId) {
                $result++;
            }
        }

        return $result;
    }
}
