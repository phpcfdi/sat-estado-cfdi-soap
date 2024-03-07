# CHANGELOG

## Acerca de SemVer

Usamos [Versionado Semántico 2.0.0](SEMVER.md) por lo que puedes usar esta librería sin temor a romper tu aplicación.

## Proyecto archivado

Este proyecto ha sido archivado en favor de [`phpcfdi/sat-estado-cfdi`](`https://github.com/phpcfdi/sat-estado-cfdi`) versión 2.
Las características de este proyecto han sido integradas en `phpcfdi/sat-estado-cfdi`, por lo tanto, este proyecto no es mantenido a partir de 2024-03-06.
Si implementaste la versión 1 de `phpcfdi/sat-estado-cfdi` y `phpcfdi/sat-estado-cfdi-soap` entonces puedes seguir la guía de actualización en <https://github.com/phpcfdi/sat-estado-cfdi/blob/main/docs/UPGRADE_v1_v2.md> para actualizar tu código.

### Mantenimiento 2023-02-27

Esta es una actualización de mantenimiento que no genera una nueva liberación de código.

- Se actualiza el año en la licencia. ¡Feliz 2023!
- Se actualiza la configuración de estilo de código a la utilizada por otros proyectos de phpCfdi.
- Se corrige la insignia `badge-build`.
- Se corrige la liga al proyecto en la guía de contribución.
- En los flujos de trabajo de integración continua:
  - Se agrega PHP 8.2 a la matriz de pruebas
  - Los trabajos se ejecutan en PHP 8.2
  - Se actualizan las acciones de GitHub a la versión 3.
  - Se sustituye la directiva `::set-output` por `$GITHUB_OUTPUT`.
  - Se elimina la instalación de `composer` donde no es necesaria.
  - Se agrega el evento `workflow_dispatch`.
- Se actualizan las herramientas de desarrollo.

## Listado de cambios

### Version 1.0.3 2022-02-22

- Se actualiza el año en el archivo de licencia. Feliz 2022.
- Se corrige el grupo de mantenedores de phpCfdi.
- Se actualizan las dependencias de desarrollo.
- Se corrige el archivo de configuración de Psalm porque el atributo `totallyTyped` está deprecado.
- Se actualiza la dependencia de desarrollo `phpcfdi/cfdi-expresiones:^3.0`.
- Se deja de utilizar Scrutinizer CI. Gracias Scrutinizer CI.
- El flujo de integración continua se cambia de pasos a trabajos.
- Se agrega la integración con *sonarcloud*.

### Version 1.0.2 2021-11-04

- Se actualiza la dependencia `phpcfdi/sat-estado-cfdi:^1.0.2`.
- Se corrige el nombre del archivo de configuración de PHPStan en los archivos excluidos del paquete de distribución.

### Version 1.0.1 2021-09-03

- La versión menor de PHP es 7.3.
- Se actualiza PHPUnit a 9.5.
- Se migra de Travis-CI a GitHub Workflows. Gracias Travis-CI.
- Se instalan las herramientas de desarrollo usando `phive` en lugar de `composer`.
- Se agregan revisiones de `psalm` e `infection`.
- Se cambia la rama principal a `main`.

### Version 1.0.0 2021-01-10

- A partir de esta versión se ha puesto la documentación del proyecto en español.
- Se garatiza la compatibilidad con PHP 8.0.
- Dependencia con `phpcfdi/sat-estado-cfdi:^1.0.0`.

## Version 0.2.2 2021-01-08

- Add support for PHP 8.0.
- Upgrade to PHPStan 0.12.
- Change ownership from Carlos C Soto to PhpCfdi.
- Update documentation: Fix README badges, contributing build instructions, etc.
- Update settings on Travis-CI and Scrutinizer.
- Remove PHPLint.

## Version 0.2.1 2019-05-16

- Change dependence versions `phpcfdi/sat-estado-cfdi: ^0.6.1|^0.7.0`.
  See <https://github.com/phpcfdi/sat-estado-cfdi/issues/7>
  
## Version 0.2.0 2019-03-29

- Works with `phpcfdi/sat-estado-cfdi:^0.6.0`.
- Increase soap connection timeout from 5 to 10 seconds.
- Fix CONTRIBUTING & other documentation & project files.

## Version 0.1.0 2019-03-28

- Implemented `phpcfdi/sat-estado-cfdi:^0.5.0`.
