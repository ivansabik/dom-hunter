DOM Hunter
===

Toolkit to crawl the Document Object Model (DOM) of static pages obtained via HTTP requests and work with native PHP objects. This is mainly intended for creating custom APIs. The way it works:

DOM Hunter allows to specify different fields (pray characteristics) that will then be hunted thru the DOM jungle. DOM Hunter has a repository of different data fields that could typically appear in a DOM from an HTML file and then uses regular expressions to search for them. API Hunter then returns an object with the results according to a specified class or just a simple generic PHP object.

 1. El usuario crea una instancia de DOMHunter indicando las opciones adicionales como headers, emular un browser/dispositivo, petición POST/GET, etc.
 2. Se agregan los elementos a buscar (las presas) a la instancia de DOMHunter.
 3. Se llama el método hunt(), se puede indicar la clase a poblar con los resultados, ej hunt('ClasePHPParaResultados').
 4. La librería hace una petición cURL al objetivo y limpia el DOM, después lo distribuye a objetos para que busquen las presas.
 5. Se obtiene un objeto genérico o la clase especificada con los resultados :-)


Ejemplo aplicable a Estafeta

<pre>
$hunter = new DOMHunter();
$hunter->target = 'http://rastreo3.estafeta.com/RastreoWebInternet/consultaEnvio.do';
$hunter->requestType = 'POST';
$hunter->params = array('tipoGuia' => 'REFERENCE', 'guias' => '2715597604');

$arrayPresas = array();
$arrayPresas[] = array('numero_guia', new UniqueId(10, 'int')); // Número de guía
$arrayPresas[] = array('codigo_rastreo', new UniqueId(20, 'int'); // Código de rastreo
$arrayPresas[] = array('origen', new Regexp('zona '); // Origen
$arrayPresas[] = array('cp_destino', new UniqueId(4, int); // CP Destino
$arrayPresas[] = array('servicio', new OptionSet(array('Entrega garantizada al segundo día hábil','Entrega garantizada al tercer día hábil')); // Servicio
$arrayPresas[] = array('estatus', new OptionSet(array('ENTREGADO')); // Estatus
$arrayPresas[] = array('fecha_entrega', new PreyDate('dd/mm/yyyy hh:mm AMPM'); // Fecha y Hora de entrega
$arrayPresas[] = array('tipo_envio', new OptionSet(array('PAQUETE')); // Tipo de envío

$hunter.addPreyElements($arrayPresas);

$resultados = $hunter.hunt();

Ejemplo aplicable a Tránsito DF (Infracciones)

Ejemplo aplicable a AICM

</pre>

Outputs para pruebas
===

Aquí están las respuestas de los servicios que nos interesan para construir APIs externas. Probamos con las siguientes apps:

Estafeta
Correos de México
Tránsito del DF

En los archivos <pre>output...</pre> están los headers HTTP completos de las peticiones para cuando se tenga que emular otro dispositivo, enviar cookies y otras truculencias headeriles.


Regexp
-----------



PreyDate
-----------



TextNode
-----------



UniqueId
-----------



Image
-----------



Keywords
-----------



Link
-----------



OptionSet
-----------



Table
-----------
