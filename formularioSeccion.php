<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>formulario de captura de datos</title>
    <link rel="stylesheet" href="appDatos/clases/css/master.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<form class="formulario" action="manejadorSeccion.php?accion=save" method="post">
  <table>
    <tr>
      <td>
        Nombre:
      </td>
      <td>
        <input  name="nombre" value="">
      </td>
    </tr>
    <tr>
      <td>
        Escuela:
      </td>
      <td>
        <select class="select" name="escuela">
          <option value = "">--:P</option>
          <option value = "sistemas">Sistemas</option>
          <option value = "manto">Mantenimiento</option>


        </select>
      </td>

    </tr>
    <tr>
      <td  colspan="2"><br><br>
        <input type="submit" name="bot" value="Enviar">

      </td>
    </tr>

  </table>

</form>

</body>
</html>
