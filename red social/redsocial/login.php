<?php 
session_start();
require_once("bd_config.php");

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
	           	<li role="separator" class="divider"></li>
	            <li><a href="registro.php">Registro</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		<form action="" method="post">
			<div class="form-group has-feedback">
				<input type="text" name="usuario" class="form-control" value="" placeholder="Usuario" required>
				<span class="glyphicon glyphicon-user form-control-feedback" aria-hidden="true"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="password" class="form-control" placeholder="Password" required>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<button type="submit" name="login" class="btn btn-primary">Ingresar</button>
		</form>
		<?php 

		if (isset($_POST['login'])) {
			$usuario = mysql_real_escape_string($_POST['usuario']);
			$usuario = strip_tags($_POST['usuario']);
			$usuario = trim($_POST['usuario']);

			$password = mysql_real_escape_string($_POST['password']);
			$password = strip_tags($_POST['password']);
			$password = trim($_POST['password']);

			$query = mysqli_query($conexion, "SELECT * from usuario where user = '$usuario' and password = '$password'");
			$cont = mysqli_num_rows($query);

			if ($cont == 1) {
				while ($row = mysqli_fetch_array($query)) {
					if ($usuario = $row['user'] && $password = $row['password']) {
						$_SESSION['usuario'] = $row['nombre'].' '.$row['apellido'];
						$_SESSION['id'] = $row['id'];
                        $_SESSION['avatar'] = $row['avatar'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['edad'] = $row['edad'];
                        $_SESSION['genero'] = $row['genero'];
                        $_SESSION['telefono'] = $row['telefono'];

						header('Location: index.php');
					}
				}
			} else {echo "Datos ingresados no son correctos";}
		}
		
		 ?>
	</div>
</body>
</html>