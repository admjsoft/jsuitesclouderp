<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Preview\AccSecurity as PreviewAccSecurity;
use Twilio\Rest\Preview\Authy as PreviewAuthy;
use Twilio\Rest\Preview\BulkExports as PreviewBulkExports;
use Twilio\Rest\Preview\DeployedDevices as PreviewDeployedDevices;
use Twilio\Rest\Preview\HostedNumbers as PreviewHostedNumbers;
use Twilio\Rest\Preview\Marketplace as PreviewMarketplace;
use Twilio\Rest\Preview\Sync as PreviewSync;
use Twilio\Rest\Preview\Understand as PreviewUnderstand;
use Twilio\Rest\Preview\Wireless as PreviewWireless;

/**
 * @property \Twilio\Rest\Preview\Authy authy
 * @property \Twilio\Rest\Preview\BulkExports bulkExports
 * @property \Twilio\Rest\Preview\DeployedDevices deployedDevices
 * @property \Twilio\Rest\Preview\HostedNumbers hostedNumbers
 * @property \Twilio\Rest\Preview\Marketplace marketplace
 * @property \Twilio\Rest\Preview\AccSecurity accSecurity
 * @property \Twilio\Rest\Preview\Sync sync
 * @property \Twilio\Rest\Preview\Understand understand
 * @property \Twilio\Rest\Preview\Wireless wireless
 * @property \Twilio\Rest\Preview\Sync\ServiceList services
 * @property \Twilio\Rest\Preview\BulkExports\ExportList exports
 * @property \Twilio\Rest\Preview\BulkExports\ExportConfigurationList exportConfiguration
 * @property \Twilio\Rest\Preview\DeployedDevices\FleetList fleets
 * @property \Twilio\Rest\Preview\HostedNumbers\AuthorizationDocumentList authorizationDocuments
 * @property \Twilio\Rest\Preview\HostedNumbers\HostedNumberOrderList hostedNumberOrders
 * @property \Twilio\Rest\Preview\Marketplace\InstalledAddOnList installedAddOns
 * @property \Twilio\Rest\Preview\Marketplace\AvailableAddOnList availableAddOns
 * @property \Twilio\Rest\Preview\Understand\AssistantList assistants
 * @property \Twilio\Rest\Preview\Wireless\CommandList commands
 * @property \Twilio\Rest\Preview\Wireless\RatePlanList ratePlans
 * @property \Twilio\Rest\Preview\Wireless\SimList sims
 * @method \Twilio\Rest\Preview\Sync\ServiceContext services(string $sid)
 * @method \Twilio\Rest\Preview\BulkExports\ExportContext exports(string $resourceType)
 * @method \Twilio\Rest\Preview\BulkExports\ExportConfigurationContext exportConfiguration(string $resourceType)
 * @method \Twilio\Rest\Preview\DeployedDevices\FleetContext fleets(string $sid)
 * @method \Twilio\Rest\Preview\HostedNumbers\AuthorizationDocumentContext authorizationDocuments(string $sid)
 * @method \Twilio\Rest\Preview\HostedNumbers\HostedNumberOrderContext hostedNumberOrders(string $sid)
 * @method \Twilio\Rest\Preview\Marketplace\InstalledAddOnContext installedAddOns(string $sid)
 * @method \Twilio\Rest\Preview\Marketplace\AvailableAddOnContext availableAddOns(string $sid)
 * @method \Twilio\Rest\Preview\Understand\AssistantContext assistants(string $sid)
 * @method \Twilio\Rest\Preview\Wireless\CommandContext commands(string $sid)
 * @method \Twilio\Rest\Preview\Wireless\RatePlanContext ratePlans(string $sid)
 * @method \Twilio\Rest\Preview\Wireless\SimContext sims(string $sid)
 */
class Preview extends Domain {
    protected $_authy = null;
    protected $_bulkExports = null;
    protected $_deployedDevices = null;
    protected $_hostedNumbers = null;
    protected $_marketplace = null;
    protected $_accSecurity = null;
    protected $_sync = null;
    protected $_understand = null;
    protected $_wireless = null;

