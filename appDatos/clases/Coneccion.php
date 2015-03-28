<?php

	$dsn = 'mysql:dbname=alumnos;host=127.0.0.1';
	$usuario = 'root';
	$clave = '';
	try {
		$con = new PDO($dsn,$usuario,$clave);
	} catch (PDOException $e) {
		print $e->getTraceAsString();
	}





	//Creamos una funcion para el manejo de datos

	function consultaA($coneccion,$sql){

		//Dentro de la funcion agregamos las siguientes
		//variables que nos serviranpara el control de las
		//salidas de datos...
		$ejecutor = $coneccion;
		$msgok = NULL;
		$msgerror = NULL;

		//Insertaremos un bloque try catch que nos servirá
		//para el manejo de excepciones.

		try {
			//agregemos una variable para identificar de sql de accion vamos a utilizar

			$condicion = strstr (trim($sql)," ",TRUE);

			/*Agregamos una condicion switch para definir los msg que enviemos
			con relacion al valor devuelto por la variable $condicion para cada
			sentencia sql de accion*/

			switch ($condicion)
			{
				case 'INSERT':
					$msgerror = "No se ha Podido Insertar los Datos";
					$msgok = "Datos Insertados";
					break;

					case 'DELETE':
						$msgerror = "No se ha Podido Eliminar los Datos";
						$msgok = "Datos Eliminados";
						break;

						case 'UPDATE':
							$msgerror = "No se ha Podido Actualizar los Datos";
							$msgok = "Datos Actualizados";
							break;
				default:
					$msgerror = "Es posible que no use un estandar de consulta SQL";
					break;
			}

			$ejecutor->beginTransaction();
			$fila = $ejecutor->exec($sql);
			$ejecutor->commit();

			/* Agregamos instrucciones para saber cuántas filas fueron afectadas por la acción
			y si no se afectaron definimos un mensaje de error alertando que no han habido
			filas afectadas por la ejecución. */

			if ($fila == 0) {
				$msgok = $msgerror."<br> No existe coincidencia para la accion sobre los .....__";

			}

			//Retornamos el valor del msg y numero de filas afectadas

			return $msgok." Filas Afectadas ".$fila;



		} catch (Exception $exc) {

			//codigo para controlar un mensaje de error por si
			//no se pudo ejecutar las acciones de forma correcta.

			$ejecutor->rollBack();
			return $msgerror. ":(<br>".$exc->getMessage();

		}
}
//FINALIZA LA FUNCION CONSULTA(A)

		//funcion para manejar las consultas de datos
		function consultaD($coneccion,$sql,$modo=2,$presentacion=FALSE)
		{
			//Crear variables para el control de msg y salidas de datos
			$ejecutor = $coneccion;
			$manejador = trim($sql);
			$devolucion = "";

			//bloque try para el codigo que ejecuta la sentencia sql
			//y la asocia a un arreglo para su manipulacion.

			try
			{
				$datos = $ejecutor->query($manejador);
				$datos->setFetchMode($modo);

				//Agregamos una condicion if/else para comprobar el parametro presentacion

				if ($presentacion == TRUE){
					//estructura para la presentacion de los datos en una
					//tabla de html para ello agragar la sig definicion
					$devolucion .="<table border=1>";
					//Agregamos una estructura foreach para recorrer los elementos que devolvera la
					//instruccion fetchAll.

					foreach ($datos ->fetchAll() as $registros) {
						//instrucciones para definir las filas

						$devolucion.="<tr>";
						//segundo foreach q se encarga de sacar los datos para c/celda

						foreach ($registros as $valor)
						{
							$devolucion .="<td>".$valor."</td>";
						}

						$devolucion.="</tr>";

						//Instruccion que sierra la tabla

					}

					//FUERA DE LOS DOS BLOQUES FOREACH AGREGAMOS LA INTRUCCION Q CIERRA LA TABLA

					$devolucion.="</table>";
					//AHORA EN EL BLOQUE ELSE AGREGAMOS EL CODIGO SIG.
				}else{
					$contenedor = $datos->fetchAll();
					$devolucion=$contenedor;

				}


			} catch (Exception $exc) {
				return "No se pudieron Consultar los Datos<br />".$exc->getMessage();

			}
			
			return $devolucion;
		}

?>
