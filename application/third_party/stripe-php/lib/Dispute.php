<?php

namespace Stripe;

/**
 * Class Dispute
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property BalanceTransaction[] $balance_transactions
 * @property string $charge
 * @property int $created
 * @property string $currency
 * @property mixed $evidence
 * @property mixed $evidence_details
 * @property bool $is_charge_refundable
 * @property bool $livemode
 * @property \Stripe\StripeObject $metadata
 * @property string|null $network_reason_code
 * @property string|null $payment_intent
 * @property string $reason
 * @property string $status
 *
 * @package Stripe
 */
class Dispute extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
    public const OBJECT_NAME = 'dispute';

    /**
     * Possible string representations of dispute reasons.
     * @link https://stripe.com/docs/api#dispute_object
     */
    public const REASON_BANK_CANNOT_PROCESS       = 'bank_cannot_process';
    public const REASON_CHECK_RETURNED            = 'check_returned';
    public const REASON_CREDIT_NOT_PROCESSED      = 'credit_not_processed';
    public const REASON_CUSTOMER_INITIATED        = 'customer_initiated';
    public const REASON_DEBIT_NOT_AUTHORIZED      = 'debit_not_authorized';
    public const REASON_DUPLICATE                 = 'duplicate';
    public const REASON_FRAUDULENT                = 'fraudulent';
    public const REASON_GENERAL                   = 'general';
    public const REASON_INCORRECT_ACCOUNT_DETAILS = 'incorrect_account_details';
    public const REASON_INSUFFICIENT_FUNDS        = 'insufficient_funds';
    public const REASON_PRODUCT_NOT_RECEIVED      = 'product_not_received';
    public const REASON_PRODUCT_UNACCEPTABLE      = 'product_unacceptable';
    public const REASON_SUBSCRIPTION_CANCELED     = 'subscription_canceled';
    public const REASON_UNRECOGNIZED              = 'unrecognized';

    /**
     * Possible string representations of dispute statuses.
     * @link https://stripe.com/docs/api#dispute_object
     */
    public const STATUS_CHARGE_REFUNDED        = 'charge_refunded';
    public const STATUS_LOST                   = 'lost';
    public const STATUS_NEEDS_RESPONSE         = 'needs_response';
    public const STATUS_UNDER_REVIEW           = 'under_review';
    public const STATUS_WARNING_CLOSED         = 'warning_closed';
    public const STATUS_WARNING_NEEDS_RESPONSE = 'warning_needs_response';
    public const STATUS_WARNING_UNDER_REVIEW   = 'warning_under_review';
    public const STATUS_WON                    = 'won';

    /**
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return Dispute The closed dispute.
     */
    // TODO: add $params to standardize signature
    public function close($opts = null)
    {
        $url = $this->instanceUrl() . '/close';
        list($response, $opts) = $this->_request('post', $url, null, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
