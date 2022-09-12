<?php

namespace MBS\LaravelAdapty\Requests;

use Carbon\Carbon;

/**
 * @see https://docs.adapty.io/docs/server-side-api-specs#prolonggrant-a-subscription-for-a-user
 */
class GrantSubscriptionRequest
{

    protected string $expiresAt;

    protected int $durationDays;

    protected bool $isLifetime = false;

    public string $accessLevel = 'premium';

    protected string|null $startsAt;

    protected string|null $vendorProductId;

    protected string|null $vendorTransactionId;

    protected string|null $store;

    protected string|null $introductoryOfferType;

    protected float|null $price;

    protected float|null $proceeds;

    protected string|null $priceLocale;

    public static function make($durationDays, $accessLevel = 'premium', $expiresAt = null, $isLifetime = false): static
    {
        $request = new static();
        $request->durationDays = $durationDays;
        $request->accessLevel = $accessLevel;

        if (!$expiresAt) {
            $expiresAt = Carbon::now()->addDays($durationDays)->toIso8601String();
        }

        $request->expiresAt = $expiresAt;
        $request->isLifetime = $isLifetime;

        return $request;
    }

    /**
     * @param string $expiresAt
     * @return GrantSubscriptionRequest
     */
    public function setExpiresAt(string $expiresAt): GrantSubscriptionRequest
    {
        $this->expiresAt = $expiresAt;
        return $this;
    }

    /**
     * @param int $durationDays
     * @return GrantSubscriptionRequest
     */
    public function setDurationDays(int $durationDays): GrantSubscriptionRequest
    {
        $this->durationDays = $durationDays;
        return $this;
    }

    /**
     * @param bool $isLifetime
     * @return GrantSubscriptionRequest
     */
    public function setIsLifetime(bool $isLifetime): GrantSubscriptionRequest
    {
        $this->isLifetime = $isLifetime;
        return $this;
    }

    /**
     * @param string|null $startsAt
     * @return GrantSubscriptionRequest
     */
    public function setStartsAt(?string $startsAt): GrantSubscriptionRequest
    {
        $this->startsAt = $startsAt;
        return $this;
    }

    /**
     * @param string|null $vendorProductId
     * @return GrantSubscriptionRequest
     */
    public function setVendorProductId(?string $vendorProductId): GrantSubscriptionRequest
    {
        $this->vendorProductId = $vendorProductId;
        return $this;
    }

    /**
     * @param string|null $vendorTransactionId
     * @return GrantSubscriptionRequest
     */
    public function setVendorTransactionId(?string $vendorTransactionId): GrantSubscriptionRequest
    {
        $this->vendorTransactionId = $vendorTransactionId;
        return $this;
    }

    /**
     * @param string|null $store
     * @return GrantSubscriptionRequest
     */
    public function setStore(?string $store): GrantSubscriptionRequest
    {
        $this->store = $store;
        return $this;
    }

    /**
     * @param string|null $introductoryOfferType
     * @return GrantSubscriptionRequest
     */
    public function setIntroductoryOfferType(?string $introductoryOfferType): GrantSubscriptionRequest
    {
        $this->introductoryOfferType = $introductoryOfferType;
        return $this;
    }

    /**
     * @param float|null $price
     * @return GrantSubscriptionRequest
     */
    public function setPrice(?float $price): GrantSubscriptionRequest
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @param float|null $proceeds
     * @return GrantSubscriptionRequest
     */
    public function setProceeds(?float $proceeds): GrantSubscriptionRequest
    {
        $this->proceeds = $proceeds;
        return $this;
    }

    /**
     * @param string|null $priceLocale
     * @return GrantSubscriptionRequest
     */
    public function setPriceLocale(?string $priceLocale): GrantSubscriptionRequest
    {
        $this->priceLocale = $priceLocale;
        return $this;
    }

    public function toRequestData(): array
    {
        return [
            'expires_at' => $this->expiresAt,
            'duration_days' => $this->durationDays,
            'is_lifetime' => $this->isLifetime,
            'starts_at' => $this->startsAt,
            'vendor_product_id' => $this->vendorProductId,
            'vendor_transaction_id' => $this->vendorTransactionId,
            'store' => $this->store,
            'introductory_offer_type' => $this->introductoryOfferType,
            'price' => $this->price,
            'proceeds' => $this->proceeds,
            'price_locale' => $this->priceLocale,
        ];
    }

}
