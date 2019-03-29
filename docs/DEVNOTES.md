# Notas de desarrollo

He visto que es posible crear una clase que extiende `\SoapClient` y que en lugar de dejar que se haga
la llamada HTTP por la extensión `ext-soap` se haga utilizando un cliente de tu elección.

Tal vez sea posible crear la librería `phpcfdi/http-soapclient` con la que, al usar este objeto, se puedan
desviar las llamadas hacia un cliente de tipo `Psr\Http\Client\ClientInterface`.
