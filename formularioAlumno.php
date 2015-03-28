<!DOCTYPE html>
<?php include './appDatos/clases/Coneccion.php';
?>
<html>
  <head>
    <meta charset ="UTF-8">
    <title>::Formulario de Captura de datos::</title>
    <link rel="stylesheet" href="appDatos/clases/css/master.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>

    <form action="manejadorAlumno.php?accion=save" method="post">
      <table>
        <tr>
          <td>
            Carnet:
          </td>
          <td>
            <input type="text" name="carnet">
          </td>
        </tr>

        <tr>
          <td>
            Nombre:
          </td>
          <td>
            <input type="text" name="nombre">
          </td>
        </tr>

        <tr>
          <td>
            Apellido:
          </td>
          <td>
            <input type="text" name="apellido">
          </td>
        </tr>

        <tr>
          <td>
            Fecha de Nacimiento:
          </td>
          <td>
            <input type="text" name="fechaNac">
          </td>
        </tr>

        <tr>
          <td>
            Direccion:
          </td>
          <td>
            <input type="text" name="dir">
          </td>
        </tr>

        <tr>
          <td>
            Seccion:
          </td>
          <td>
            <select name='seccion'>
              <option value="">-:P-</option>
              <?php

              $sql ="SELECT id,nombre FROM seccion;";
              $datos = consultaD($con,$sql);
              foreach ($datos as $value) {
              	print "<option value='";
              	print $value['id'];
              	print "'>";
              	print $value['nombre'];
              	print "</option>";
              }

             	?>
              </select>

          </td>
        </tr>

        <tr>
          <td colspan="2">
            <input type="submit" name='bot'value='Enviar'>
          </td>
        </tr>


      </table>

    </form>

  </body>
</html>
