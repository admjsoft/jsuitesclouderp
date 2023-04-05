<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Wireless;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Wireless\V1\CommandList;
use Twilio\Rest\Wireless\V1\RatePlanList;
use Twilio\Rest\Wireless\V1\SimList;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Wireless\V1\CommandList commands
 * @property \Twilio\Rest\Wireless\V1\RatePlanList ratePlans
 * @property \Twilio\Rest\Wireless\V1\SimList sims
 * @method \Twilio\Rest\Wireless\V1\CommandContext commands(string $sid)
 * @method \Twilio\Rest\Wireless\V1\RatePlanContext ratePlans(string $sid)
 * @method \Twilio\Rest\Wireless\V1\SimContext sims(string $sid)
 */
class V1 extends Version
{
    protected $_commands = null;
    protected $_ratePlans = null;
    protected $_sims = null;

    /**
     * Construct the V1 version of Wireless
     *
     * @param \Twilio\Domain $domain Domain that contains the version
     * @return \Twilio\Rest\Wireless\V1 V1 version of Wireless
     */
    public function __construct(Domain $domain)
    {
        parent::__construct($domain);
        $this->version = 'v1';
    }

    /**
     * @return \Twilio\Rest\Wireless\V1\CommandList
     */
    protected function getCommands()
    {
        if (!$this->_commands) {
            $this->_commands = new CommandList($this);
        }
        return $this->_commands;
    }

    /**
     * @return \Twilio\Rest\Wireless\V1\RatePlanList
     */
    protected function getRatePlans()
    {
        if (!$this->_ratePlans) {
            $this->_ratePlans = new RatePlanList($this);
        }
        return $this->_ratePlans;
    }

    /**
     * @return \Twilio\Rest\Wireless\V1\SimList
     */
    protected function getSims()
    {
        if (!$this->_sims) {
            $this->_sims = new SimList($this);
        }
        return $this->_sims;
    }

    /**
     * Magic getter to lazy load root resources
     *
     * @param string $name Resource to return
     * @return \Twilio\ListResource The requested resource
     * @throws \Twilio\Exceptions\TwilioException For unknown resource
     */
    public function __get($name)
    {
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        throw new TwilioException('Unknown resource ' . $name);
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
        return '[Twilio.Wireless.V1]';
    }
}
