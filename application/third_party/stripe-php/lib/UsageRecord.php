<?php

namespace Stripe;

/**
 * Class UsageRecord
 *
 * @package Stripe
 *
 * @property string $id
 * @property string $object
 * @property bool $livemode
 * @property int $quantity
 * @property string $subscription_item
 * @property int $timestamp
 */
class UsageRecord extends ApiResource
{
    public const OBJECT_NAME = 'usage_record';
}
