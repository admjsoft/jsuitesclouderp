<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Room extends TwiML
{
    /**
     * Room constructor.
     *
     * @param string $name Room name
     * @param array $attributes Optional attributes
     */
    public function __construct($name, $attributes = array())
    {
        parent::__construct('Room', $name, $attributes);
    }

    /**
     * Add Participantidentity attribute.
     *
     * @param string $participantidentity Participant identity when connecting to
     *                                    the Room
     * @return TwiML $this.
     */
    public function setParticipantidentity($participantidentity)
    {
        return $this->setAttribute('participantidentity', $participantidentity);
    }
}
