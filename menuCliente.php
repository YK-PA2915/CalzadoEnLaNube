<?php
    include'conexion.php';
    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: login.php');
        }
    }
    if (isset($_SESSION['nombre'])) {
        $nombre=$_SESSION['nombre'];
    }else {
        $nombre="";
    }
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cliente</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/clientePrincipal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<header>

<div id="menu-bar" class="fas fa-bars"></div>
<img class="logo" src="img/logo.png" alt="">
<nav class="navbar">
    <a href="perfilCliente.php">Inicio</a>
    <a href="#products">Productos</a>
    <a href="#featured">Destacados</a>
    <a href="#review">Reseñas</a>
</nav>
<div class="icons">
    <a href="#" class="fas fa-heart"></a>
    <a href="verCarrito.php" class="fas fa-shopping-cart"></a>
    <?php
        if ($nombre=="") {
            echo"<script type='text/javascript'>window.location='login.php'</script>";
        } else {
         echo"<a class='navbar nombre'>$nombre</a>"; 
        }
        ?>
    <a href="#" class="fas fa-user"></a>
    <a href="cerrar.php" class="fas fa-sign-in-alt"></a>
</div>
</header>
<script src="js/script.js"></script>
</body>
</html>