<?php

namespace Stripe;

/**
 * Class Event
 *
 * @property string $id
 * @property string $object
 * @property string $account
 * @property string|null $api_version
 * @property int $created
 * @property mixed $data
 * @property bool $livemode
 * @property int $pending_webhooks
 * @property mixed|null $request
 * @property string $type
 *
 * @package Stripe
 */
class Event extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Retrieve;
    public const OBJECT_NAME = 'event';

    /**
     * Possible string representations of event types.
     * @link https://stripe.com/docs/api#event_types
     */
    public const ACCOUNT_UPDATED                           = 'account.updated';
    public const ACCOUNT_APPLICATION_AUTHORIZED            = 'account.application.authorized';
    public const ACCOUNT_APPLICATION_DEAUTHORIZED          = 'account.application.deauthorized';
    public const ACCOUNT_EXTERNAL_ACCOUNT_CREATED          = 'account.external_account.created';
    public const ACCOUNT_EXTERNAL_ACCOUNT_DELETED          = 'account.external_account.deleted';
    public const ACCOUNT_EXTERNAL_ACCOUNT_UPDATED          = 'account.external_account.updated';
    public const APPLICATION_FEE_CREATED                   = 'application_fee.created';
    public const APPLICATION_FEE_REFUNDED                  = 'application_fee.refunded';
    public const APPLICATION_FEE_REFUND_UPDATED            = 'application_fee.refund.updated';
    public const BALANCE_AVAILABLE                         = 'balance.available';
    public const CHARGE_CAPTURED                           = 'charge.captured';
    public const CHARGE_EXPIRED                            = 'charge.expired';
    public const CHARGE_FAILED                             = 'charge.failed';
    public const CHARGE_PENDING                            = 'charge.pending';
    public const CHARGE_REFUNDED                           = 'charge.refunded';
    public const CHARGE_SUCCEEDED                          = 'charge.succeeded';
    public const CHARGE_UPDATED                            = 'charge.updated';
    public const CHARGE_DISPUTE_CLOSED                     = 'charge.dispute.closed';
    public const CHARGE_DISPUTE_CREATED                    = 'charge.dispute.created';
    public const CHARGE_DISPUTE_FUNDS_REINSTATED           = 'charge.dispute.funds_reinstated';
    public const CHARGE_DISPUTE_FUNDS_WITHDRAWN            = 'charge.dispute.funds_withdrawn';
    public const CHARGE_DISPUTE_UPDATED                    = 'charge.dispute.updated';
    public const CHARGE_REFUND_UPDATED                     = 'charge.refund.updated';
    public const CHECKOUT_SESSION_COMPLETED                = 'checkout.session.completed';
    public const COUPON_CREATED                            = 'coupon.created';
    public const COUPON_DELETED                            = 'coupon.deleted';
    public const COUPON_UPDATED                            = 'coupon.updated';
    public const CREDIT_NOTE_CREATED                       = 'credit_note.created';
    public const CREDIT_NOTE_UPDATED                       = 'credit_note.updated';
    public const CREDIT_NOTE_VOIDED                        = 'credit_note.voided';
    public const CUSTOMER_CREATED                          = 'customer.created';
    public const CUSTOMER_DELETED                          = 'customer.deleted';
    public const CUSTOMER_UPDATED                          = 'customer.updated';
    public const CUSTOMER_DISCOUNT_CREATED                 = 'customer.discount.created';
    public const CUSTOMER_DISCOUNT_DELETED                 = 'customer.discount.deleted';
    public const CUSTOMER_DISCOUNT_UPDATED                 = 'customer.discount.updated';
    public const CUSTOMER_SOURCE_CREATED                   = 'customer.source.created';
    public const CUSTOMER_SOURCE_DELETED                   = 'customer.source.deleted';
    public const CUSTOMER_SOURCE_EXPIRING                  = 'customer.source.expiring';
    public const CUSTOMER_SOURCE_UPDATED                   = 'customer.source.updated';
    public const CUSTOMER_SUBSCRIPTION_CREATED             = 'customer.subscription.created';
    public const CUSTOMER_SUBSCRIPTION_DELETED             = 'customer.subscription.deleted';
    public const CUSTOMER_SUBSCRIPTION_TRIAL_WILL_END      = 'customer.subscription.trial_will_end';
    public const CUSTOMER_SUBSCRIPTION_UPDATED             = 'customer.subscription.updated';
    public const FILE_CREATED                              = 'file.created';
    public const INVOICE_CREATED                           = 'invoice.created';
    public const INVOICE_DELETED                           = 'invoice.deleted';
    public const INVOICE_FINALIZED                         = 'invoice.finalized';
    public const INVOICE_MARKED_UNCOLLECTIBLE              = 'invoice.marked_uncollectible';
    public const INVOICE_PAYMENT_ACTION_REQUIRED           = 'invoice.payment_action_required';
    public const INVOICE_PAYMENT_FAILED                    = 'invoice.payment_failed';
    public const INVOICE_PAYMENT_SUCCEEDED                 = 'invoice.payment_succeeded';
    public const INVOICE_SENT                              = 'invoice.sent';
    public const INVOICE_UPCOMING                          = 'invoice.upcoming';
    public const INVOICE_UPDATED                           = 'invoice.updated';
    public const INVOICE_VOIDED                            = 'invoice.voided';
    public const INVOICEITEM_CREATED                       = 'invoiceitem.created';
    public const INVOICEITEM_DELETED                       = 'invoiceitem.deleted';
    public const INVOICEITEM_UPDATED                       = 'invoiceitem.updated';
    public const ISSUER_FRAUD_RECORD_CREATED               = 'issuer_fraud_record.created';
    public const ISSUING_AUTHORIZATION_CREATED             = 'issuing_authorization.created';
    public const ISSUING_AUTHORIZATION_REQUEST             = 'issuing_authorization.request';
    public const ISSUING_AUTHORIZATION_UPDATED             = 'issuing_authorization.updated';
    public const ISSUING_CARD_CREATED                      = 'issuing_card.created';
    public const ISSUING_CARD_UPDATED                      = 'issuing_card.updated';
    public const ISSUING_CARDHOLDER_CREATED                = 'issuing_cardholder.created';
    public const ISSUING_CARDHOLDER_UPDATED                = 'issuing_cardholder.updated';
    public const ISSUING_DISPUTE_CREATED                   = 'issuing_dispute.created';
    public const ISSUING_DISPUTE_UPDATED                   = 'issuing_dispute.updated';
    public const ISSUING_TRANSACTION_CREATED               = 'issuing_transaction.created';
    public const ISSUING_TRANSACTION_UPDATED               = 'issuing_transaction.updated';
    public const ORDER_CREATED                             = 'order.created';
    public const ORDER_PAYMENT_FAILED                      = 'order.payment_failed';
    public const ORDER_PAYMENT_SUCCEEDED                   = 'order.payment_succeeded';
    public const ORDER_UPDATED                             = 'order.updated';
    public const ORDER_RETURN_CREATED                      = 'order_return.created';
    public const PAYMENT_INTENT_AMOUNT_CAPTURABLE_UPDATED  = 'payment_intent.amount_capturable_updated';
    public const PAYMENT_INTENT_CANCELED                   = 'payment_intent.canceled';
    public const PAYMENT_INTENT_CREATED                    = 'payment_intent.created';
    public const PAYMENT_INTENT_PAYMENT_FAILED             = 'payment_intent.payment_failed';
    public const PAYMENT_INTENT_SUCCEEDED                  = 'payment_intent.succeeded';
    public const PAYMENT_METHOD_ATTACHED                   = 'payment_method.attached';
    public const PAYMENT_METHOD_CARD_AUTOMATICALLY_UPDATED = 'payment_method.card_automatically_updated';
    public const PAYMENT_METHOD_DETACHED                   = 'payment_method.detached';
    public const PAYMENT_METHOD_UPDATED                    = 'payment_method.updated';
    public const PAYOUT_CANCELED                           = 'payout.canceled';
    public const PAYOUT_CREATED                            = 'payout.created';
    public const PAYOUT_FAILED                             = 'payout.failed';
    public const PAYOUT_PAID                               = 'payout.paid';
    public const PAYOUT_UPDATED                            = 'payout.updated';
    public const PERSON_CREATED                            = 'person.created';
    public const PERSON_DELETED                            = 'person.deleted';
    public const PERSON_UPDATED                            = 'person.updated';
    public const PING                                      = 'ping';
    public const PLAN_CREATED                              = 'plan.created';
    public const PLAN_DELETED                              = 'plan.deleted';
    public const PLAN_UPDATED                              = 'plan.updated';
    public const PRODUCT_CREATED                           = 'product.created';
    public const PRODUCT_DELETED                           = 'product.deleted';
    public const PRODUCT_UPDATED                           = 'product.updated';
    public const RECIPIENT_CREATED                         = 'recipient.created';
    public const RECIPIENT_DELETED                         = 'recipient.deleted';
    public const RECIPIENT_UPDATED                         = 'recipient.updated';
    public const REPORTING_REPORT_RUN_FAILED               = 'reporting.report_run.failed';
    public const REPORTING_REPORT_RUN_SUCCEEDED            = 'reporting.report_run.succeeded';
    public const REPORTING_REPORT_TYPE_UPDATED             = 'reporting.report_type.updated';
    public const REVIEW_CLOSED                             = 'review.closed';
    public const REVIEW_OPENED                             = 'review.opened';
    public const SETUP_INTENT_CANCELED                     = 'setup_intent.canceled';
    public const SETUP_INTENT_CREATED                      = 'setup_intent.created';
    public const SETUP_INTENT_SETUP_FAILED                 = 'setup_intent.setup_failed';
    public const SETUP_INTENT_SUCCEEDED                    = 'setup_intent.succeeded';
    public const SIGMA_SCHEDULED_QUERY_RUN_CREATED         = 'sigma.scheduled_query_run.created';
    public const SKU_CREATED                               = 'sku.created';
    public const SKU_DELETED                               = 'sku.deleted';
    public const SKU_UPDATED                               = 'sku.updated';
    public const SOURCE_CANCELED                           = 'source.canceled';
    public const SOURCE_CHARGEABLE                         = 'source.chargeable';
    public const SOURCE_FAILED                             = 'source.failed';
    public const SOURCE_MANDATE_NOTIFICATION               = 'source.mandate_notification';
    public const SOURCE_REFUND_ATTRIBUTES_REQUIRED         = 'source.refund_attributes_required';
    public const SOURCE_TRANSACTION_CREATED                = 'source.transaction.created';
    public const SOURCE_TRANSACTION_UPDATED                = 'source.transaction.updated';
    public const SUBSCRIPTION_SCHEDULE_ABORTED             = 'subscription_schedule.aborted';
    public const SUBSCRIPTION_SCHEDULE_CANCELED            = 'subscription_schedule.canceled';
    public const SUBSCRIPTION_SCHEDULE_COMPLETED           = 'subscription_schedule.completed';
    public const SUBSCRIPTION_SCHEDULE_CREATED             = 'subscription_schedule.created';
    public const SUBSCRIPTION_SCHEDULE_EXPIRING            = 'subscription_schedule.expiring';
    public const SUBSCRIPTION_SCHEDULE_RELEASED            = 'subscription_schedule.released';
    public const SUBSCRIPTION_SCHEDULE_UPDATED             = 'subscription_schedule.updated';
    public const TAX_RATE_CREATED                          = 'tax_rate.created';
    public const TAX_RATE_UPDATED                          = 'tax_rate.updated';
    public const TOPUP_CANCELED                            = 'topup.canceled';
    public const TOPUP_CREATED                             = 'topup.created';
    public const TOPUP_FAILED                              = 'topup.failed';
    public const TOPUP_REVERSED                            = 'topup.reversed';
    public const TOPUP_SUCCEEDED                           = 'topup.succeeded';
    public const TRANSFER_CREATED                          = 'transfer.created';
    public const TRANSFER_REVERSED                         = 'transfer.reversed';
    public const TRANSFER_UPDATED                          = 'transfer.updated';
}
