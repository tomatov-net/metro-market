<?php


namespace App\DTO;

interface OfferInterface
{
    public function getOfferId(): int;
    public function setOfferId(int $offerId): self;

    public function getProductTitle(): string;
    public function setProductTitle(string $productTitle): self;

    public function getVendorId(): int;
    public function setVendorId(int $vendorId): self;

    public function getPrice(): float;
    public function setPrice(float $price): self;
}
