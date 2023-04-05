<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Proxy\V1\Service;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class ShortCodeOptions
{
    /**
     * @param boolean $isReserved Reserve for manual assignment to participants
     *                            only.
     * @return UpdateShortCodeOptions Options builder
     */
    public static function update($isReserved = Values::NONE)
    {
        return new UpdateShortCodeOptions($isReserved);
    }
}

class UpdateShortCodeOptions extends Options
{
    /**
     * @param boolean $isReserved Reserve for manual assignment to participants
     *                            only.
     */
    public function __construct($isReserved = Values::NONE)
    {
        $this->options['isReserved'] = $isReserved;
    }

    /**
     * Whether or not the short code should be excluded from being assigned to a participant using proxy pool logic
     *
     * @param boolean $isReserved Reserve for manual assignment to participants
     *                            only.
     * @return $this Fluent Builder
     */
    public function setIsReserved($isReserved)
    {
        $this->options['isReserved'] = $isReserved;
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
        return '[Twilio.Proxy.V1.UpdateShortCodeOptions ' . implode(' ', $options) . ']';
    }
}