    /**
     * Construct the Preview Domain
     * 
     * @param \Twilio\Rest\Client $client Twilio\Rest\Client to communicate with
     *                                    Twilio
     * @return \Twilio\Rest\Preview Domain for Preview
     */
    public function __construct(Client $client) {
        parent::__construct($client);

        $this->baseUrl = 'https://preview.twilio.com';
    }

    /**
     * @return \Twilio\Rest\Preview\Authy Version authy of preview
     */
    protected function getAuthy() {
        if (!$this->_authy) {
            $this->_authy = new PreviewAuthy($this);
        }
        return $this->_authy;
    }

    /**
     * @return \Twilio\Rest\Preview\BulkExports Version bulkExports of preview
     */
    protected function getBulkExports() {
        if (!$this->_bulkExports) {
            $this->_bulkExports = new PreviewBulkExports($this);
        }
        return $this->_bulkExports;
    }

    /**
     * @return \Twilio\Rest\Preview\DeployedDevices Version deployedDevices of
     *                                              preview
     */
    protected function getDeployedDevices() {
        if (!$this->_deployedDevices) {
            $this->_deployedDevices = new PreviewDeployedDevices($this);
        }
        return $this->_deployedDevices;
    }

    /**
     * @return \Twilio\Rest\Preview\HostedNumbers Version hostedNumbers of preview
     */
    protected function getHostedNumbers() {
        if (!$this->_hostedNumbers) {
            $this->_hostedNumbers = new PreviewHostedNumbers($this);
        }
        return $this->_hostedNumbers;
    }

    /**
     * @return \Twilio\Rest\Preview\Marketplace Version marketplace of preview
     */
    protected function getMarketplace() {
        if (!$this->_marketplace) {
            $this->_marketplace = new PreviewMarketplace($this);
        }
        return $this->_marketplace;
    }

    /**
     * @return \Twilio\Rest\Preview\AccSecurity Version accSecurity of preview
     */
    protected function getAccSecurity() {
        if (!$this->_accSecurity) {
            $this->_accSecurity = new PreviewAccSecurity($this);
        }
        return $this->_accSecurity;
    }

    /**
     * @return \Twilio\Rest\Preview\Sync Version sync of preview
     */
    protected function getSync() {
        if (!$this->_sync) {
            $this->_sync = new PreviewSync($this);
        }
        return $this->_sync;
    }

    /**
     * @return \Twilio\Rest\Preview\Understand Version understand of preview
     */
    protected function getUnderstand() {
        if (!$this->_understand) {
            $this->_understand = new PreviewUnderstand($this);
        }
        return $this->_understand;
    }

    /**
     * @return \Twilio\Rest\Preview\Wireless Version wireless of preview
     */
    protected function getWireless() {
        if (!$this->_wireless) {
            $this->_wireless = new PreviewWireless($this);
        }
        return $this->_wireless;
    }

    /**
     * Magic getter to lazy load version
     * 
     * @param string $name Version to return
     * @return \Twilio\Version The requested version
     * @throws \Twilio\Exceptions\TwilioException For unknown versions
     */
    public function __get($name) {
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        throw new TwilioException('Unknown version ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     * 
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws \Twilio\Exceptions\TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $method = 'context' . ucfirst($name);
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $arguments);
        }

