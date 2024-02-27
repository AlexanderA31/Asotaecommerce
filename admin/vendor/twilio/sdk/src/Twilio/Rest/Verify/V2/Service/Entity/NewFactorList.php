<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Verify
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Verify\V2\Service\Entity;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;
use Twilio\Serialize;


class NewFactorList extends ListResource
    {
    /**
     * Construct the NewFactorList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The unique SID identifier of the Service.
     * @param string $identity Customer unique identity for the Entity owner of the Factor. This identifier should be immutable, not PII, length between 8 and 64 characters, and generated by your external system, such as your user's UUID, GUID, or SID. It can only contain dash (-) separated alphanumeric characters.
     */
    public function __construct(
        Version $version,
        string $serviceSid,
        string $identity
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'serviceSid' =>
            $serviceSid,
        
        'identity' =>
            $identity,
        
        ];

        $this->uri = '/Services/' . \rawurlencode($serviceSid)
        .'/Entities/' . \rawurlencode($identity)
        .'/Factors';
    }

    /**
     * Create the NewFactorInstance
     *
     * @param string $friendlyName The friendly name of this Factor. This can be any string up to 64 characters, meant for humans to distinguish between Factors. For `factor_type` `push`, this could be a device name. For `factor_type` `totp`, this value is used as the “account name” in constructing the `binding.uri` property. At the same time, we recommend avoiding providing PII.
     * @param string $factorType
     * @param array|Options $options Optional Arguments
     * @return NewFactorInstance Created NewFactorInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $friendlyName, string $factorType, array $options = []): NewFactorInstance
    {

        $options = new Values($options);

        $data = Values::of([
            'FriendlyName' =>
                $friendlyName,
            'FactorType' =>
                $factorType,
            'Binding.Alg' =>
                $options['bindingAlg'],
            'Binding.PublicKey' =>
                $options['bindingPublicKey'],
            'Config.AppId' =>
                $options['configAppId'],
            'Config.NotificationPlatform' =>
                $options['configNotificationPlatform'],
            'Config.NotificationToken' =>
                $options['configNotificationToken'],
            'Config.SdkVersion' =>
                $options['configSdkVersion'],
            'Binding.Secret' =>
                $options['bindingSecret'],
            'Config.TimeStep' =>
                $options['configTimeStep'],
            'Config.Skew' =>
                $options['configSkew'],
            'Config.CodeLength' =>
                $options['configCodeLength'],
            'Config.Alg' =>
                $options['configAlg'],
            'Metadata' =>
                Serialize::jsonObject($options['metadata']),
        ]);

        $payload = $this->version->create('POST', $this->uri, [], $data);

        return new NewFactorInstance(
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
    public function __toString(): string
    {
        return '[Twilio.Verify.V2.NewFactorList]';
    }
}