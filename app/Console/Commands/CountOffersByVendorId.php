<?php

namespace App\Console\Commands;

use App\Services\Reader\ReaderInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CountOffersByVendorId extends Command
{
    use BaseOfferCommand;

    protected $signature = 'offers:vendor {vendorId}';

    protected $description = 'Count offers by vendor id';

    public function count(ReaderInterface $reader): void
    {
        $collection = $this->getCollection($reader);
        $vendorId = (int) $this->argument('vendorId');
        $result = $collection->countByVendorId($vendorId);
        $infoText = "Offers count: $result";

        $this->info($infoText);
        Log::info($infoText);
    }
}
