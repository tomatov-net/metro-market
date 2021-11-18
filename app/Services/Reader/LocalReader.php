<?php declare(strict_types=1);

namespace App\Services\Reader;

use App\Collections\OfferCollectionInterface;
use App\DTO\DTOInterface;

class LocalReader implements ReaderInterface
{
    private OfferCollectionInterface $collection;
    private DTOInterface $dto;

    public function __construct(OfferCollectionInterface $collection, DTOInterface $dto)
    {
        $this->collection = $collection;
        $this->dto = $dto;
    }

    public function read(string $input): OfferCollectionInterface
    {
        abort_if(!file_exists($input), 500, 'File does not exist');

        $data = json_decode(file_get_contents($input), true);

        foreach ($data as $item) {
            $this->collection->addItem(($this->dto::make($item)));
        }

        return $this->collection;
    }
}
