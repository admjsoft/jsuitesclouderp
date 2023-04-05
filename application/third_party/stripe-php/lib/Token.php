<?php

namespace Stripe;

/**
 * Class Token
 *
 * @property string $id
 * @property string $object
 * @property \Stripe\BankAccount $bank_account
 * @property \Stripe\Card $card
 * @property string|null $client_ip
 * @property int $created
 * @property bool $livemode
 * @property string $type
 * @property bool $used
 *
 * @package Stripe
 */
class Token extends ApiResource
{
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    public const OBJECT_NAME = 'token';

    /**
     * Possible string representations of the token type.
     * @link https://stripe.com/docs/api/tokens/object#token_object-type
     */
    public const TYPE_ACCOUNT      = 'account';
    public const TYPE_BANK_ACCOUNT = 'bank_account';
    public const TYPE_CARD         = 'card';
    public const TYPE_PII          = 'pii';
}
