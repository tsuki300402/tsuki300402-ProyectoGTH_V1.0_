
<!DOCTYPE html>
<html>
<head>
	<title>Gestion de talento humano</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://localhost/ProyectoGTH_V1.0_/css/custom.css"  rel="stylesheet">
	<link href="http://localhost/ProyectoGTH_V1.0_/libs/bootstrap-icons/bootstrap-icons.css"  rel="stylesheet">
	<script src="http://localhost/ProyectoGTH_V1.0_/js/bootstrap.bundle.min.js.map"></script>

</head>
<body onload="btnInicio()">
  
<div class="container-fluid">
    <div class="row ">
  <div class="col-12">
    <div class="card h-100">
      <img src="http://localhost/ProyectoGTH_V1.0_/libs/bootstrap-icons/people-fill.svg" class="card-img-top" alt="person-plus" width="90px" height="90">
      <div class="card-body">
        <h5 class="card-title">Inicio de sesión</h5>

        <form action="http://localhost/ProyectoGTH_V1.0_/configuracion/controller/login.php" method="POST" class="was-validated">
        <div class="form-floating m-4">
            <input type="email" class="form-control" id="email" placeholder="Ingrese su Email" name="email" required>
            <div class="invalid-feedback">Por favor llene este campo</div>
            <div class="valid-feedback">El correo electronico es adecuado</div>
            <label for="email"><i class="bi bi-envelope">Email</i></label>
            
        </div>

        <div class="form-floating m-4">
            <input type="password" class="form-control" id="password" placeholder="Ingrese su Email" name="password" required>
            <label for="password"><i class="bi bi-lock">Password</i></label>
        </div>
    </div>
    <div class="btn-group">
        <button type="submit" class="btn btn-secondary m-5" ><i class="bi bi-send me-1">Ingresar</i></button>
    </div>
      <div class="text-center">
        <a class="btn btn-primary mb-2" href="http://localhost/ProyectoGTH_V1.0_/configuracion/config/config.php">Registrarse</a>
        <a class="btn btn-primary mb-2" href="http://localhost/ProyectoGTH_V1.0_/recuperar.php"> Restablecer Contraseña</a>
      </div>
      </form>
    </div>
  </div>
</div></div>
<script>
  function btnInicio(){
    document.getElementById("Inicio").innerHTML=" ";
  }
</script>
</body>
</html>