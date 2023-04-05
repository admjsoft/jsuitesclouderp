<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Options;
use Twilio\Values;

abstract class WorkflowOptions
{
    /**
     * @param string $friendlyName A string representing a human readable name for
     *                             this Workflow.
     * @param string $assignmentCallbackUrl A valid URL for the application that
     *                                      will process task assignment events.
     * @param string $fallbackAssignmentCallbackUrl If the request to the
     *                                              AssignmentCallbackUrl fails,
     *                                              the assignment callback will be
     *                                              made to this URL.
     * @param string $configuration JSON document configuring the rules for this
     *                              Workflow.
     * @param integer $taskReservationTimeout An integer value controlling how long
     *                                        in seconds TaskRouter will wait for a
     *                                        confirmation response from your
     *                                        application after assigning a Task to
     *                                        a worker.
     * @return UpdateWorkflowOptions Options builder
     */
    public static function update($friendlyName = Values::NONE, $assignmentCallbackUrl = Values::NONE, $fallbackAssignmentCallbackUrl = Values::NONE, $configuration = Values::NONE, $taskReservationTimeout = Values::NONE)
    {
        return new UpdateWorkflowOptions($friendlyName, $assignmentCallbackUrl, $fallbackAssignmentCallbackUrl, $configuration, $taskReservationTimeout);
    }

    /**
     * @param string $friendlyName Human readable description of this Workflow
     * @return ReadWorkflowOptions Options builder
     */
    public static function read($friendlyName = Values::NONE)
    {
        return new ReadWorkflowOptions($friendlyName);
    }

    /**
     * @param string $assignmentCallbackUrl A valid URL for the application that
     *                                      will process task assignment events.
     * @param string $fallbackAssignmentCallbackUrl If the request to the
     *                                              AssignmentCallbackUrl fails,
     *                                              the assignment callback will be
     *                                              made to this URL.
     * @param integer $taskReservationTimeout An integer value controlling how long
     *                                        in seconds TaskRouter will wait for a
     *                                        confirmation response from your
     *                                        application after assigning a Task to
     *                                        a worker.
     * @return CreateWorkflowOptions Options builder
     */
    public static function create($assignmentCallbackUrl = Values::NONE, $fallbackAssignmentCallbackUrl = Values::NONE, $taskReservationTimeout = Values::NONE)
    {
        return new CreateWorkflowOptions($assignmentCallbackUrl, $fallbackAssignmentCallbackUrl, $taskReservationTimeout);
    }
}

class UpdateWorkflowOptions extends Options
{
    /**
     * @param string $friendlyName A string representing a human readable name for
     *                             this Workflow.
     * @param string $assignmentCallbackUrl A valid URL for the application that
     *                                      will process task assignment events.
     * @param string $fallbackAssignmentCallbackUrl If the request to the
     *                                              AssignmentCallbackUrl fails,
     *                                              the assignment callback will be
     *                                              made to this URL.
     * @param string $configuration JSON document configuring the rules for this
     *                              Workflow.
     * @param integer $taskReservationTimeout An integer value controlling how long
     *                                        in seconds TaskRouter will wait for a
     *                                        confirmation response from your
     *                                        application after assigning a Task to
     *                                        a worker.
     */
    public function __construct($friendlyName = Values::NONE, $assignmentCallbackUrl = Values::NONE, $fallbackAssignmentCallbackUrl = Values::NONE, $configuration = Values::NONE, $taskReservationTimeout = Values::NONE)
    {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['assignmentCallbackUrl'] = $assignmentCallbackUrl;
        $this->options['fallbackAssignmentCallbackUrl'] = $fallbackAssignmentCallbackUrl;
        $this->options['configuration'] = $configuration;
        $this->options['taskReservationTimeout'] = $taskReservationTimeout;
    }

    /**
     * A string representing a human readable name for this Workflow. Examples include 'Customer Support' or 'Sales Team'.
     *
     * @param string $friendlyName A string representing a human readable name for
     *                             this Workflow.
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName)
    {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * A valid URL for the application that will process task assignment events. See [Handling Task Assignment Callback](https://www.twilio.com/docs/api/taskrouter/handling-assignment-callbacks) for more details.
     *
     * @param string $assignmentCallbackUrl A valid URL for the application that
     *                                      will process task assignment events.
     * @return $this Fluent Builder
     */
    public function setAssignmentCallbackUrl($assignmentCallbackUrl)
    {
        $this->options['assignmentCallbackUrl'] = $assignmentCallbackUrl;
        return $this;
    }

    /**
     * If the request to the AssignmentCallbackUrl fails, the assignment callback will be made to this URL.
     *
     * @param string $fallbackAssignmentCallbackUrl If the request to the
     *                                              AssignmentCallbackUrl fails,
     *                                              the assignment callback will be
     *                                              made to this URL.
     * @return $this Fluent Builder
     */
    public function setFallbackAssignmentCallbackUrl($fallbackAssignmentCallbackUrl)
    {
        $this->options['fallbackAssignmentCallbackUrl'] = $fallbackAssignmentCallbackUrl;
        return $this;
    }

