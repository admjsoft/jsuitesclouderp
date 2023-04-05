<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\DeployedDevices\Fleet;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string sid
 * @property string url
 * @property string friendlyName
 * @property string fleetSid
 * @property string accountSid
 * @property string deviceSid
 * @property string thumbprint
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 */
class CertificateInstance extends InstanceResource
{
    /**
     * Initialize the CertificateInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $fleetSid The unique identifier of the Fleet.
     * @param string $sid A string that uniquely identifies the Certificate.
     * @return \Twilio\Rest\Preview\DeployedDevices\Fleet\CertificateInstance
     */
    public function __construct(Version $version, array $payload, $fleetSid, $sid = null)
    {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'url' => Values::array_get($payload, 'url'),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'fleetSid' => Values::array_get($payload, 'fleet_sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'deviceSid' => Values::array_get($payload, 'device_sid'),
            'thumbprint' => Values::array_get($payload, 'thumbprint'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
        );

        $this->solution = array('fleetSid' => $fleetSid, 'sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Preview\DeployedDevices\Fleet\CertificateContext Context for this CertificateInstance
     */
    protected function proxy()
    {
        if (!$this->context) {
            $this->context = new CertificateContext(
                $this->version,
                $this->solution['fleetSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a CertificateInstance
     *
     * @return CertificateInstance Fetched CertificateInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the CertificateInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->proxy()->delete();
    }

    /**
     * Update the CertificateInstance
     *
     * @param array|Options $options Optional Arguments
     * @return CertificateInstance Updated CertificateInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        return $this->proxy()->update($options);
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Preview.DeployedDevices.CertificateInstance ' . implode(' ', $context) . ']';
    }
}
