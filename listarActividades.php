<!DOCTYPE html>
<html lang="en">
<head>
  <title>Statium - Actividades</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top bg-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Statium</a>
      </div>

      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Index</a></li>
        <li><a href="listarEmpresas.php">Lista de empresas</a></li>
        <li><a href="listarActividades.php">Lista de actividades</a></li>
        <li><a href="agregarActividad.php">Agregar actividad</a></li>
        <li><a href="agregarServicio.php">Programar servicio</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Consulta de empresas
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="empresaPorDocumento.php">Por Documento</a></li>
            <li><a href="empresaPorNombre.php">Por Nombre</a></li>
            <li><a href="empresaPorRazon.php">Por Razón Social</a></li>
            <li><a href="empresaPorDireccion.php">Por Dirección</a></li>
            <li><a href="empresaPorCiudad.php">Por Ciudad</a></li>
            <li><a href="empresaPorDepartamento.php">Por Departamento</a></li>
          </ul>
        </li>
      </ul>

    </div>
  </nav>
  	<br><br>
		<h1>Lista de actividades</h1>
		<table class = "table table-striped">
			<thead>
				<tr>
					<th>Nombre de la actividad</th>
					<th>Descripción</th>
				</tr>
			</thead>

			<tbody>
				<?php
					require("conexion.php");
					$idCone = conexion();
					$SQL = "SELECT * FROM actividades";
					$Registro = mysqli_query($idCone,$SQL);
					while($Fila = mysqli_fetch_array($Registro))
					{
						echo "<tr>";
						echo "<td>$Fila[Nombre]";
						echo "<td>$Fila[Descripcion]";
					}
					mysqli_free_result($Registro);
					mysqli_close($idCone);
				?>
			</tbody>

		</table>
	</div>

</body>
</html>