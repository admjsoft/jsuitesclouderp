<?php

namespace Stripe;

/**
 * Class Refund
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property string|null $balance_transaction
 * @property string|null $charge
 * @property int $created
 * @property string $currency
 * @property string $description
 * @property string $failure_balance_transaction
 * @property string $failure_reason
 * @property \Stripe\StripeObject $metadata
 * @property string|null $payment_intent
 * @property string|null $reason
 * @property string|null $receipt_number
 * @property string|null $source_transfer_reversal
 * @property string|null $status
 * @property string|null $transfer_reversal
 *
 * @package Stripe
 */
class Refund extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
    public const OBJECT_NAME = 'refund';

    /**
     * Possible string representations of the failure reason.
     * @link https://stripe.com/docs/api/refunds/object#refund_object-failure_reason
     */
    public const FAILURE_REASON                     = 'expired_or_canceled_card';
    public const FAILURE_REASON_LOST_OR_STOLEN_CARD = 'lost_or_stolen_card';
    public const FAILURE_REASON_UNKNOWN             = 'unknown';

    /**
     * Possible string representations of the refund reason.
     * @link https://stripe.com/docs/api/refunds/object#refund_object-reason
     */
    public const REASON_DUPLICATE             = 'duplicate';
    public const REASON_FRAUDULENT            = 'fraudulent';
    public const REASON_REQUESTED_BY_CUSTOMER = 'requested_by_customer';

    /**
     * Possible string representations of the refund status.
     * @link https://stripe.com/docs/api/refunds/object#refund_object-status
     */
    public const STATUS_CANCELED  = 'canceled';
    public const STATUS_FAILED    = 'failed';
    public const STATUS_PENDING   = 'pending';
    public const STATUS_SUCCEEDED = 'succeeded';
}