        throw new TwilioException('Unknown context ' . $name);
    }

    /**
     * @return \Twilio\Rest\Preview\Sync\ServiceList 
     */
    protected function getServices() {
        return $this->sync->services;
    }

    /**
     * @param string $sid The sid
     * @return \Twilio\Rest\Preview\Sync\ServiceContext 
     */
    protected function contextServices($sid) {
        return $this->sync->services($sid);
    }

    /**
     * @return \Twilio\Rest\Preview\BulkExports\ExportList 
     */
    protected function getExports() {
        return $this->bulkExports->exports;
    }

    /**
     * @param string $resourceType The resource_type
     * @return \Twilio\Rest\Preview\BulkExports\ExportContext 
     */
    protected function contextExports($resourceType) {
        return $this->bulkExports->exports($resourceType);
    }

    /**
     * @return \Twilio\Rest\Preview\BulkExports\ExportConfigurationList 
     */
    protected function getExportConfiguration() {
        return $this->bulkExports->exportConfiguration;
    }

    /**
     * @param string $resourceType The resource_type
     * @return \Twilio\Rest\Preview\BulkExports\ExportConfigurationContext 
     */
    protected function contextExportConfiguration($resourceType) {
        return $this->bulkExports->exportConfiguration($resourceType);
    }

    /**
     * @return \Twilio\Rest\Preview\DeployedDevices\FleetList 
     */
    protected function getFleets() {
        return $this->deployedDevices->fleets;
    }

    /**
     * @param string $sid A string that uniquely identifies the Fleet.
     * @return \Twilio\Rest\Preview\DeployedDevices\FleetContext 
     */
    protected function contextFleets($sid) {
        return $this->deployedDevices->fleets($sid);
    }

    /**
     * @return \Twilio\Rest\Preview\HostedNumbers\AuthorizationDocumentList 
     */
    protected function getAuthorizationDocuments() {
        return $this->hostedNumbers->authorizationDocuments;
    }

    /**
     * @param string $sid AuthorizationDocument sid.
     * @return \Twilio\Rest\Preview\HostedNumbers\AuthorizationDocumentContext 
     */
    protected function contextAuthorizationDocuments($sid) {
        return $this->hostedNumbers->authorizationDocuments($sid);
    }

    /**
     * @return \Twilio\Rest\Preview\HostedNumbers\HostedNumberOrderList 
     */
    protected function getHostedNumberOrders() {
        return $this->hostedNumbers->hostedNumberOrders;
    }

    /**
     * @param string $sid HostedNumberOrder sid.
     * @return \Twilio\Rest\Preview\HostedNumbers\HostedNumberOrderContext 
     */
    protected function contextHostedNumberOrders($sid) {
        return $this->hostedNumbers->hostedNumberOrders($sid);
    }

    /**
     * @return \Twilio\Rest\Preview\Marketplace\InstalledAddOnList 
     */
    protected function getInstalledAddOns() {
        return $this->marketplace->installedAddOns;
    }

    /**
     * @param string $sid The unique Installed Add-on Sid
     * @return \Twilio\Rest\Preview\Marketplace\InstalledAddOnContext 
     */
    protected function contextInstalledAddOns($sid) {
        return $this->marketplace->installedAddOns($sid);
    }

    /**
     * @return \Twilio\Rest\Preview\Marketplace\AvailableAddOnList 
     */
    protected function getAvailableAddOns() {
        return $this->marketplace->availableAddOns;
    }

    /**
     * @param string $sid The unique Available Add-on Sid
     * @return \Twilio\Rest\Preview\Marketplace\AvailableAddOnContext 
     */
    protected function contextAvailableAddOns($sid) {
        return $this->marketplace->availableAddOns($sid);
    }

    /**
     * @return \Twilio\Rest\Preview\Understand\AssistantList 
     */
    protected function getAssistants() {
        return $this->understand->assistants;
    }

    /**
     * @param string $sid The sid
     * @return \Twilio\Rest\Preview\Understand\AssistantContext 
     */
    protected function contextAssistants($sid) {
        return $this->understand->assistants($sid);
    }

    /**
     * @return \Twilio\Rest\Preview\Wireless\CommandList 
     */
    protected function getCommands() {
        return $this->wireless->commands;
    }

    /**
     * @param string $sid The sid
     * @return \Twilio\Rest\Preview\Wireless\CommandContext 
     */
    protected function contextCommands($sid) {
        return $this->wireless->commands($sid);
    }

    /**
     * @return \Twilio\Rest\Preview\Wireless\RatePlanList 
     */
    protected function getRatePlans() {
        return $this->wireless->ratePlans;
    }

    /**
     * @param string $sid The sid
     * @return \Twilio\Rest\Preview\Wireless\RatePlanContext 
     */
    protected function contextRatePlans($sid) {
        return $this->wireless->ratePlans($sid);
    }

    /**
     * @return \Twilio\Rest\Preview\Wireless\SimList 
     */
    protected function getSims() {
        return $this->wireless->sims;
    }

    /**
     * @param string $sid The sid
     * @return \Twilio\Rest\Preview\Wireless\SimContext 
     */
    protected function contextSims($sid) {
        return $this->wireless->sims($sid);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Preview]';
    }
}