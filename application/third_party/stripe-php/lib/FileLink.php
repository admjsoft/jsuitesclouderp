<?php

namespace Stripe;

/**
 * Class FileLink
 *
 * @property string $id
 * @property string $object
 * @property int $created
 * @property bool $expired
 * @property int|null $expires_at
 * @property string $file
 * @property bool $livemode
 * @property \Stripe\StripeObject $metadata
 * @property string|null $url
 *
 * @package Stripe
 */
class FileLink extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
    public const OBJECT_NAME = 'file_link';
}
