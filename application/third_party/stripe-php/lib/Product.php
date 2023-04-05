<?php

namespace Stripe;

/**
 * Class Product
 *
 * @property string $id
 * @property string $object
 * @property bool|null $active
 * @property string[]|null $attributes
 * @property string|null $caption
 * @property int $created
 * @property string[] $deactivate_on
 * @property string|null $description
 * @property string[] $images
 * @property bool $livemode
 * @property \Stripe\StripeObject $metadata
 * @property string $name
 * @property mixed|null $package_dimensions
 * @property bool|null $shippable
 * @property string|null $statement_descriptor
 * @property string $type
 * @property string|null $unit_label
 * @property int $updated
 * @property string|null $url
 *
 * @package Stripe
 */
class Product extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
    public const OBJECT_NAME = 'product';

    /**
     * Possible string representations of the type of product.
     * @link https://stripe.com/docs/api/service_products/object#service_product_object-type
     */
    public const TYPE_GOOD    = 'good';
    public const TYPE_SERVICE = 'service';
}
