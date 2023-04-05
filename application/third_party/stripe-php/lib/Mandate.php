<?php

namespace Stripe;

/**
 * Class Mandate
 *
 * @property string $id
 * @property string $object
 * @property mixed $customer_acceptance
 * @property bool $livemode
 * @property mixed|null $multi_use
 * @property string $payment_method
 * @property mixed $payment_method_details
 * @property mixed|null $single_use
 * @property string $status
 * @property string $type
 *
 * @package Stripe
 */
class Mandate extends ApiResource
{
    use ApiOperations\Retrieve;
    public const OBJECT_NAME = 'mandate';
}
