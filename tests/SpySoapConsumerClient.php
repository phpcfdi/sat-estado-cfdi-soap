<?php

declare(strict_types=1);

namespace PhpCfdi\SatEstadoCfdi\Tests\Soap;

use PhpCfdi\SatEstadoCfdi\Soap\SoapConsumerClient;
use SoapClient;
use stdClass;

class SpySoapConsumerClient extends SoapConsumerClient
{
    /** @var SoapClient */
    public $lastSoapClient;

    /** @var array */
    public $lastArguments;

    /** @var array */
    public $lastOptions;

    /** @var stdClass|array|false */
    public $callConsultaReturn;

    /**
     * @param stdClass|array|false $callConsultaReturn
     */
    public function __construct($callConsultaReturn)
    {
        parent::__construct();
        $this->callConsultaReturn = $callConsultaReturn;
    }

    protected function callConsulta(SoapClient $soapClient, array $arguments, array $options)
    {
        $this->lastSoapClient = $soapClient;
        $this->lastArguments = $arguments;
        $this->lastOptions = $options;

        return $this->callConsultaReturn;
    }
}
