DOM Hunter
===
Librería PHP para parsear un Document Object Model (DOM) en busca de objetos. Ayuda a construir APIs a partir de aplicaciones web existentes pero seguramente le pueden encontrar algún otro uso interesante.

DOM Hunter permite especificar distintas "presas" que será cazadas en una URL o código HTML destino. La librería contiene un repositorio de características que típicamente querrían encontrarse en una respuesta HTML para construir APIs (fechas, identificadores, palabras clave, etc). DOM Hunter hace uso de la navegación del DOM y expresiones regulares para cazar las presas. Así funciona:

 1. El usuario crea una instancia de DOMHunter indicando las opciones adicionales como headers, emular un browser/dispositivo, petición POST/GET, etc.
 2. Se agregan los elementos a buscar (las presas) a la instancia de DOMHunter.
 3. Se llama el método `hunt()`.
 4. La librería hace una petición cURL al objetivo (o se puede settear directamente un string con el HTML) y limpia el DOM, después lo distribuye a objetos para que busquen las presas.
 5. Se obtiene un array con los resultados en los índices especificados.

DOM Hunter no es un web scrapper, realiza brute-force sobre todos los nodos Text del DOM haciendo uso de expresiones regulares para encontrar los elementos aunque cambie la estructura del DOM.
 
## Presas (objetos que encuentra)

- KeyValue
- IdUnico
- NodoDom

### Ejemplo aplicable a Estafeta

```php
$hunter = new DOMHunter();
$hunter->strObjetivo = 'http://rastreo3.estafeta.com/RastreoWebInternet/consultaEnvio.do';
$hunter->boolPost = 1;
$hunter->params = array('tipoGuia' => 'REFERENCE', 'guias' => '2715597604');
$arrayPresas = array();
$arrayPresas[] = array('numero_guia', new KeyValue('numero de guia'));
$arrayPresas[] = array('codigo_rastreo', new KeyValue('codigo de rastreo'));
$arrayPresas[] = array('origen', new KeyValue('origen'));
$arrayPresas[] = array('destino', new KeyValue('destino', TRUE, TRUE));
$arrayPresas[] = array('cp_destino', new IdUnico(5, 'num'));
$arrayPresas[] = array('servicio', new KeyValue('entrega garantizada', FALSE));
$arrayPresas[] = array('estatus', new NodoDom('.respuestasazul', 'plaintext', 1));
$arrayPresas[] = array('fecha_recoleccion', new KeyValue('fecha de recoleccion'));
$arrayPresas[] = array('fecha_programada', new KeyValue('de entrega', TRUE, TRUE));
$arrayPresas[] = array('fecha_entrega', new KeyValue('Fecha y hora de entrega'));
$arrayPresas[] = array('tipo_envio', new KeyValue('tipo de envio'));
$arrayPresas[] = array('peso', new KeyValue('Peso kg'));
$arrayPresas[] = array('peso_vol', new KeyValue('Peso volumétrico kg'));
//$arrayPresas[] = array('firma_recibido', new NodoDom('img', 'src', 4));
$arrayPresas[] = array('recibio', new KeyValue('recibio'));
$hunter->arrPresas($arrayPresas);
$resultados = $hunter->hunt(); // Arreglo con los resultados
```
### Ejemplo aplicable a Correos de México
### Ejemplo aplicable a Tránsito DF (Infracciones)
### Ejemplo aplicable a AICM
### Ejemplo aplicable a Obligaciones IFAI (Contratos)
### Ejemplo aplicable a ADN Político

## Pruebas

Tanto para hacer las peticiones como para parsear los resultados, Dom Hunter basa sus pruebas en las siguientes apps:

- Estafeta
- Correos de México
- Tránsito del DF
- Aeropuerto del DF
- Portal Obligaciones Transparencia del IFAI
- ADN Político

En los archivos `doc/output[NOMBRE_SERVICIO].md` están los headers HTTP completos de las peticiones para cuando se tenga que emular otro dispositivo, enviar cookies y otras truculencias headeriles.
