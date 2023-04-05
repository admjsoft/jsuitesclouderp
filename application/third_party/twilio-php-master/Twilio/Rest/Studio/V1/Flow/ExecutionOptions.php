<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Studio\V1\Flow;

use Twilio\Options;
use Twilio\Values;

abstract class ExecutionOptions
{
    /**
     * @param array $parameters JSON data that will be added to your flow's context
     *                          and can accessed as variables inside your flow.
     * @return CreateExecutionOptions Options builder
     */
    public static function create($parameters = Values::NONE)
    {
        return new CreateExecutionOptions($parameters);
    }
}

class CreateExecutionOptions extends Options
{
    /**
     * @param array $parameters JSON data that will be added to your flow's context
     *                          and can accessed as variables inside your flow.
     */
    public function __construct($parameters = Values::NONE)
    {
        $this->options['parameters'] = $parameters;
    }

    /**
     * JSON data that will be added to your flow's context and can accessed as variables inside your flow. For example, if you pass in Parameters={'name':'Zeke'} then inside a widget you can reference the variable {{flow.data.name}} which will return the string 'Zeke'. Note: the JSON value must explicitly be passed as a string, not as a hash object. Depending on your particular HTTP library, you may need to add quotes or URL encode your JSON string.
     *
     * @param array $parameters JSON data that will be added to your flow's context
     *                          and can accessed as variables inside your flow.
     * @return $this Fluent Builder
     */
    public function setParameters($parameters)
    {
        $this->options['parameters'] = $parameters;
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
        return '[Twilio.Studio.V1.CreateExecutionOptions ' . implode(' ', $options) . ']';
    }
}
