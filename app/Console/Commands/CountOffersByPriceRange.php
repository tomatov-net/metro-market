<?php

namespace App\Console\Commands;

use App\Collections\OfferCollection;
use App\DTO\Offers\OfferDTO;
use App\Services\Reader\GuzzleReader;
use App\Services\Reader\ReaderInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CountOffersByPriceRange extends Command
{
    use BaseOfferCommand;

    protected $signature = 'offers:range:price {from} {to}';

    protected $description = 'Count offers by price range';

    public function count(ReaderInterface $reader): void
    {
        $collection = $this->getCollection($reader);
        $from = (float) $this->argument('from');
        $to = (float) $this->argument('to');
        $result = $collection->countByPriceRange($from, $to);
        $infoText = "Offers count: $result";

        $this->info($infoText);
        Log::info($infoText);
    }
}
