<?php

namespace Stripe;

/**
 * Class TaxId
 *
 * @package Stripe
 *
 * @property string $id
 * @property string $object
 * @property string $country
 * @property int $created
 * @property string $customer
 * @property bool $livemode
 * @property string $type
 * @property string $value
 * @property mixed $verification
 */
class TaxId extends ApiResource
{
    use ApiOperations\Delete;
    public const OBJECT_NAME = 'tax_id';

    /**
     * Possible string representations of a tax id's type.
     * @link https://stripe.com/docs/api/customer_tax_ids/object#tax_id_object-type
     */
    public const TYPE_AU_ABN  = 'au_abn';
    public const TYPE_CH_VAT  = 'ch_vat';
    public const TYPE_EU_VAT  = 'eu_vat';
    public const TYPE_IN_GST  = 'in_gst';
    public const TYPE_MX_RFC  = 'mx_rfc';
    public const TYPE_NO_VAT  = 'no_vat';
    public const TYPE_NZ_GST  = 'nz_gst';
    public const TYPE_SG_UEN  = 'sg_uen';
    public const TYPE_UNKNOWN = 'unknown';
    public const TYPE_ZA_VAT  = 'za_vat';

    /**
     * Possible string representations of the verification status.
     * @link https://stripe.com/docs/api/customer_tax_ids/object#tax_id_object-verification
     */
    public const VERIFICATION_STATUS_PENDING     = 'pending';
    public const VERIFICATION_STATUS_UNAVAILABLE = 'unavailable';
    public const VERIFICATION_STATUS_UNVERIFIED  = 'unverified';
    public const VERIFICATION_STATUS_VERIFIED    = 'verified';

    /**
     * @return string The API URL for this tax id.
     */
    public function instanceUrl()
    {
        $id = $this['id'];
        $customer = $this['customer'];
        if (!$id) {
            throw new Exception\UnexpectedValueException(
                "Could not determine which URL to request: class instance has invalid ID: $id"
            );
        }
        $id = Util\Util::utf8($id);
        $customer = Util\Util::utf8($customer);

        $base = Customer::classUrl();
        $customerExtn = urlencode($customer);
        $extn = urlencode($id);
        return "$base/$customerExtn/tax_ids/$extn";
    }

    /**
     * @param array|string $_id
     * @param array|string|null $_opts
     *
     * @throws \Stripe\Exception\BadMethodCallException
     */
    public static function retrieve($_id, $_opts = null)
    {
        $msg = "Tax IDs cannot be retrieved without a customer ID. Retrieve " .
               "a tax ID using `Customer::retrieveTaxId('customer_id', " .
               "'tax_id_id')`.";
        throw new Exception\BadMethodCallException($msg);
    }
}
