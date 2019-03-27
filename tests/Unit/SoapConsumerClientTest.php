<?php

declare(strict_types=1);

namespace PhpCfdi\SatEstadoCfdi\Tests\Soap\Unit;

use PhpCfdi\SatEstadoCfdi\Soap\SoapClientFactory;
use PhpCfdi\SatEstadoCfdi\Soap\SoapConsumerClient;
use PhpCfdi\SatEstadoCfdi\Tests\Soap\SpySoapConsumerClient;
use PhpCfdi\SatEstadoCfdi\Tests\Soap\TestCase;

class SoapConsumerClientTest extends TestCase
{
    public function testConsumerClientCanBeCreatedWithoutArguments(): void
    {
        $client = new SoapConsumerClient();
        $this->assertInstanceOf(SoapClientFactory::class, $client->getSoapClientFactory());
    }

    public function testConsumerClientCanBeCreatedWithSoapclientFactory(): void
    {
        $factory = new SoapClientFactory();
        $client = new SoapConsumerClient($factory);
        $this->assertSame($factory, $client->getSoapClientFactory());
    }

    public function testConsumeReceivingFalseAsResponse(): void
    {
        $callReturn = false;
        $client = new SpySoapConsumerClient($callReturn);

        $response = $client->consume('serviceUri', 'expression');
        $this->assertSame('', $response->get('EstadoConsulta'));
    }

    public function testConsumeReceivingArrayAsResponse(): void
    {
        $callReturn = ['EstadoConsulta' => 'X - dummy!'];
        $client = new SpySoapConsumerClient($callReturn);

        $response = $client->consume('serviceUri', 'expression');
        $this->assertSame('X - dummy!', $response->get('EstadoConsulta'));
    }

    public function testConsumeReceivingStdclassAsResponse(): void
    {
        $callReturn = (object) ['EstadoConsulta' => 'X - dummy!'];
        $client = new SpySoapConsumerClient($callReturn);

        $response = $client->consume('serviceUri', 'expression');
        $this->assertSame('X - dummy!', $response->get('EstadoConsulta'));
    }
}
