<!DOCTYPE html>
<html>
<head lang="es">
	<meta charset="utf-8">
	<title>PING</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
	<?php

		/*
	
			tracert 
			https://internet.com.co/el-ping-y-tracert-que-son-y-para-que-sirven/
			https://internet.com.co/tracert/
			https://support.microsoft.com/es-es/topic/c%C3%B3mo-usar-tracert-para-solucionar-problemas-de-tcp-ip-en-windows-e643d72b-2f4f-cdd6-09a0-fd2989c7ca8e
			https://www.xataka.com/basics/tracert-traceroute-que-como-funciona-como-se-utiliza
			///////////////////////////////////
			https://www.ionos.mx/digitalguide/servidores/herramientas/comando-ping/


			http://www.utez.edu.mx/curriculas/ccna1_ES/CHAPID=knet-1072827537843/RLOID=knet-1072900881750/RIOID=knet-1072900884125/knet/1072827537843/resourcecontent.html

			 Probar la conectividad con ping

			Ping es un programa básico que verifica que una dirección IP particular existe y puede aceptar solicitudes. El acrónimo computacional ping es la sigla para Packet Internet or Inter-Network Groper. El nombre se ajustó para coincidir el término usado en la jerga de submarinos para el sonido de un pulso de sonar que retorna desde un objeto sumergido.

			El comando ping funciona enviando paquetes IP especiales, llamados datagramas de petición de eco ICMP (Internet Control Message Protocol/Protocolo de mensajes de control de Internet) a un destino específico. Cada paquete que se envía es una petición de respuesta. La pantalla de respuesta de un ping contiene la proporción de éxito y el tiempo de ida y vuelta del envío hacia llegar a su destino. A partir de esta información, es posible determinar si existe conectividad a un destino. El comando ping se utiliza para probar la función de transmisión/recepción de la NIC, la configuración TCP/IP y la conectividad de red. Se pueden ejecutar los siguientes tipos de comando ping:

			    ping 127.0.0.1 : Este es un tipo especial de ping que se conoce como prueba interna de loopback. Se usa para verificar la configuración de red TCP/IP.
			    ping direcciónc IP del computador host : Un ping a un PC host verifica la configuración de la dirección TCP/IP para el host local y la conectividad al host.
			    ping dirección IP de gateway por defecto : Un ping al gateway por defecto verifica si se puede alcanzar el router que conecta la red local a las demás redes.
			    ping dirección IP de destino remoto : Un ping a un destino remoto verifica la conectividad a un host remoto.

			Actividad de laboratorio

			Ejercicio práctico: Uso de ping y tracert desde una estación de trabajo

			En esta práctica de laboratorio, el estudiante aprenderá a utilizar el comando Packet Internet Groper de TCP/IP ( ping ) y el comando Traceroute ( tracert ) desde una estación de trabajo.

			Checking the status of the information superhighway using ping and traceroute gateways 		
		*/
		
		##########################################
		#$IP = 'xxx.xxx.xxx.xxx';
		$IP = '10.1.1.20';
		#$IP = 'google.com';
		$res = shell_exec("ping $IP -f");

		if(strpos($res, 'recibidos = 0')){

			//echo "$IP no responde a la solicitud de conexión.";
			$faClass = 'bi-circle-fill text-danger';

		}else{

			//echo "$IP aceptó la solicitud de conexión";
			exec("ping $IP", $output);

			$faClass = 'bi-circle-fill text-primary';
			/*foreach ($output as $x) {

				echo "<pre>";
					print_r($x);
				echo "</pre>";

			}*/
		}

		##################################

		/**
		* Ping via fsockopen()
		*
		* @param host
		* @param int sport
		* @param int $timeout
		* @return bool
		**/

		/*function ping($host, $port=80, $timeout=6){
			$fsock = fsockopen($host, $port, $errno, $errstr, $timeout);
			if(!$fsock){
				return false;
			}else{
				return true;
			}
		}

		# check if the host is up. $host can also be an ip address
		$host = $IP;
		$up = ping($host);

		# optionally display status
		$faClass = ($up) ? 'bi-circle-fill text-primary' : 'bi-circle-fill text-danger';
		echo sprintf('<i class="bi %s"></i> %s', $faClass, $host);*/
	?>

	<div class="container">
		<div class="col">
			<table class="table table-responsive table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>IP</th>
						<th>Estatus</th>
					</tr>					
				</thead>
				<tbody>
					<tr>
						<td>
							Daniel Moises Ruiz Uch
						</td>
						<td>
							<a href="https://10.1.1.38/">10.1.1.38</a>
						</td>
						<td>
							<i class="<?php echo $faClass; ?>"></i>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="col">
			<h1 class="h3">Verificar conexion</h1>
			<p>*Si la ip corresponde a una Intranet es necesario que estes en la misma red para eprevenir falsos negativos*</p>


			<!-- Button trigger modal -->
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
			  Verificar conexion
			</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
						<div class="spinner-grow" role="status">
						  <span class="sr-only">Loading...</span>
						</div>

						<p class="h2">Procesando por favor espere...</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Save changes</button>
			      </div>
			    </div>
			  </div>
			</div>


		</div>
	</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>
</html>