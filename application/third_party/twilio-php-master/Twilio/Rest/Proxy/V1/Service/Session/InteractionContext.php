<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Proxy\V1\Service\Session;

use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class InteractionContext extends InstanceContext
{
    /**
     * Initialize the InteractionContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid Service Sid.
     * @param string $sessionSid Session Sid.
     * @param string $sid A string that uniquely identifies this Interaction.
     * @return \Twilio\Rest\Proxy\V1\Service\Session\InteractionContext
     */
    public function __construct(Version $version, $serviceSid, $sessionSid, $sid)
    {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'sessionSid' => $sessionSid, 'sid' => $sid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Sessions/' . rawurlencode($sessionSid) . '/Interactions/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a InteractionInstance
     *
     * @return InteractionInstance Fetched InteractionInstance
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

        return new InteractionInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['sessionSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the InteractionInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->version->delete('delete', $this->uri);
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
        return '[Twilio.Proxy.V1.InteractionContext ' . implode(' ', $context) . ']';
    }
}
