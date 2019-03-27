<?php

declare(strict_types=1);

namespace PhpCfdi\SatEstadoCfdi\Tests\Soap\Compliance;

use PhpCfdi\SatEstadoCfdi\ComplianceTester\ComplianceTester;
use PhpCfdi\SatEstadoCfdi\Soap\SoapConsumerClient;
use PhpCfdi\SatEstadoCfdi\Tests\Soap\TestCase;

class ComplianceTest extends TestCase
{
    public function testCompliance(): void
    {
        $client = new SoapConsumerClient();
        $tester = new ComplianceTester($client);
        $this->assertTrue($tester->runComplianceTests());
    }
}
