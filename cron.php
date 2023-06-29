<?php
require_once(dirname(__FILE__).'/lib/helpers.php');

function cex_cron_ejecutar()
{

	global $wpdb;
	$nombreTabla = $wpdb->prefix.'cex_savedships';
	$opciones = cex_cron_customer_options(); 	    
	$tracking = $opciones['MXPS_TRACKINGCEX'];
	$hora_inicial           = date('d-m-Y H:i:s'); 

	generarLog("Comenzamos ejecucion Cron -> $hora_inicial",true);
	file_put_contents(dirname(__FILE__)."/log/log_rest.txt","",LOCK_EX);
	file_put_contents(dirname(__FILE__)."/log/log_ordenes.txt","",LOCK_EX);


	if ($tracking == 'true') {

		$codigos_cliente = $wpdb->get_results($wpdb->
		prepare("SELECT distinct p2.codigo_cliente 
		FROM (SELECT  id_order, MAX(id_ship) AS id
				FROM $nombreTabla
				WHERE TYPE = 'Envio'
				GROUP BY id_order 
				ORDER BY id_ship DESC) p1 
		JOIN $nombreTabla p2 
		ON p1.id = p2.id_ship 
		WHERE TIMESTAMPDIFF(MONTH, updated_at, NOW()) < 1
		AND numship !=''
		AND (WS_ESTADO_TRACKING != 12 && 
		WS_ESTADO_TRACKING != 13 && 
		WS_ESTADO_TRACKING != 14 && 
		WS_ESTADO_TRACKING != 15 && 
		WS_ESTADO_TRACKING != 16 && 
		WS_ESTADO_TRACKING != 17 && 
		WS_ESTADO_TRACKING != 19 && 
		WS_ESTADO_TRACKING != 31)
		AND p2.deleted_at is null
        ORDER BY id_ship ASC
        LIMIT 500"));  
		
		file_put_contents(dirname(__FILE__)."/log/log_rest.txt", print_r($codigos_cliente,true).PHP_EOL,FILE_APPEND);


		foreach ($codigos_cliente as $codigo_cliente) {
			file_put_contents(dirname(__FILE__)."/log/log_rest.txt", print_r($codigo_cliente,true).PHP_EOL,FILE_APPEND);

			$ordenes = $wpdb->get_results($wpdb->
			prepare("SELECT p2.* 
			FROM (SELECT id_order, MAX(id_ship) AS id
					FROM $nombreTabla
					WHERE TYPE = 'Envio'
					GROUP BY id_order 
					ORDER BY id_ship DESC) p1 
			JOIN $nombreTabla p2 
			ON p1.id = p2.id_ship 
			WHERE TIMESTAMPDIFF(MONTH, updated_at, NOW()) < 1
			AND numship !=''
			AND (WS_ESTADO_TRACKING != 12 && 
			WS_ESTADO_TRACKING != 13 && 
			WS_ESTADO_TRACKING != 14 && 
			WS_ESTADO_TRACKING != 15 && 
			WS_ESTADO_TRACKING != 16 && 
			WS_ESTADO_TRACKING != 17 && 
			WS_ESTADO_TRACKING != 19 && 
			WS_ESTADO_TRACKING != 31)
			AND p2.codigo_cliente = '".$codigo_cliente->codigo_cliente."'
			AND p2.deleted_at is null
	        ORDER BY id_ship ASC
	        LIMIT 500"));  

			file_put_contents(dirname(__FILE__)."/log/log_rest.txt", print_r($ordenes,true).PHP_EOL,FILE_APPEND);         
			
			$hora_inicial = date('d-m-Y H:i:s');
			$rest=cex_enviar_peticion_tracking_rest($ordenes); 	
				
			file_put_contents(dirname(__FILE__)."/log/log_rest.txt", print_r($rest,true).PHP_EOL,FILE_APPEND);         
			
			$retorno=cex_procesar_curl_cron($rest);        
			$retorno = json_decode($retorno);
			
			file_put_contents(dirname(__FILE__)."/log/log_ordenes.txt", print_r($retorno,true).PHP_EOL, FILE_APPEND);
			
			foreach ($retorno->listaEnvios as $orden) {
				cex_procesar_orden_tracking_rest($orden, $opciones);
			}       
		}

	}   

	generarLog("\t LA EJECUCIÓN DEL CRON HA ACABADO"); 
	$table = $wpdb->prefix.'cex_history';
	$historico_borrar = $wpdb->get_results($wpdb->prepare("DELETE FROM $table 
		WHERE id not 
		in (
		SELECT * FROM (
		SELECT id 
		FROM $table 
		ORDER BY id 
		desc limit 0, 500) 
		as t)", null));
}


function cex_procesar_orden_tracking_rest($pedido,$opciones)
{
	global $wpdb;        
	$nombreTabla = $wpdb->prefix.'cex_savedships';
	$id_orden = cex_obtener_order_id_from_numShip($pedido->nEnvio);          
          
	$numship  = $pedido->nEnvio;          

	$cambiar_estado = $opciones['MXPS_CHANGESTATUS'];
	$respuesta_tracking = $pedido->codigoEstado;
	$order= new WC_Order($id_orden);           

	/*
	if($respuesta_tracking==1/*
		$order->update_status($opciones['MXPS_RECORDSTATUS']);
		generarLog("\n\tEstado de la orden -> $id_orden ha cambiado a -> Sin recepcionar \n"); 
		echo "Estado de la orden => ".$id_orden." ha cambiado a => Sin recepcionar<br>";           
		actualizar_estado_savedShips($numship,$respuesta_tracking,'Grabado');

   }else
   */


   if (estaEnCurso($respuesta_tracking) == true) {
   // ESTADO ENVIADO CEX
	   if ($cambiar_estado==true) {    
		   $order->update_status($opciones['MXPS_SENDINGSTATUS']);
		   generarLog("\n\tEstado de la orden -> $id_orden ha cambiado a -> Enviado\n");
		   echo "Estado de la orden => ".$id_orden." ha cambiado a => Enviado<br>";
		   actualizar_estado_savedShips($numship,$respuesta_tracking,'Enviado');
          
	   }
   }elseif (esAnulado($respuesta_tracking) == true){ 
   // ESTADO ANULADO CEX
	   if ($cambiar_estado==true) {    
			$order->update_status($opciones['MXPS_CANCELEDSTATUS']);
			generarLog("\n\tEstado de la orden -> $id_orden ha cambiado a -> Cancelado\n");
			echo "Estado de la orden => ".$id_orden." ha cambiado a => Cancelado <br>";
			actualizar_estado_savedShips($numship,$respuesta_tracking,'Anulado');          
	   }
	   
   } elseif ($respuesta_tracking ==17) {        
	   // ESTADO DEVUELTO CEX
	   if ($cambiar_estado==true) {      
		   $order->update_status($opciones['MXPS_RETURNEDSTATUS']);
		   generarLog("\n\tEstado de la orden -> $id_orden ha cambiado a -> Devuelto\n");
		   echo "estado de la orden => ".$id_orden." ha cambiado a => Devuelto<br>";
		   actualizar_estado_savedShips($numship,$respuesta_tracking,'Devuelto');        
	   }
	   
   } elseif ($respuesta_tracking==12) {
	   //COMPLETADO CEX
	   if ($cambiar_estado==true) {     
		   $order->update_status($opciones['MXPS_DELIVEREDSTATUS']);
		   generarLog("\n\tEstado de la orden -> $id_orden ha cambiado a -> Completado\n");
		   echo "estado de la orden => ".$id_orden." ha cambiado a => Completado<br>";  
		   actualizar_estado_savedShips($numship,$respuesta_tracking,'Entregado');        
	   }
	   
   }else{
	   generarLog("\tEstado de la orden -> $id_orden no ha cambiado \n");
	   echo "estado de la orden => ".$id_orden." no ha cambiado"; 
   }

   $order->save();
}


function esAnulado($respuesta_tracking)
{
	$flag = false;
	$arrayAnulados = array(13,14,15,16,19,31);        
    return array_search($respuesta_tracking, $arrayAnulados);
}

function estaEnCurso($respuesta_tracking)
{
	$flag = false;
	$arrayEnCurso = array(2,3,4,5,6,7,8,9,10,11,18,20,21,22,23,24,25,26,27,28,29,30,32,33,34,35,36,37,38,39,40,41,42);        
	return array_search($respuesta_tracking, $arrayEnCurso);
}


function cex_procesar_curl_cron($peticion, $usuario=false, $password=false)
{
	$credenciales;
	if(!$usuario && !$password)
		$credenciales = get_user_credentials();
	else{
		$credenciales =  array();
		$credenciales['usuario'] = $usuario;
		$credenciales['password'] = $password;
	}  

    // iniciamos y componemos la peticion curl
	$header = array("Charset=\"utf-8\"",
		"Accept"         => "application/json",            
		"Cache-Control"  => "no-cache",
		"Pragma"         => "no-cache",
		"Content-Type"   => "application/json",
		"Content-length" => strlen($peticion['peticion']),
		"Authorization"  => "Basic " . base64_encode( $credenciales['usuario'] . ":" . $credenciales['password'] )
	);     


	$options    = array(
		CURLOPT_RETURNTRANSFER  => 1,

		CURLOPT_SSL_VERIFYPEER  => false,
		CURLOPT_USERAGENT       => 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0)',
		CURLOPT_URL             => $peticion['url'] ,
		CURLOPT_USERPWD         => trim($credenciales['usuario']).":".trim($credenciales['password']),
		CURLOPT_POST            => true ,                    
		CURLOPT_POSTFIELDS      => $peticion['peticion'],
		CURLOPT_BINARYTRANSFER  => 1,

		'headers'               => $header,        
		'body'                  => $peticion['peticion']
	);   

	$output = wp_remote_retrieve_body(wp_remote_post( $peticion['url'],$options));
	return $output;
}


function cex_enviar_peticion_tracking_rest($ordenes)
{
    //coger la url de BBDD

	global $wpdb;
	$table = $wpdb->prefix.'cex_customer_options';
	$column  = 'MXPS_WSURLSEG_REST';
	$url = $wpdb->get_var(" SELECT valor
		FROM $table 
		WHERE clave = '$column'");

	$codigo_cliente = str_pad($ordenes[0]->codigo_cliente, 9 , '0', STR_PAD_LEFT);
	$codigo_cliente = substr($codigo_cliente, 0,5);
	$rest_request = array(
		"codigoCliente"     => $codigo_cliente,
		"nEnvios"           => [],
		"idioma"            => "ES"
	);

    //lista de envios a comprobar
	$lista = array();  
	foreach ($ordenes as $orden) {
		$numship = trim($orden->numship);
		if($numship != ""){
			array_push($lista, $numship);
		}
	}  

	$rest_request['nEnvios'] = $lista;
	$retorno = [
		'peticion' => json_encode($rest_request),
		'url'  => $url
	];    
	
	return $retorno;
}

function cex_cron_customer_options()
{
	$retorno;
	global $wpdb;
    // buscar los estados sobre los que desencadenamos acciones.
	$table = $wpdb->prefix.'cex_customer_options';
	$results = $wpdb->get_results($wpdb->prepare("SELECT clave, valor 
		FROM $table 
		WHERE clave 
		in ('MXPS_TRACKINGCEX',
		'MXPS_SENDINGSTATUS',
		'MXPS_CANCELEDSTATUS',
		'MXPS_CHANGESTATUS',
		'MXPS_RETURNEDSTATUS',
		'MXPS_DELIVEREDSTATUS',
		'MXPS_RECORDSTATUS')",
		null));        
	foreach ($results as $result) {
		$variable = $result;
		$valor = $variable->valor;
		$retorno[$variable->clave] = $variable->valor;
	}
	return $retorno;

}

	function generarLog($mensaje, $lock=false)
	{	$path = dirname(__FILE__)."/log/log_cron_function.txt";
		if($lock == true){
			file_put_contents($path, $mensaje.PHP_EOL, LOCK_EX);
		} else{
			file_put_contents($path, $mensaje.PHP_EOL, FILE_APPEND);
		}
		
		
	}

	function cex_obtener_order_id_from_numShip($numship)
	{
		global $wpdb;
		$table = $wpdb->prefix.'cex_savedships';        
		$valor = $wpdb->get_var("SELECT id_order
			FROM $table
			WHERE numship= '$numship'");
		return $valor;
	}

    function actualizar_estado_savedShips($num_ship,$respuesta_tracking,$status)
    {
		global $wpdb;        
		$nombreTabla = $wpdb->prefix.'cex_savedships';
		
		$savedship['WS_ESTADO_TRACKING'] = $respuesta_tracking;
		$savedship['status'] = $status;
		$savedship['updated_at'] = date("Y-m-d H:i:s");   
		$where =[
			'type'=> 'Envio',
			'numship'=> $num_ship,

		];
		$wpdb->update($nombreTabla, $savedship, $where);
         
    }


?>
