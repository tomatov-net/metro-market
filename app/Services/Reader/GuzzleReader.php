<?php declare(strict_types=1);

namespace App\Services\Reader;

use App\Collections\OfferCollectionInterface;
use App\DTO\DTOInterface;
use GuzzleHttp\Client;

class GuzzleReader implements ReaderInterface
{
    private OfferCollectionInterface $collection;
    private DTOInterface $dto;
    private Client $client;

    public function __construct(OfferCollectionInterface $collection, DTOInterface $dto)
    {
        $this->collection = $collection;
        $this->dto = $dto;
        $this->client = new Client();
    }

    public function read(string $input): OfferCollectionInterface
    {
        $responseJson = $this->client
            ->request('GET', $input)
            ->getBody()
            ->getContents();

        $data = json_decode($responseJson, true);

        //to mock http request
        //sleep(random_int(2, 4));
        //$data = json_decode(file_get_contents(database_path('source.json')), true);


        foreach ($data as $item) {
            $this->collection->addItem(($this->dto::make($item)));
        }

        return $this->collection;
    }
}
