# phpcfdi/sat-estado-cfdi-soap

## Proyecto archivado

Este proyecto ha sido archivado en favor de [`phpcfdi/sat-estado-cfdi`](`https://github.com/phpcfdi/sat-estado-cfdi`) versión 2.
Las características de este proyecto han sido integradas en `phpcfdi/sat-estado-cfdi`, por lo tanto, este proyecto no es mantenido a partir de 2024-03-06.
Si implementaste la versión 1 de `phpcfdi/sat-estado-cfdi` y `phpcfdi/sat-estado-cfdi-soap` entonces puedes seguir la guía de actualización en <https://github.com/phpcfdi/sat-estado-cfdi/blob/main/docs/UPGRADE_v1_v2.md> para actualizar tu código.

> Consulta el estado de un CFDI en el webservice del SAT usando SOAP (sin WSDL)

:us: The documentation of this project is in spanish as this is the natural language for intended audience.

:mexico: La documentación del proyecto está en español porque ese es el lenguaje principal de los usuarios.

Esta librería contiene objetos para consumir el **Servicio de Consulta de CFDI del SAT** usando SOAP.

Esta librería provee un objeto **`SoapConsumerClient`** que se usa en `\PhpCfdi\SatEstadoCfdi\Consumer`
de la librería [`phpcfdi/sat-estado-cfdi`](https://github.com/phpcfdi/sat-estado-cfdi).

La implementación utiliza SOAP de PHP (ext-soap) y configura el cliente y la llamada para no usar
el archivo WSDL porque el servicio del SAT ya no lo ofrece.

## Instalación

Usa [composer](https://getcomposer.org/)

```shell
composer require phpcfdi/sat-estado-cfdi-soap
```

## Ejemplo básico de uso

```php
<?php
declare(strict_types=1);

use PhpCfdi\SatEstadoCfdi\Consumer;
use PhpCfdi\SatEstadoCfdi\Soap\SoapConsumerClient;

// crear la instancia básica del Cliente Soap para el consumidor
$client = new SoapConsumerClient();

// creamos el consumidor con nuestro cliente
$consumer = new Consumer($client);

// consumimos el webservice!
$response = $consumer->execute('...expression');

// usamos el resultado
if ($response->cancellable()->isNotCancellable()) {
    echo 'CFDI no es cancelable';
}
```

### Opciones de construcción

La clase `\SoapClient` de PHP ofrece muchas opciones para su construcción que puedes consultar en
<https://www.php.net/manual/en/soapclient.soapclient.php>.

Esta librería provee un método básico de construcción usando la clase `SoapClientFactory` con lo que
podrás modificar algunos aspectos de la creación de `\SoapClient` que se usa dentro de `SoapConsumerClient`.

Los **parámetros que no puedes modificar** son: `location`, `uri`, `style`, `use` y `soap_version`.

Por omisión los objetos se crean con los parámetros modificables `exceptions: true` y `connection_timeout: 10`.

Para crear un objeto `\SoapClient` con tus parámetros debes entonces utilizar la clase `SoapClientFactory`, por ejemplo:

```php
<?php
declare(strict_types=1);

use PhpCfdi\SatEstadoCfdi\Soap\SoapConsumerClient;
use PhpCfdi\SatEstadoCfdi\Soap\SoapClientFactory;
use PhpCfdi\SatEstadoCfdi\Consumer;

// creamos la fábrica dándole los parámetros de los objetos \SoapClient que fabricará
$factory = new SoapClientFactory([
    'user_agent' => 'Mozilla/5.0 (X11; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0'
]);

// le pasamos la fábrical al cliente
$client = new SoapConsumerClient($factory);

// creamos el consumidor del servicio para poder hacer las consultas
$consumer = new Consumer($client);
```

## Compatibilidad

Esta librería se mantendrá compatible con al menos la versión con
[soporte activo de PHP](https://www.php.net/supported-versions.php) más reciente.

También utilizamos [Versionado Semántico 2.0.0](docs/SEMVER.md) por lo que puedes
usar esta librería sin temor a romper tu aplicación.

## Contribuciones

Las contribuciones con bienvenidas. Por favor lee [CONTRIBUTING][] para más detalles
y recuerda revisar el archivo de tareas pendientes [TODO][] y el archivo [CHANGELOG][].

## Copyright and License

The `phpcfdi/sat-estado-cfdi-soap` library is copyright © [PhpCfdi](https://www.phpcfdi.com/)
and licensed for use under the MIT License (MIT). Please see [LICENSE][] for more information.

[contributing]: https://github.com/phpcfdi/sat-estado-cfdi-soap/blob/main/CONTRIBUTING.md
[changelog]: https://github.com/phpcfdi/sat-estado-cfdi-soap/blob/main/docs/CHANGELOG.md
[todo]: https://github.com/phpcfdi/sat-estado-cfdi-soap/blob/main/docs/TODO.md
[license]: https://github.com/phpcfdi/sat-estado-cfdi-soap/blob/main/LICENSE
