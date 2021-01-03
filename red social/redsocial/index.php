<?php
session_start();
require_once("bd_config.php"); 

if(!isset($_SESSION['usuario'])){
    header('Location: login.php');
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
	      <a class="navbar-brand" href="index.php">LA RED SOCIAL</a>
	    </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="buscar.php?id=<?php echo $_SESSION['id'] ?>"><span class="glyphicon glyphicon-user"></span> Perfil <span class="sr-only">(current)</span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Mensajes</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-bell"></span> Notificaciones</a></li>
          </ul>
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        
	      </ul>
	      <form method="post" class="navbar-form navbar-right">
	        <div class="form-group">
	          <input type="text" name="nombresApellido" class="form-control" placeholder="Buscar">
	        </div>
	        <button type="submit" name="buscar" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
	      </form>
	      <?php 
            if(isset($_POST['buscar'])){
                $nom= mysql_real_escape_string($_POST['nombresApellido']);
                $sql = "SELECT * from usuario where nombre = '$nom' or apellido = '$nom'";
                $buscar = mysqli_query($conexion, $sql);
                $result = mysqli_fetch_array($buscar);
                $iduser = $result['id'];
                header('Location: buscar.php?id='.$iduser);
             
            }
            ?>
	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuración <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	           	<li role="separator" class="divider"></li>
	            <li><a href="logout.php">Cerrar Sesión</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-3">
               <h2><?php echo $_SESSION['usuario']; ?></h2>
                <img src="images/<?php echo $_SESSION['avatar']; ?>" alt="avatar" class="img-responsive" width="100%">
                <p><strong>Email:</strong> <?php echo $_SESSION['email'] ?></p>
                <p><strong>Edad:</strong> <?php echo $_SESSION['edad'] ?></p>
                <p><strong>Genero:</strong> <?php echo $_SESSION['genero'] ?></p>
                <p><strong>Teléfono:</strong> <?php echo $_SESSION['telefono'] ?></p>
            </div>
            <div class="col-md-10 col-sm-9">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <textarea class="form-control" name="publicacion" id="" rows="3" placeholder="Que estas pensando?"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <button class="btn btn-success btn-flat" name="publicar" type="submit">Publicar</button>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="file" name="foto" class="btn">
                            </div>
                        </div>
                    </div>
                </form>
                <?php require_once('publicaciones.php'); ?>
                <?php 
                if(isset($_POST['publicar'])){
                    $publicacion = mysql_real_escape_string($_POST['publicacion']);
                    
                    $resultado = mysqli_query($conexion, "SHOW TABLE STATUS WHERE 'Name' = 'publicaciones'");
                    $data = mysqli_fetch_assoc($resultado);
                    $next_increment = $data['Auto_increment'];
                    
                    $random = substr(strtoupper(md5(microtime(true))), 0, 12);
                    $code = $next_increment.$random;
                    
                    $type = 'jpg';
                    $rfoto = $_FILES['foto']['tmp_name'];
                    $name = $code.'.'.$type;
                    
                    if(is_uploaded_file($rfoto)){
                        $destino = "publicaciones/".$name;
                        $nombre = $name;
                        copy($rfoto, $destino);
                    }else{
                        $nombre = "";
                    }
                    
                    $subir_foto = mysqli_query($conexion, "INSERT into publicaciones (user,fecha,contenido,imagen,comentarios) values ('".$_SESSION['id']."',now(),'$publicacion','$nombre',1)");
                    if($subir_foto){header('Location: index.php');}
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>