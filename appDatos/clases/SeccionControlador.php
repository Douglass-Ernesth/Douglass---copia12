<?php

class SeccionControlador extends  Seccion{
	public function guardarDatos($con,$objSeccion)
	{
	$variableSql = "INSERT INTO alumnos.seccion ";
	$variableSql .= "(id,nombre,escuela) ";
	$variableSql .= "VALUES (";
	$variableSql .= "'".$objSeccion[0]."',";
    $variableSql .= "'".$objSeccion[1]."',";
    $variableSql .= "'".$objSeccion[2]."'); ";
    return consultaA($con,$variableSql);

	}
}
?>
