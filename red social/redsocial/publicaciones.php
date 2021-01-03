<?php
require_once("bd_config.php");
ini_set('error_reporting',0);


$vistas = mysqli_query($conexion, "SELECT * from publicaciones order by id DESC");   
while($lista = mysqli_fetch_array($vistas)){
    $userid = mysql_real_escape_string($lista['user']);
    $usuario = mysqli_query($conexion, "SELECT * from usuario where id = '$userid'");
    $us = mysqli_fetch_array($usuario);
?>
<div class="row">
    <div class="col-md-3">
        <h4><?php echo $us['nombre'].' '.$us['apellido']; ?></h4>
        <?php 
        if(!empty($lista['imagen'])){
            ?>
            <img src="publicaciones/<?php echo $lista['imagen']; ?>" alt="" width="100%">
        <?php    
        }
        ?>
        <p><?php echo $lista['contenido']; ?></p>
    </div>
    <div class="col-md-9">
        
    </div>
</div>
<?php    
}
?>