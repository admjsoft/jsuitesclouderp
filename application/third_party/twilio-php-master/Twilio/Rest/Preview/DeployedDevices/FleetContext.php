<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\DeployedDevices;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Rest\Preview\DeployedDevices\Fleet\CertificateList;
use Twilio\Rest\Preview\DeployedDevices\Fleet\DeploymentList;
use Twilio\Rest\Preview\DeployedDevices\Fleet\DeviceList;
use Twilio\Rest\Preview\DeployedDevices\Fleet\KeyList;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property \Twilio\Rest\Preview\DeployedDevices\Fleet\DeviceList devices
 * @property \Twilio\Rest\Preview\DeployedDevices\Fleet\DeploymentList deployments
 * @property \Twilio\Rest\Preview\DeployedDevices\Fleet\CertificateList certificates
 * @property \Twilio\Rest\Preview\DeployedDevices\Fleet\KeyList keys
 * @method \Twilio\Rest\Preview\DeployedDevices\Fleet\DeviceContext devices(string $sid)
 * @method \Twilio\Rest\Preview\DeployedDevices\Fleet\DeploymentContext deployments(string $sid)
 * @method \Twilio\Rest\Preview\DeployedDevices\Fleet\CertificateContext certificates(string $sid)
 * @method \Twilio\Rest\Preview\DeployedDevices\Fleet\KeyContext keys(string $sid)
 */
class FleetContext extends InstanceContext
{
    protected $_devices = null;
    protected $_deployments = null;
    protected $_certificates = null;
    protected $_keys = null;

    /**
     * Initialize the FleetContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid A string that uniquely identifies the Fleet.
     * @return \Twilio\Rest\Preview\DeployedDevices\FleetContext
     */
    public function __construct(Version $version, $sid)
    {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('sid' => $sid, );

        $this->uri = '/Fleets/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a FleetInstance
     *
     * @return FleetInstance Fetched FleetInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new FleetInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Deletes the FleetInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Update the FleetInstance
     *
     * @param array|Options $options Optional Arguments
     * @return FleetInstance Updated FleetInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        $options = new Values($options);

        $data = Values::of(array(
            'FriendlyName' => $options['friendlyName'],
            'DefaultDeploymentSid' => $options['defaultDeploymentSid'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new FleetInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Access the devices
     *
     * @return \Twilio\Rest\Preview\DeployedDevices\Fleet\DeviceList
     */
    protected function getDevices()
    {
        if (!$this->_devices) {
            $this->_devices = new DeviceList($this->version, $this->solution['sid']);
        }

        return $this->_devices;
    }

    /**
     * Access the deployments
     *
     * @return \Twilio\Rest\Preview\DeployedDevices\Fleet\DeploymentList
     */
    protected function getDeployments()
    {
        if (!$this->_deployments) {
            $this->_deployments = new DeploymentList($this->version, $this->solution['sid']);
        }

        return $this->_deployments;
    }

    /**
     * Access the certificates
     *
     * @return \Twilio\Rest\Preview\DeployedDevices\Fleet\CertificateList
     */
    protected function getCertificates()
    {
        if (!$this->_certificates) {
            $this->_certificates = new CertificateList($this->version, $this->solution['sid']);
        }

        return $this->_certificates;
    }

    /**
     * Access the keys
     *
     * @return \Twilio\Rest\Preview\DeployedDevices\Fleet\KeyList
     */
    protected function getKeys()
    {
        if (!$this->_keys) {
            $this->_keys = new KeyList($this->version, $this->solution['sid']);
        }

        return $this->_keys;
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws \Twilio\Exceptions\TwilioException For unknown subresources
     */
    public function __get($name)
    {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws \Twilio\Exceptions\TwilioException For unknown resource
     */
    public function __call($name, $arguments)
    {
        $property = $this->$name;
        if (method_exists($property, 'getContext')) {
            return call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
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
        return '[Twilio.Preview.DeployedDevices.FleetContext ' . implode(' ', $context) . ']';
    }
}
