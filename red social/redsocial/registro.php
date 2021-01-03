<?php 
require_once("bd_config.php"); 
ini_set('error_reporting',0);

if(isset($_SESSION['usuario'])){
    header('Location: index.php');
}
?>
<html>
<head>
	<title>La Red Social</title>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">LA RED SOCIAL</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        
	      </ul>
	      <form class="navbar-form navbar-right">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Buscar">
	        </div>
	        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuración <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="login.php">Iniciar Sesion</a></li>
	           	<li role="separator" class="divider"></li>
	            <li><a href="logout.php">Cerrar Sesión</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		<h1>Registro de usuarios</h1>
		<form method="post">
			<div class="form-group has-feedback">
				<input type="text" name="nombres" class="form-control" value="<?php echo $_POST['nombres']; ?>" placeholder="Nombres" required>
				<span class="glyphicon glyphicon-user form-control-feedback" aria-hidden="true"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="text" name="apellidos" class="form-control" value="<?php echo $_POST['apellidos']; ?>" placeholder="Apellidos" required>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="email" name="email" class="form-control" placeholder="Email" required>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="text" name="usuario" class="form-control" value="<?php echo $_POST['usuario']; ?>" placeholder="Usuario" required>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="password" class="form-control" placeholder="Password" required>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" required> Aceptar terminos y condiciones
				</label>
			</div>
			<button type="submit" name="registro" class="btn btn-primary">Registrar</button>
			<div class="form-group">
				<label><a href="login.php">Ya cuento con una cuenta</a></label>
			</div>
		</form>
		<?php 
		if(isset($_POST["registro"])){
			$nombre = mysql_escape_string($_POST["nombres"]);
			$apellido = mysql_escape_string($_POST["apellidos"]);
			$email = mysql_escape_string($_POST["email"]);
			$password = mysql_escape_string($_POST["password"]);
			$usuario = mysql_escape_string($_POST["usuario"]);

			$comprobaruser = mysqli_query($conexion, "SELECT user from usuario where user = '$usuario'");
			$comprobarusercont = mysqli_num_rows($comprobaruser);
			$comprobaremail = mysqli_query($conexion, "SELECT email from usuario where email = '$email'");
			$comprobaremailcont = mysqli_num_rows($comprobaremail);
			if ($comprobarusercont >= 1) {echo '<div class="alert alert-danger" role="alert">El usuario ya existe</div>';}else{
				if ($comprobaremailcont >= 1) {echo '<div class="alert alert-danger" role="alert">El mail ya existe</div>';}else{
					$insertaruser = mysqli_query($conexion, "INSERT into usuario (nombre,apellido,user,password,email,estado,fecha_ing) values ('$nombre','$apellido','$usuario','$password','$email',1,now())");
					if ($insertaruser) {echo '<div class="alert alert-success" role="alert">Usuario registrado correctamente</div>';}
				}
			}
		}
		 ?>
	</div>
</body>
</html>