    /**
     * JSON document configuring the rules for this Workflow. See [Configuring Workflows](https://www.twilio.com/docs/api/taskrouter/workflow-configuration) for more information.
     *
     * @param string $configuration JSON document configuring the rules for this
     *                              Workflow.
     * @return $this Fluent Builder
     */
    public function setConfiguration($configuration)
    {
        $this->options['configuration'] = $configuration;
        return $this;
    }

    /**
     * An integer value controlling how long in seconds TaskRouter will wait for a confirmation response from your application after assigning a Task to a worker. Defaults to 120 seconds. Maximum value is 86400 (24 hours)
     *
     * @param integer $taskReservationTimeout An integer value controlling how long
     *                                        in seconds TaskRouter will wait for a
     *                                        confirmation response from your
     *                                        application after assigning a Task to
     *                                        a worker.
     * @return $this Fluent Builder
     */
    public function setTaskReservationTimeout($taskReservationTimeout)
    {
        $this->options['taskReservationTimeout'] = $taskReservationTimeout;
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
        return '[Twilio.Taskrouter.V1.UpdateWorkflowOptions ' . implode(' ', $options) . ']';
    }
}

class ReadWorkflowOptions extends Options
{
    /**
     * @param string $friendlyName Human readable description of this Workflow
     */
    public function __construct($friendlyName = Values::NONE)
    {
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * Human readable description of this Workflow (for example "Customer Support" or "2014 Election Campaign")
     *
     * @param string $friendlyName Human readable description of this Workflow
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName)
    {
        $this->options['friendlyName'] = $friendlyName;
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
        return '[Twilio.Taskrouter.V1.ReadWorkflowOptions ' . implode(' ', $options) . ']';
    }
}

class CreateWorkflowOptions extends Options
{
    /**
     * @param string $assignmentCallbackUrl A valid URL for the application that
     *                                      will process task assignment events.
     * @param string $fallbackAssignmentCallbackUrl If the request to the
     *                                              AssignmentCallbackUrl fails,
     *                                              the assignment callback will be
     *                                              made to this URL.
     * @param integer $taskReservationTimeout An integer value controlling how long
     *                                        in seconds TaskRouter will wait for a
     *                                        confirmation response from your
     *                                        application after assigning a Task to
     *                                        a worker.
     */
    public function __construct($assignmentCallbackUrl = Values::NONE, $fallbackAssignmentCallbackUrl = Values::NONE, $taskReservationTimeout = Values::NONE)
    {
        $this->options['assignmentCallbackUrl'] = $assignmentCallbackUrl;
        $this->options['fallbackAssignmentCallbackUrl'] = $fallbackAssignmentCallbackUrl;
        $this->options['taskReservationTimeout'] = $taskReservationTimeout;
    }

    /**
     * A valid URL for the application that will process task assignment events. See [Handling Task Assignment Callback](https://www.twilio.com/docs/api/taskrouter/handling-assignment-callbacks) for more details.
     *
     * @param string $assignmentCallbackUrl A valid URL for the application that
     *                                      will process task assignment events.
     * @return $this Fluent Builder
     */
    public function setAssignmentCallbackUrl($assignmentCallbackUrl)
    {
        $this->options['assignmentCallbackUrl'] = $assignmentCallbackUrl;
        return $this;
    }

    /**
     * If the request to the AssignmentCallbackUrl fails, the assignment callback will be made to this URL.
     *
     * @param string $fallbackAssignmentCallbackUrl If the request to the
     *                                              AssignmentCallbackUrl fails,
     *                                              the assignment callback will be
     *                                              made to this URL.
     * @return $this Fluent Builder
     */
    public function setFallbackAssignmentCallbackUrl($fallbackAssignmentCallbackUrl)
    {
        $this->options['fallbackAssignmentCallbackUrl'] = $fallbackAssignmentCallbackUrl;
        return $this;
    }

    /**
     * An integer value controlling how long in seconds TaskRouter will wait for a confirmation response from your application after assigning a Task to a worker. See Task Assignment Callback for more information. Defaults to 120 seconds. Maximum value is 86400 (24 hours)
     *
     * @param integer $taskReservationTimeout An integer value controlling how long
     *                                        in seconds TaskRouter will wait for a
     *                                        confirmation response from your
     *                                        application after assigning a Task to
     *                                        a worker.
     * @return $this Fluent Builder
     */
    public function setTaskReservationTimeout($taskReservationTimeout)
    {
        $this->options['taskReservationTimeout'] = $taskReservationTimeout;
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
        return '[Twilio.Taskrouter.V1.CreateWorkflowOptions ' . implode(' ', $options) . ']';
    }
}
