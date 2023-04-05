<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\ListResource;
use Twilio\Version;

class WorkspaceCumulativeStatisticsList extends ListResource
{
    /**
     * Construct the WorkspaceCumulativeStatisticsList
     *
     * @param Version $version Version that contains the resource
     * @param string $workspaceSid The workspace_sid
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceCumulativeStatisticsList
     */
    public function __construct(Version $version, $workspaceSid)
    {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('workspaceSid' => $workspaceSid, );
    }

    /**
     * Constructs a WorkspaceCumulativeStatisticsContext
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceCumulativeStatisticsContext
     */
    public function getContext()
    {
        return new WorkspaceCumulativeStatisticsContext($this->version, $this->solution['workspaceSid']);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.Taskrouter.V1.WorkspaceCumulativeStatisticsList]';
    }
}
