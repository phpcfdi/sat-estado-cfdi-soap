<?php

declare(strict_types=1);

namespace PhpCfdi\SatEstadoCfdi\Tests\Soap\Unit;

use PhpCfdi\SatEstadoCfdi\Soap\SoapClientFactory;
use PhpCfdi\SatEstadoCfdi\Tests\Soap\TestCase;
use SoapClient;

class SoapClientFactoryTest extends TestCase
{
    public function testFactoryHasCustomOptions(): void
    {
        $customOptions = ['foo' => 'bar'];
        $factory = new SoapClientFactory($customOptions);

        $this->assertSame($customOptions, $factory->customSoapOptions());
    }

    public function testFinalOptionsOverrideDefaultOptions(): void
    {
        $expectedValue = 10;
        $customOptions = ['connection_timeout' => $expectedValue];
        $factory = new SoapClientFactory($customOptions);

        $value = $factory->finalSoapOptions('')['connection_timeout'];
        $this->assertSame($expectedValue, $value);
    }

    public function testFinalOptionsPreserveDefaultOptions(): void
    {
        $expectedValue = SoapClientFactory::MANDATORY_OPTIONS['soap_version'];
        $customOptions = ['soap_version' => SOAP_1_2];
        $factory = new SoapClientFactory($customOptions);

        $value = $factory->finalSoapOptions('')['soap_version'];
        $this->assertSame($expectedValue, $value);
    }

    public function testFinalOptionsOverrideLocation(): void
    {
        $serviceLocation = 'bar';
        $customOptions = ['location' => 'foo'];
        $factory = new SoapClientFactory($customOptions);

        $value = $factory->finalSoapOptions($serviceLocation)['location'];
        $this->assertSame($serviceLocation, $value);
    }

    public function testCreateCallsCreateSoapClientWithOptionsUsingFinalOptions(): void
    {
        $factory = new class () extends SoapClientFactory {
            /** @var array<string, mixed> */
            public $spyOptions;

            protected function createSoapClientWithOptions(array $options): SoapClient
            {
                $this->spyOptions = $options;
                return parent::createSoapClientWithOptions($options);
            }
        };

        $finalOptions = $factory->finalSoapOptions('x-location');
        $factory->create('x-location');

        $this->assertSame($finalOptions, $factory->spyOptions);
    }
}
