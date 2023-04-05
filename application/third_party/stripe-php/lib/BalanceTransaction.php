<?php

namespace Stripe;

/**
 * Class BalanceTransaction
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property int $available_on
 * @property int $created
 * @property string $currency
 * @property string|null $description
 * @property float|null $exchange_rate
 * @property int $fee
 * @property mixed $fee_details
 * @property int $net
 * @property string $reporting_category
 * @property string|null $source
 * @property string $status
 * @property string $type
 *
 * @package Stripe
 */
class BalanceTransaction extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Retrieve;
    public const OBJECT_NAME = 'balance_transaction';

    /**
     * Possible string representations of the type of balance transaction.
     * @link https://stripe.com/docs/api/balance/balance_transaction#balance_transaction_object-type
     */
    public const TYPE_ADJUSTMENT                    = 'adjustment';
    public const TYPE_ADVANCE                       = 'advance';
    public const TYPE_ADVANCE_FUNDING               = 'advance_funding';
    public const TYPE_APPLICATION_FEE               = 'application_fee';
    public const TYPE_APPLICATION_FEE_REFUND        = 'application_fee_refund';
    public const TYPE_CHARGE                        = 'charge';
    public const TYPE_CONNECT_COLLECTION_TRANSFER   = 'connect_collection_transfer';
    public const TYPE_ISSUING_AUTHORIZATION_HOLD    = 'issuing_authorization_hold';
    public const TYPE_ISSUING_AUTHORIZATION_RELEASE = 'issuing_authorization_release';
    public const TYPE_ISSUING_TRANSACTION           = 'issuing_transaction';
    public const TYPE_PAYMENT                       = 'payment';
    public const TYPE_PAYMENT_FAILURE_REFUND        = 'payment_failure_refund';
    public const TYPE_PAYMENT_REFUND                = 'payment_refund';
    public const TYPE_PAYOUT                        = 'payout';
    public const TYPE_PAYOUT_CANCEL                 = 'payout_cancel';
    public const TYPE_PAYOUT_FAILURE                = 'payout_failure';
    public const TYPE_REFUND                        = 'refund';
    public const TYPE_REFUND_FAILURE                = 'refund_failure';
    public const TYPE_RESERVE_TRANSACTION           = 'reserve_transaction';
    public const TYPE_RESERVED_FUNDS                = 'reserved_funds';
    public const TYPE_STRIPE_FEE                    = 'stripe_fee';
    public const TYPE_STRIPE_FX_FEE                 = 'stripe_fx_fee';
    public const TYPE_TAX_FEE                       = 'tax_fee';
    public const TYPE_TOPUP                         = 'topup';
    public const TYPE_TOPUP_REVERSAL                = 'topup_reversal';
    public const TYPE_TRANSFER                      = 'transfer';
    public const TYPE_TRANSFER_CANCEL               = 'transfer_cancel';
    public const TYPE_TRANSFER_FAILURE              = 'transfer_failure';
    public const TYPE_TRANSFER_REFUND               = 'transfer_refund';
}
