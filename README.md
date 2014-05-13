DOM Hunter
===
Toolkit PHP para explorar una respuesta HTML / Document Object Model (DOM) en busca de objetos. Ayuda a realizar descubrimiento de contenido como para hacer webscraping, construir APIs a partir de aplicaciones web existentes.
DOM Hunter permite especificar distintas presas que será cazadas en una URL o código HTML destino. La librería contiene un repositorio de características que típicamente querrían encontrarse en una respuesta HTML para construir APIs (fechas, identificadores, palabras clave, etc). DOM Hunter hace uso de la navegación del DOM y expresiones regulares para cazar las presas. Así funciona:

 1. El usuario crea una instancia de DOMHunter indicando las opciones adicionales como headers, emular un browser/dispositivo, petición POST/GET, etc.
 2. Se agregan los elementos a buscar (las presas) a la instancia de DOMHunter.
 3. Se llama el método `hunt()`.
 4. La librería hace una petición cURL al objetivo (o se puede settear directamente un string con el HTML) y limpia el DOM, después lo distribuye a objetos para que busquen las presas.
 5. Se obtiene un array con los resultados en los índices especificados.

DOM Hunter no es un web scrapper porque no puede simular actividad de un usuario como clicks, timeouts, etc. Se limita a buscar todos los nodos Text de la respuesta y usar expresiones regulares para encontrar los elementos aunque cambie la estructura del DOM.
 
## Presas (objetos que encuentra)

- KeyValue
- IdUnico
- NodoDom
- Tabla

### Ejemplo aplicable a Estafeta

```php
$params_peticion = array(
    'idioma' => 'es',
    'dispatch' => 'doRastreoInternet'
    'guias' = '3563581975';
    'tipoGuia' = 'ESTAFETA';
);

$hunter = new DomHunter('http://rastreo3.estafeta.com/RastreoWebInternet/consultaEnvio.do', 1);
$hunter->arrParamsPeticion = $params_peticion;

$presas = array();
$presas[] = array('numero_guia', new KeyValue('numero de guia'));
$presas[] = array('codigo_rastreo', new KeyValue('digo de rastreo'));
$presas[] = array('origen', new KeyValue('origen'));
$presas[] = array('destino', new KeyValue('destino', TRUE, TRUE));
$presas[] = array('cp_destino', new IdUnico(5, 'num'));
$presas[] = array('servicio', new KeyValue('entrega garantizada', FALSE));
$presas[] = array('estatus', new NodoDom(array('find' => '.respuestasazul'), 'plaintext', 1));
$presas[] = array('fecha_recoleccion', new KeyValue('fecha de recoleccion'));
$presas[] = array('fecha_programada', new KeyValue('de entrega', TRUE, TRUE));
$presas[] = array('fecha_entrega', new KeyValue('Fecha y hora de entrega'));
$presas[] = array('tipo_envio', new KeyValue('tipo de envio'));
$presas[] = array('peso', new KeyValue('Peso kg'));
$presas[] = array('peso_vol', new KeyValue('Peso volumétrico kg'));
$presas[] = array('recibio', new KeyValue('recibi'));
$presas[] = array('dimensiones', new KeyValue('Dimensiones cm'));
$columnas = array('fecha', 'lugar_movimiento', 'comentarios');
$presas[] = array('historial', new Tabla(array('ocurrencia' => -1), $columnas, 3));
$hunter->arrPresas = $presas;

$resultados = $hunter->hunt(); # Arreglo con los resultados, puede ir directísimo a Mongodb
```
### Ejemplo Correos de México
### Ejemplo Tránsito DF (Infracciones)
```php

$hunter = new DomHunter('http://www.finanzas.df.gob.mx/sma/detallePlaca.php?placa=912TER');

$presas = array();
$presas[] = array('folio', new IdUnico(11, 'num'));
$presas[] = array('situacion', new KeyValue('pagada', FALSE));
$presas[] = array('motivo', new KeyValue('Motivo'));
$presas[] = array('fundamento', new KeyValue('Fundamento'));
$presas[] = array('sancion', new KeyValue('as de salario m', FALSE));
$hunter->arrPresas = $presas;
$hunted = $hunter->hunt();
```
### Ejemplo AICM
```php
$hunter = new DomHunter('http://www.aicm.com.mx/en/flights?da=a&in=n');

$columnas = array('origin', 'airline', 'flight', 'time', 'status', 'gate', 'terminal');
$presas[] = array('llegadas', new Tabla(array('ocurrencia' => 1), $columnas));

$hunter->arrPresas = $presas;
$resultados = $hunter->hunt();
```
### Ejemplo Obligaciones IFAI (Contratos)
```php
$hunter = new DomHunter('http://portaltransparencia.gob.mx/pot/contrataciones/consultarContrato.do?method=consultaContrato&id.idContrato=130767&_idDependencia=12220');

$presas = array();
$presas[] = array('sector_presupuestal', new KeyValue('SECTOR PRESUPUESTAL'));
$presas[] = array('siglas', new KeyValue('SIGLAS'));
$presas[] = array('fecha_actualizacion', new KeyValue('Última fecha de actualizaci'));
$presas[] = array('numero_contrato', new KeyValue('mero de Contrato'));
$presas[] = array('unidad_administrativa', new KeyValue('Unidad administrativa que celebr'));
$presas[] = array('procedimiento_contratacion', new KeyValue('Procedimiento de contrataci'));
$presas[] = array('denominacion_asignado', new KeyValue('n social de la persona moral a que se asig'));
$presas[] = array('fecha_contrato', new KeyValue('Fecha de celebraci'));
$presas[] = array('objeto_contrato', new KeyValue('Objeto de contrato'));
$presas[] = array('monto_contrato', new KeyValue('Monto del contrato'));
$presas[] = array('moneda', new KeyValue('Tipo de Moneda'));
$presas[] = array('fecha_inicio', new KeyValue('Fecha de inicio del contrato'));
$presas[] = array('fecha_fin', new KeyValue('Fecha de terminaci'));
$presas[] = array('documento', new KeyValue('Documento del Contrato'));

$hunter->arrPresas = $presas;
$hunted = $hunter->hunt();
```
### Ejemplo ADN Político

## Pruebas

Tanto para hacer las peticiones como para parsear los resultados, Dom Hunter basa sus pruebas en las siguientes apps:

- Estafeta
- Correos de México
- Tránsito del DF
- Aeropuerto del DF
- Portal Obligaciones Transparencia del IFAI
- ADN Político

En los archivos `doc/output[NOMBRE_SERVICIO].md` están los headers HTTP completos de las peticiones para cuando se tenga que emular otro dispositivo, enviar cookies y otras truculencias headeriles.

TODO:
http://rastreo2.estafeta.com/ShipmentPickUpWeb/actions/pickUpOrder.do?method=doGetPickUpOrder&forward=toPickUpInfo&idioma=es&pickUpId=8000000
