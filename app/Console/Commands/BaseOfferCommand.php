<?php

namespace App\Console\Commands;

use App\Collections\OffersCollectionMathInterface;
use App\Services\Reader\ReaderInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

trait BaseOfferCommand
{
    private Carbon $startedAt;

    public function getCollection(ReaderInterface $reader): OffersCollectionMathInterface
    {
        $url = config('services.reader.offers.url');
        return $reader->read($url);
    }

    public function logTimeStart(Carbon $time): void
    {
        $this->startedAt = $time;
        Log::info('Started at: ' . $time->format('d-m-Y H:i:s:u'));
    }

    public function logTimeEnd(Carbon $time): void
    {
        Log::info('Finished at: ' . $time->format('d-m-Y H:i:s:u'));
        Log::info('Total time: ' . $time->diffForHumans($this->startedAt, ['short' => true]));
    }

    public function handle(ReaderInterface $reader): void
    {
        $this->logTimeStart(now());

        $this->count($reader);

        $this->logTimeEnd(now());
    }
}
