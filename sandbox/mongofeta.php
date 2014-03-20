<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<?php
error_reporting(1);
# @todo hash con movimientos, que sea asociativo en dom hunter
$mongofeta = array();
$mongofeta['numero_guia'] = '3208544064715720055515';
$mongofeta['codigo_rastreo'] = '3208544064715720055515';
$mongofeta['origen'] = array('nombre'=>'tijuana', 'latitud'=>32.5149469, 'longitud'=>-117.0382471);
$mongofeta['destino'] = array('nombre'=>'MEXICO D.F.', 'latitud'=>19.4326077, 'longitud'=>-99.133208, 'codigo_postal'=>'01210');
$mongofeta['estatus'] = 'Entregado';
$mongofeta['servicio'] = 'Entrega garantizada dos días hábiles';
$mongofeta['fecha_entrega'] = '12/02/2014 01:01 PM';
$mongofeta['fecha_programada'] = '17/02/2014';
$mongofeta['fecha_recoleccion'] = '07/02/2014 04:43 PM';
$mongofeta['tipo_envio'] = 'PAQUETE';
$mongofeta['recibio'] = 'SDR:JOSE BOLANOS';
$mongofeta['firma_recibido'] = 'http://rastreo3.estafeta.com/RastreoWebInternet/firmaServlet?guia=3208544064715720055515&idioma=es';
$mongofeta['dimensiones'] = array('ancho'=>47, 'alto'=>34, 'largo'=>15);
$mongofeta['peso_kg'] = 11.8;
$mongofeta['peso_volumetrico'] = 4.7;
$mongofeta['movimientos'] = array(array('fecha'=>'12/02/2014 01:01 PM','movimiento'=>'Salida a entrega','comentarios'=>''), array('fecha'=>'11/02/2014 01:01 PM','movimiento'=>'Traslado','comentarios'=>'Comunícarse a 01800'));

echo '<h1>Arreglo con info</h1>';
echo '<pre>';
var_dump($mongofeta);
echo '</pre>';

$conexionMongo = new Mongo();
$mongodb = $conexionMongo->estafetapi; # == $mongodb = $conexionMongo->selectDB('estafetapi');
$peticiones = $mongodb->peticiones;

# Prueba 1 - Insert con Id asignado automáticamente por mongonidibi
# $peticiones->save($mongofeta); # $peticiones->insert($mongofeta) también furula

# Prueba 2 - Save con Id asignado manualmente antes de guardar en mongonidibi
$mongofeta['_id'] = $mongofeta['codigo_rastreo'];
$peticiones->save($mongofeta);

# Prueba 3 - Save con Id asignado manualmente con uno anteriormente insertado en la bd
# @todo ver porqué no furula, siempre genera uno nuevo aunque se asigna id existente,
$mongofeta['_id'] = new MongoId('532a4d874d5fa33c08000000');
$mongofeta['prueba_3'] = rand();
$peticiones->save($mongofeta);

# Prueba 4 - Update
$peticiones->update(array('_id'=>new MongoId('532a4d874d5fa33c08000000')),array('$set'=> array('prueba_4'=>rand())));

# Hasta aquí genera 3 documentos, 4...Inf si se descomenta el primer save (que siempre genera un doc nuevo)
# porque no se especifica un _id
