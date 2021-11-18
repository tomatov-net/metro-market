<?php declare(strict_types=1);

namespace App\Patterns;

use App\Collections\OfferCollectionInterface;
use App\DTO\OfferInterface;

class OfferIterator implements \Iterator
{
    private OfferCollectionInterface $collection;
    private int $position = 0;

    public function __construct(OfferCollectionInterface $collection)
    {
        $this->collection = $collection;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function current(): OfferInterface
    {
        return $this->collection->get($this->position);
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function valid(): bool
    {
        return isset($this->collection->getItems()[$this->position]);
    }

}
