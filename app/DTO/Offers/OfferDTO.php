<?php declare(strict_types=1);

namespace App\DTO\Offers;

use App\DTO\BaseDTO;
use App\DTO\DTOInterface;
use App\DTO\OfferInterface;

class OfferDTO extends BaseDTO implements OfferInterface
{
    private int $offerId;
    private string $productTitle;
    private int $vendorId;
    private float $price;

    public function getOfferId(): int
    {
        return $this->offerId;
    }

    public function setOfferId(int $offerId): self
    {
        $this->offerId = $offerId;
        return $this;
    }

    public function getProductTitle(): string
    {
        return $this->productTitle;
    }

    public function setProductTitle(string $productTitle): self
    {
        $this->productTitle = $productTitle;
        return $this;
    }

    public function getVendorId(): int
    {
        return $this->vendorId;
    }

    public function setVendorId(int $vendorId): self
    {
        $this->vendorId = $vendorId;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }
}
