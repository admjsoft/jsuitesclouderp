<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Verify\V1;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class ServiceOptions
{
    /**
     * @param integer $codeLength Length of verification code. Valid values are 4-10
     * @return CreateServiceOptions Options builder
     */
    public static function create($codeLength = Values::NONE)
    {
        return new CreateServiceOptions($codeLength);
    }

    /**
     * @param string $friendlyName Friendly name of the service
     * @param integer $codeLength Length of verification code. Valid values are 4-10
     * @return UpdateServiceOptions Options builder
     */
    public static function update($friendlyName = Values::NONE, $codeLength = Values::NONE)
    {
        return new UpdateServiceOptions($friendlyName, $codeLength);
    }
}

class CreateServiceOptions extends Options
{
    /**
     * @param integer $codeLength Length of verification code. Valid values are 4-10
     */
    public function __construct($codeLength = Values::NONE)
    {
        $this->options['codeLength'] = $codeLength;
    }

    /**
     * The length of the verification code to be generated. Must be an integer value between 4-10
     *
     * @param integer $codeLength Length of verification code. Valid values are 4-10
     * @return $this Fluent Builder
     */
    public function setCodeLength($codeLength)
    {
        $this->options['codeLength'] = $codeLength;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Verify.V1.CreateServiceOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateServiceOptions extends Options
{
    /**
     * @param string $friendlyName Friendly name of the service
     * @param integer $codeLength Length of verification code. Valid values are 4-10
     */
    public function __construct($friendlyName = Values::NONE, $codeLength = Values::NONE)
    {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['codeLength'] = $codeLength;
    }

    /**
     * A 1-64 character string with friendly name of service
     *
     * @param string $friendlyName Friendly name of the service
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName)
    {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The length of the verification code to be generated. Must be an integer value between 4-10
     *
     * @param integer $codeLength Length of verification code. Valid values are 4-10
     * @return $this Fluent Builder
     */
    public function setCodeLength($codeLength)
    {
        $this->options['codeLength'] = $codeLength;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Verify.V1.UpdateServiceOptions ' . implode(' ', $options) . ']';
    }
}
