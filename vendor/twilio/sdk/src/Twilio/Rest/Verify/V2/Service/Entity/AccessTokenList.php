<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Verify\V2\Service\Entity;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class AccessTokenList extends ListResource {
    /**
     * Construct the AccessTokenList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid Service Sid.
     * @param string $identity Unique identity of the Entity
     */
    public function __construct(Version $version, string $serviceSid, string $identity) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['serviceSid' => $serviceSid, 'identity' => $identity, ];

        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Entities/' . \rawurlencode($identity) . '/AccessTokens';
    }

    /**
     * Create the AccessTokenInstance
     *
     * @param string $factorType The Type of this Factor
     * @return AccessTokenInstance Created AccessTokenInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $factorType): AccessTokenInstance {
        $data = Values::of(['FactorType' => $factorType, ]);

        $payload = $this->version->create('POST', $this->uri, [], $data);

        return new AccessTokenInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['identity']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.Verify.V2.AccessTokenList]';
    }
}