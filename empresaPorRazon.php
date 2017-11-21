  <?php
    $RazonX = " ";
    require("conexion.php");
    $idCone = conexion();
    $Registro = mysqli_query($idCone,"SELECT * FROM empresas");
    if(isset($_POST["submit"]))
    {
      $RazonX = $_POST["RazonX"];
      $SQL = "SELECT * FROM empresas WHERE (RazonSocial LIKE '%$RazonX%')";
      $Registro = mysqli_query($idCone,$SQL);
    #mysqli_close($idCone);
    }
  ?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Statium - Empresas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <br>
    <br><br><br>
    <h1>Consulta de empresas por Razón social</h1>

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

    <form class="form-horizontal" role = "form" method="post" action="empresaPorRazon.php">
      <div class="form-group">
        <label for="RazonX" class="col-sm-2 control-label">Razón social: </label>
        <div class="col-sm-10">
          <textarea class="from-control" id="RazonX" name="RazonX" placeholder="Razon social a consultar"></textarea>
        </div>
      </div>

      <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary" value="Consultar">
      </div>
    </form>


    <table class = "table table-striped">
      <thead>
        <tr>
          <th>Tipo de documento</th>
          <th>Documento</th>
          <th>Razón social</th>
          <th>Nombre comercial</th>
          <th>Departamento</th>
          <th>Ciudad</th>
          <th>Dirección</th>
          <th>Teléfono</th>
          <th>Actividad económica</th>
          <th>Email</th>
          <th>Número de trabajadores</th>
          <th>Trabajadores tipo A</th>
          <th>Trabajadores tipo B</th>
          <th>Trabajadores tipo C</th>
        </tr>
      </thead>

      <tbody>
        <?php
          while($Fila = mysqli_fetch_array($Registro))
          {
            echo "<tr>";
            echo "<td>$Fila[TipoDocumento]";
            echo "<td>$Fila[Documento]";
            echo "<td>$Fila[RazonSocial]";
            echo "<td>$Fila[NombreComercial]";
            echo "<td>$Fila[Departamento]";
            echo "<td>$Fila[Ciudad]";
            echo "<td>$Fila[Direccion]";
            echo "<td>$Fila[Telefono]";
            echo "<td>$Fila[ActividadEconomica]";
            echo "<td>$Fila[Email]";
            echo "<td>$Fila[Trabajadores]";
            echo "<td>$Fila[TrabajadoresA]";
            echo "<td>$Fila[TrabajadoresB]";
            echo "<td>$Fila[TrabajadoresC]";
          }
          mysqli_free_result($Registro);
          mysqli_close($idCone);
        ?>
      </tbody>

    </table>
  </div>

</body>
</html>
