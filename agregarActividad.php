  <?php
    $mensaje = "";
    if(isset($_POST["submit"]))
    {
      require("conexion.php");
      $idCone = conexion();
      $Nombre = $_POST["Nombre"];
      $Descripcion = $_POST["Descripcion"];
      $SQL = "INSERT INTO actividades(Nombre,Descripcion) VALUES('$Nombre','$Descripcion')";
      if(mysqli_query($idCone,$SQL))
      {
        $mensaje = "Actividad $Nombre ingresada con exito";
      }
      else
      {
        $mensaje = "Error ingresando la actividad $Nombre";
      }
    #mysqli_close($idCone);
    }
  ?>


 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Agregar Actividad</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class = "container">
  <br>
  <br>
  <h1>Agregar Actividad</h1>  
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

<form class="form-horizontal" role = "form" method = "post" action="agregarActividad.php">
  <div class = "form-group">
    <label for = "Nombre" class = "col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="Nombre" name="Nombre" placeholder="Nombre de la actividad"></textarea>
    </div>
  </div>

  <div class = "form-group">
    <label for = "Descripcion" class = "col-sm-2 control-label">Descripción</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="Descripcion" name="Descripcion" rows="4" cols="100" placeholder="Descripción de la actividad"></textarea>
    </div>
  </div>

  <div class = "form-group">
    <div class="col-sm-10 col-sm-offset-2">
      <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Guardar">
    </div>
  </div>

  <div class="form-group">
   <div class="col-sm-10 col-sm-offset-2">
      <?php echo $mensaje; ?>  
    </div>
  </div>

</form>



</body>
</html>