<?php

declare(strict_types=1);

namespace PhpCfdi\SatEstadoCfdi\Soap;

use SoapClient;

class SoapClientFactory
{
    public const MANDATORY_OPTIONS = [
        // URL of the SOAP server to send the request to
        'location' => '',

        // target namespace of the SOAP service
        'uri' => 'http://tempuri.org/',

        // SOAP_RPC (default) or SOAP_DOCUMENT, must be SOAP_RPC
        'style' => SOAP_RPC,

        // SOAP_ENCODED (default) or SOAP_LITERAL, SOAP_LITERAL is cleaner
        'use' => SOAP_LITERAL,

        // remote service is SOAP 1.1
        'soap_version' => SOAP_1_1,
    ];

    public const DEFAULT_OPTIONS = [
        'exceptions' => true, // throw exceptions on errors
        'connection_timeout' => 10, // 10 seconds for timeout
    ];

    /** @var array<string, mixed> */
    private $customSoapOptions;

    /**
     * SoapClientFactory constructor.
     * @param array<string, mixed> $customSoapOptions
     */
    public function __construct(array $customSoapOptions = [])
    {
        $this->customSoapOptions = $customSoapOptions;
    }

    /**
     * @return array<string, mixed>
     */
    public function customSoapOptions(): array
    {
        return $this->customSoapOptions;
    }

    /**
     * @param string $serviceLocation
     * @return array<string, mixed>
     */
    public function finalSoapOptions(string $serviceLocation): array
    {
        return array_merge(
            self::DEFAULT_OPTIONS,
            $this->customSoapOptions(),
            self::MANDATORY_OPTIONS,
            ['location' => $serviceLocation] // set the location to final place
        );
    }

    public function create(string $serviceLocation): SoapClient
    {
        return $this->createSoapClientWithOptions(
            $this->finalSoapOptions($serviceLocation)
        );
    }

    /**
     * Override this method to build your own SoapClient
     *
     * @param array<string, mixed> $options
     * @return SoapClient
     */
    protected function createSoapClientWithOptions(array $options): SoapClient
    {
        return new SoapClient(null, $options);
    }
}
