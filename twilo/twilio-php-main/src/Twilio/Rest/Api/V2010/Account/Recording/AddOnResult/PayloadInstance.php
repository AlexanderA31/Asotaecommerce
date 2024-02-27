<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Api
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Api\V2010\Account\Recording\AddOnResult;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;
use Twilio\Deserialize;


/**
 * @property string|null $sid
 * @property string|null $addOnResultSid
 * @property string|null $accountSid
 * @property string|null $label
 * @property string|null $addOnSid
 * @property string|null $addOnConfigurationSid
 * @property string|null $contentType
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property string|null $referenceSid
 * @property array|null $subresourceUris
 */
class PayloadInstance extends InstanceResource
{
    /**
     * Initialize the PayloadInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) that created the Recording AddOnResult Payload resources to delete.
     * @param string $referenceSid The SID of the recording to which the AddOnResult resource that contains the payloads to delete belongs.
     * @param string $addOnResultSid The SID of the AddOnResult to which the payloads to delete belongs.
     * @param string $sid The Twilio-provided string that uniquely identifies the Recording AddOnResult Payload resource to delete.
     */
    public function __construct(Version $version, array $payload, string $accountSid, string $referenceSid, string $addOnResultSid, string $sid = null)
    {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'sid' => Values::array_get($payload, 'sid'),
            'addOnResultSid' => Values::array_get($payload, 'add_on_result_sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'label' => Values::array_get($payload, 'label'),
            'addOnSid' => Values::array_get($payload, 'add_on_sid'),
            'addOnConfigurationSid' => Values::array_get($payload, 'add_on_configuration_sid'),
            'contentType' => Values::array_get($payload, 'content_type'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'referenceSid' => Values::array_get($payload, 'reference_sid'),
            'subresourceUris' => Values::array_get($payload, 'subresource_uris'),
        ];

        $this->solution = ['accountSid' => $accountSid, 'referenceSid' => $referenceSid, 'addOnResultSid' => $addOnResultSid, 'sid' => $sid ?: $this->properties['sid'], ];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return PayloadContext Context for this PayloadInstance
     */
    protected function proxy(): PayloadContext
    {
        if (!$this->context) {
            $this->context = new PayloadContext(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['referenceSid'],
                $this->solution['addOnResultSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Delete the PayloadInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool
    {

        return $this->proxy()->delete();
    }

    /**
     * Fetch the PayloadInstance
     *
     * @return PayloadInstance Fetched PayloadInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): PayloadInstance
    {

        return $this->proxy()->fetch();
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name)
    {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Api.V2010.PayloadInstance ' . \implode(' ', $context) . ']';
    }
}

