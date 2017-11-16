  <?php
    $mensaje = "";
    if(isset($_POST["submit"]))
    {
      require("conexion.php");
      $idCone = conexion();
      $TipoDocumento = $_POST["TipoDocumento"];
      $Documento = $_POST["Documento"];
      $RazonSocial = $_POST["RazonSocial"];
      $NombreComercial = $_POST["NombreComercial"];
      $Departamento = $_POST["Departamento"];
      $Ciudad = $_POST["Ciudad"];
      $Direccion = $_POST["Direccion"];
      $Telefono = $_POST["Telefono"];
      $ActividadEconomica = $_POST["ActividadEconomica"];
      $Email = $_POST["Email"];
      $Trabajadores = $_POST["Trabajadores"];
      $TrabajadoresA = $_POST["TrabajadoresA"];
      $TrabajadoresB = $_POST["TrabajadoresB"];
      $TrabajadoresC = $_POST["TrabajadoresC"];
      $SQL = "INSERT INTO empresas(TipoDocumento,Documento,RazonSocial,NombreComercial,Departamento,Ciudad,Direccion,Telefono,ActividadEconomica,Email,Trabajadores,TrabajadoresA,TrabajadoresB,TrabajadoresC) VALUES ('$TipoDocumento','$Documento','$RazonSocial','$NombreComercial','$Departamento','$Ciudad','$Direccion','$Direccion','$Telefono','$ActividadEconomica','$Email',$Trabajadores,$TrabajadoresA,$TrabajadoresB,$TrabajadoresC)";
      if(mysqli_query($idCone,$SQL))
      {
        $mensaje = "Empresa $NombreComercial ingresada con exito";
      }
      else
      {
        $mensaje = "Error ingresando la empresa $NombreComercial";
      }
    #mysqli_close($idCone);
    }
  ?>


 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Agregar Empresa</title>
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
  <h1>Agregar Empresa</h1>  
</div>
<br>
<br>

  <nav class="navbar navbar-inverse navbar-fixed-top bg-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Statium</a>
      </div>

      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Index</a></li>
        <li><a href="listarEmpresas.php">Lista de empresas</a></li>
        <li><a href="agregarActividad.php">Agregar actividad</a></li>
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

<form class="form-horizontal" role = "form" method = "post" action="agregarEmpresa.php">
  <div class = "form-group">
    <label for = "TipoDocumento" class = "col-sm-2 control-label">Tipo de documento: </label>
    <div class="col-sm-10">
      <textarea class="form-control" id="TipoDocumento" name="TipoDocumento" placeholder="Tipo de documento"></textarea>
    </div>
  </div>

  <div class = "form-group">
    <label for = "Documento" class = "col-sm-2 control-label">Documento</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="Documento" name="Documento" placeholder="Documento"></textarea>
    </div>
  </div>

  <div class = "form-group">
    <label for = "RazonSocial" class = "col-sm-2 control-label">Razón social</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="RazonSocial" name="RazonSocial" placeholder="Razón Social"></textarea>
    </div>
  </div>

  <div class = "form-group">
    <label for = "NombreComercial" class = "col-sm-2 control-label">Nombre comercial</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="NombreComercial" name="NombreComercial" placeholder="Nombre comercial"></textarea>
    </div>
  </div>

  <div class = "form-group">
    <label for = "Departamento" class = "col-sm-2 control-label">Departamento</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="Departamento" name="Departamento" placeholder="Departamento"></textarea>
    </div>
  </div>

  <div class = "form-group">
    <label for = "Ciudad" class = "col-sm-2 control-label">Ciudad</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="Ciudad" name="Ciudad" placeholder="Ciudad"></textarea>
    </div>
  </div>

  <div class = "form-group">
    <label for = "Direccion" class = "col-sm-2 control-label">Dirección</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="Direccion" name="Direccion" placeholder="Dirección"></textarea>
    </div>
  </div>

  <div class = "form-group">
    <label for = "Telefono" class = "col-sm-2 control-label">Teléfono</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="Telefono" name="Telefono" placeholder="Teléfono"></textarea>
    </div>
  </div>

  <div class = "form-group">
    <label for = "ActividadEconomica" class = "col-sm-2 control-label">Actividad económica</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="ActividadEconomica" name="ActividadEconomica" placeholder="Actividad económica"></textarea>
    </div>
  </div>

  <div class = "form-group">
    <label for = "Email" class = "col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="Email" name="Email" placeholder="Email"></textarea>
    </div>
  </div>

  <div class = "form-group">
    <label for = "Trabajadores" class = "col-sm-2 control-label">Número de trabajadores</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="Trabajadores" name="Trabajadores" placeholder="Número de trabajadores">
    </div>
  </div>

  <div class = "form-group">
    <label for = "TrabajadoresA" class = "col-sm-2 control-label">Número de trabajadores tipo A</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="TrabajadoresA" name="TrabajadoresA" placeholder="Número de trabajadores tipo A">
    </div>
  </div>

  <div class = "form-group">
    <label for = "TrabajadoresB" class = "col-sm-2 control-label">Número de trabajadores tipo B</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="TrabajadoresB" name="TrabajadoresB" placeholder="Número de trabajadores tipo B">
    </div>
  </div>

  <div class = "form-group">
    <label for = "TrabajadoresC" class = "col-sm-2 control-label">Número de trabajadores tipo C</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="TrabajadoresC" name="TrabajadoresC" placeholder="Número de trabajadores tipo C">
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