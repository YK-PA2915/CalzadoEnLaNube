<?php
    include 'conexion.php';
    include 'carrito.php';
/*     session_start(); */
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
</head>
<body>
<header>

<!-- <div id="menu-bar" class="fas fa-bars"></div>
 -->
<img class="logo" src="img/logo.png" alt="">
<nav class="navbar">
    <a href="#home">Inicio</a>
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
<!-- <nav>
   
    </nav> -->
</header>

<section class="home" id="home">

    <div class="slide-container active">
        <div class="slide">
            <div class="content">
                <span>nike red shoes</span>
                <h3>nike metcon shoes</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat maiores et eos eaque veritatis aut laboriosam earum dolorem iste atque.</p>
                <a href="#" class="btn">add to cart</a>
            </div>
            <div class="image">
                <img src="img/home-shoe-1.png" class="shoe" alt="">
                <img src="img/home-text-1.png" class="text" alt="">
            </div>
        </div>
    </div>

    <div class="slide-container">
        <div class="slide">
            <div class="content">
                <span>nike blue shoes</span>
                <h3>nike metcon shoes</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat maiores et eos eaque veritatis aut laboriosam earum dolorem iste atque.</p>
                <a href="#" class="btn">add to cart</a>
            </div>
            <div class="image">
                <img src="img/home-shoe-2.png" class="shoe" alt="">
                <img src="img/home-text-2.png" class="text" alt="">
            </div>
        </div>
    </div>

    <div class="slide-container">
        <div class="slide">
            <div class="content">
                <span>nike yellow shoes</span>
                <h3>nike metcon shoes</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat maiores et eos eaque veritatis aut laboriosam earum dolorem iste atque.</p>
                <a href="#" class="btn">add to cart</a>
            </div>
            <div class="image">
                <img src="img/home-shoe-3.png" class="shoe" alt="">
                <img src="img/home-text-3.png" class="text" alt="">
            </div>
        </div>
    </div>

    <div id="prev" class="fas fa-chevron-left" onclick="prev()"></div>
    <div id="next" class="fas fa-chevron-right" onclick="next()"></div>

</section>
<div class="bg-secundario bg-gradiente">
    <table  class="table table-success table-striped">
      <tr>
        <td><?php echo $mensaje ?><button class="btn btn-danger" type="button"><a href="verCarrito.php">Ver Carrito</a></button></td>
      </tr>
    </table>
  </div>
<section class="service">

    <div class="box-container">

        <div class="box">
            <i class="fas fa-shipping-fast"></i>
            <h3>fast delivery</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, fugit.</p>
        </div>

        <div class="box">
            <i class="fas fa-undo"></i>
            <h3>10 days replacements</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, fugit.</p>
        </div>

        <div class="box">
            <i class="fas fa-headset"></i>
            <h3>24 x 7 support</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, fugit.</p>
        </div>

    </div>
    <!-- comienza productos -->
 <section class="products" id="products">

    <h1 class="heading"> latest <span>products</span> </h1>

    <div class="box-container">
        <?php
        try {
            $sqlc="SELECT * FROM productos"; 
            $resultado=$base->prepare($sqlc);
            $resultado->execute(array());
            while ($consulta1=$resultado->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="box">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <img src="<?php echo $consulta1['imagen_pdto'];?>" alt="">
                    <div class="content">
                        <h3><?php echo $consulta1['nombre_pdto']; ?></h3>
                        <p><?php echo $consulta1['descripcion_pdto']; ?></p>
                        <h4><?php echo $consulta1['valor_pdto']; ?></h4>
                    </div>
                    <form method="POST" action="">
                        <input type="hidden" name="id" id="id" value="<?php echo $consulta1['id_pdto'] ?>">
                        <input type="hidden" name="nombre" id="nombre" value="<?php echo $consulta1['nombre_pdto'] ?>">
                        <input type="hidden" name="precio" id="precio" value="<?php echo $consulta1['valor_pdto'] ?>">
                        <input type="number" name="cantidad" id="cantidad" width="10px" heigth="10px" value="1" required>
                        <button class="btn btn-primary"
                        name="btnaccion"
                        type="submit"
                        value="Agregar" >
                        agregar al carrito
                    </button>
                </form>
            </div>
        <?php
            }
        } catch (Exepction $e) {
            die('Error al consultar Productos'.$e->getMessage());
        }
        ?>
    </div>
    
</section>

</section>
<script src="js/script.js"></script>
</body>
</html>
