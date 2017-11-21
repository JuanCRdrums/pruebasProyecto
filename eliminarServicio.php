<?php
  require("conexion.php");
  $idCone = conexion();
  $mensaje = "";
  $actividades = mysqli_query($idCone,"SELECT * FROM actividades");
  if(isset($_POST['submit']))
  {
    $Documento = $_POST["Documento"];
    $ViejaActividad = $_POST["ViejaActividad"];
    $ViejaFecha = $_POST["ViejaFecha"];
    $SQL1 = "SELECT Codigo FROM actividades WHERE (Nombre LIKE '$ViejaActividad')";
    $Registro1 = mysqli_query($idCone,$SQL1);
    while($Fila = mysqli_fetch_array($Registro1))
    {
      if(mysqli_query($idCone,"DELETE FROM servicios WHERE (CodEmpresa LIKE '$Documento') AND (CodActividad LIKE '$Fila[Codigo]') AND (Fecha LIKE '$ViejaFecha')"))
      {
        $mensaje = "Servicio eliminado con éxito";
      }
      else
      {
        $mensaje = "Error eliminando el servicio";
      }
    }
  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Eliminar servicio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class = "container">
  <br>
  <br><br><br>
  <h1>Eliminar servicio</h1>  
</div>

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

<form class="form-horizontal" role = "form" method = "post" action="eliminarServicio.php">
  <div class = "form-group">
    <label for = "Documento" class = "col-sm-2 control-label">Documento</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="Documento" name="Documento" placeholder="Documento de la empresa a la que se le presta el servicio"></textarea>
    </div>
  </div>

  <div class = "form-group">
    <label for = "NombreActividad" class = "col-sm-2 control-label">Nombre de la actividad</label>
    <div class="col-sm-10">
      <select class="form-control" id="ViejaActividad" name="ViejaActividad">
        <?php
          while($Fila = mysqli_fetch_array($actividades))
          {
            echo "<option>$Fila[Nombre]</option>";
          }
        ?>
      </select>
    </div>
  </div>

  <div class = "form-group">
    <label for = "Fecha" class = "col-sm-2 control-label">Fecha</label>
    <div class="col-sm-10">
      <input type="date" name="ViejaFecha" id="ViejaFecha">
    </div>
  </div>


  <div class = "form-group">
    <div class="col-sm-10 col-sm-offset-2">
      <input type="submit" class="btn btn-danger" id="submit" name="submit" value="Eliminar">
    </div>
  </div>

  <div class="form-group">
   <div class="col-sm-10 col-sm-offset-2">
      <?php echo $mensaje;?>  
    </div>
  </div>


</form>



</body>
</html>