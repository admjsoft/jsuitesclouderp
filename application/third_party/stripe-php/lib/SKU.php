<?php

namespace Stripe;

/**
 * Class SKU
 *
 * @property string $id
 * @property string $object
 * @property bool $active
 * @property mixed $attributes
 * @property int $created
 * @property string $currency
 * @property string|null $image
 * @property mixed $inventory
 * @property bool $livemode
 * @property \Stripe\StripeObject $metadata
 * @property mixed|null $package_dimensions
 * @property int $price
 * @property string $product
 * @property int $updated
 *
 * @package Stripe
 */
class SKU extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
    public const OBJECT_NAME = 'sku';
}
