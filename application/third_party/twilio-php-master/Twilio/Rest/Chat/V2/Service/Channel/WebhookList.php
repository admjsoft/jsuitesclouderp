<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Chat\V2\Service\Channel;

use Twilio\ListResource;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class WebhookList extends ListResource
{
    /**
     * Construct the WebhookList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The service_sid
     * @param string $channelSid The channel_sid
     * @return \Twilio\Rest\Chat\V2\Service\Channel\WebhookList
     */
    public function __construct(Version $version, $serviceSid, $channelSid)
    {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'channelSid' => $channelSid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Channels/' . rawurlencode($channelSid) . '/Webhooks';
    }

    /**
     * Streams WebhookInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     *
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, stream()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return \Twilio\Stream stream of results
     */
    public function stream($limit = null, $pageSize = null)
    {
        $limits = $this->version->readLimits($limit, $pageSize);

        $page = $this->page($limits['pageSize']);

        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Reads WebhookInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     *
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return WebhookInstance[] Array of results
     */
    public function read($limit = null, $pageSize = null)
    {
        return iterator_to_array($this->stream($limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of WebhookInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of WebhookInstance
     */
    public function page($pageSize = Values::NONE, $pageToken = Values::NONE, $pageNumber = Values::NONE)
    {
        $params = Values::of(array(
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ));

        $response = $this->version->page(
            'GET',
            $this->uri,
            $params
        );

        return new WebhookPage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of WebhookInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return \Twilio\Page Page of WebhookInstance
     */
    public function getPage($targetUrl)
    {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new WebhookPage($this->version, $response, $this->solution);
    }

    /**
     * Create a new WebhookInstance
     *
     * @param string $type The type
     * @param array|Options $options Optional Arguments
     * @return WebhookInstance Newly created WebhookInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($type, $options = array())
    {
        $options = new Values($options);

        $data = Values::of(array(
            'Type' => $type,
            'Configuration.Url' => $options['configurationUrl'],
            'Configuration.Method' => $options['configurationMethod'],
            'Configuration.Filters' => Serialize::map($options['configurationFilters'], function ($e) {
                return $e;
            }),
            'Configuration.Triggers' => Serialize::map($options['configurationTriggers'], function ($e) {
                return $e;
            }),
            'Configuration.FlowSid' => $options['configurationFlowSid'],
            'Configuration.RetryCount' => $options['configurationRetryCount'],
        ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new WebhookInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['channelSid']
        );
    }

    /**
     * Constructs a WebhookContext
     *
     * @param string $sid The sid
     * @return \Twilio\Rest\Chat\V2\Service\Channel\WebhookContext
     */
    public function getContext($sid)
    {
        return new WebhookContext(
            $this->version,
            $this->solution['serviceSid'],
            $this->solution['channelSid'],
            $sid
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.Chat.V2.WebhookList]';
    }
}
