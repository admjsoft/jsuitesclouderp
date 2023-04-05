<?php

namespace Stripe\Issuing;

/**
 * Class Transaction
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property string|null $authorization
 * @property string|null $balance_transaction
 * @property string $card
 * @property string|null $cardholder
 * @property int $created
 * @property string $currency
 * @property string|null $dispute
 * @property bool $livemode
 * @property int $merchant_amount
 * @property string $merchant_currency
 * @property mixed $merchant_data
 * @property \Stripe\StripeObject $metadata
 * @property string $type
 *
 * @package Stripe\Issuing
 */
class Transaction extends \Stripe\ApiResource
{
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
    public const OBJECT_NAME = 'issuing.transaction';
}
