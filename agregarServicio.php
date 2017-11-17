  <?php
    $mensaje = "";
    require("conexion.php");
    $idCone = conexion();
    $actividades = mysqli_query($idCone,"SELECT * FROM actividades");
      if(isset($_POST["submit"]))
      {
        $Documento = $_POST["Documento"];
        $NombreActividad = $_POST["NombreActividad"];
        $Fecha = $_POST["Fecha"];
        $Comentarios = $_POST["Comentarios"];
        $SQL1 = "SELECT * FROM actividades WHERE (Nombre LIKE '$NombreActividad')";
        $Registro1 = mysqli_query($idCone,$SQL1);
        while($Fila = mysqli_fetch_array($Registro1))
        {
          $SQL2 = "INSERT INTO servicios(CodEmpresa,CodActividad,Fecha,Comentarios) VALUES('$Documento',$Fila[Codigo],'$Fecha','$Comentarios')";
        }
        $validacion = mysqli_query($idCone,"SELECT * FROM empresas WHERE (Documento LIKE '$Documento')");
        if(mysqli_num_rows($validacion) != 0)//se valida que el documento sí exista en la base de datos
        {
          if(mysqli_query($idCone,$SQL2))
          {
            $mensaje = "Servicio programado con exito";
          }
          else
          {
            $mensaje = "Error programando el servicio";
          }
        }
        else
        {
          $mensaje = "No existe una empresa con documento $Documento en la base de datos";
        }

      //mysqli_close($idCone);
      }
      
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Programar servicio</title>
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
  <h1>Programar servicio</h1>  
</div>

  <nav class="navbar navbar-inverse navbar-fixed-top bg-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Statium</a>
      </div>

      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Index</a></li>
        <li><a href="listarEmpresas.php">Lista de empresas</a></li>
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

<form class="form-horizontal" role = "form" method = "post" action="agregarServicio.php">
  <div class = "form-group">
    <label for = "Documento" class = "col-sm-2 control-label">Documento</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="Documento" name="Documento" placeholder="Documento de la empresa a la que se le presta el servicio"></textarea>
    </div>
  </div>

  <div class = "form-group">
    <label for = "NombreActividad" class = "col-sm-2 control-label">Nombre de la actividad</label>
    <div class="col-sm-10">
      <select class="form-control" id="NombreActividad" name="NombreActividad">
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
      <input type="date" name="Fecha" id="Fecha">
    </div>
  </div>

  <div class = "form-group">
    <label for = "Comentarios" class = "col-sm-2 control-label">Comentarios</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="Comentarios" name="Comentarios" placeholder="Comentarios respecto al servicio"></textarea>
    </div>
  </div>

  <div class = "form-group">
    <div class="col-sm-10 col-sm-offset-2">
      <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Guardar">
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