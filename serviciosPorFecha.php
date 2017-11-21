<?php
    require("conexion.php");
    $idCone = conexion();
    $Registro1 = mysqli_query($idCone,"SELECT * FROM servicios");
    if(isset($_POST["submit"]))
    {
      $Fecha = $_POST["Fecha"];
      $consulta = "SELECT * FROM servicios WHERE (Fecha LIKE '$Fecha')";
      $Registro1 = mysqli_query($idCone,$consulta);
    #mysqli_close($idCone);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Statium - Servicios</title>
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
        <a class="navbar-brand" href="index.php"><img src="sources/logoStatium.jpg" width="100" height="61" class="img-thumbnail"></a>
      </div>

      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Inicio</a></li>

        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Empresas
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="listarEmpresas.php">Lista de empresas</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Consultar empresas
              <span class="caret"></span></a>
              <ul class="dropdown-menu-right">

              <li><a href="empresaPorDocumento.php">Por Documento</a></li>
              <li><a href="empresaPorNombre.php">Por Nombre</a></li>
              <li><a href="empresaPorRazon.php">Por Razón Social</a></li>
              <li><a href="empresaPorDireccion.php">Por Dirección</a></li>
              <li><a href="empresaPorCiudad.php">Por Ciudad</a></li>
              <li><a href="empresaPorDepartamento.php">Por Departamento</a></li>              
                
              </ul>
            </li>
          </ul>
        </li>

        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Actividades
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="listarActividades.php">Lista de actividades</a></li>
            <li><a href="agregarActividad.php">Agregar Actividad</a></li>
            <li><a href="editarActividad.php">Editar Actividad</a></li>
            <li><a href="eliminarActividad.php">Eliminar Actividad</a></li>
          </ul>
        </li>

        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Servicios
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="listarServicios.php">Servicios programados</a></li>
            <li><a href="agregarServicio.php">Programar servicio</a></li>
            <li><a href="editarServicio1.php">Editar servicio</a></li>
            <li><a href="eliminarServicio.php">Eliminar servicio</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Consulta de servicios
              <span class="caret"></span></a>
              <ul class="dropdown-menu-right">
                <li><a href="serviciosPorActividad.php">Por actividad</a></li>
                <li><a href="serviciosPorEmpresa.php">Por empresa</a></li>
                <li><a href="serviciosPorFecha.php">Por Fecha</a></li>
                
              </ul>
            </li>
          </ul>
        </li>
    </div>
  </nav>


  	<br><br>
		<h1>Servicios por fecha</h1>

  <form class="form-horizontal" role = "form" method="post" action="serviciosPorFecha.php">

  <div class = "form-group">
    <label for = "Fecha" class = "col-sm-2 control-label">Fecha</label>
    <div class="col-sm-10">
      <input type="date" name="Fecha" id="Fecha">
    </div>
  </div>

      <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary" value="Consultar">
      </div>
    </form>

		<table class = "table table-striped">
			<thead>
				<tr>
					<th>Documento de la empresa</th>
					<th>Nombre comercial de la empresa</th>
          <th>Nombre de la actividad</th>
          <th>Fecha del servicio</th>
          <th>Comentarios</th>
				</tr>
			</thead>

			<tbody>
				<?php
        while($Fila = mysqli_fetch_array($Registro1))
        {
          echo "<tr>";
          echo "<td>$Fila[CodEmpresa]";
          $Registro2 = mysqli_query($idCone,"SELECT NombreComercial FROM empresas WHERE (Documento LIKE '$Fila[CodEmpresa]')");
          while($Fila2 = mysqli_fetch_array($Registro2))
          {
            echo "<td>$Fila2[NombreComercial]";
          }
          $Registro3 = mysqli_query($idCone,"SELECT Nombre FROM actividades WHERE (Codigo LIKE '$Fila[CodActividad]')");
          while($Fila3 = mysqli_fetch_array($Registro3))
          {
            echo "<td>$Fila3[Nombre]";
          }
          echo "<td>$Fila[Fecha]";
          echo "<td>$Fila[Comentarios]";
        }
        mysqli_close($idCone);
				?>
			</tbody>

		</table>
	</div>

</body>
</html>