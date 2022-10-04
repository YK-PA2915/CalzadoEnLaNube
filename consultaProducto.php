<?php

    session_start();
    include 'conexion.php';
    include 'menuEmpresa.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTANDO ...</title>

</head>
<body>
<section class="products" id="products">
        <h2>Consulta de Productos</h2>

 <div class="row row-cols-1 row-cols-md-3 g-4">
     <?php
        try {
            $sqlc="SELECT * FROM productos INNER JOIN categoria ON productos.fk_codigo_categ=categoria.codigo_categoria";
            $resultado=$base->prepare($sqlc);
            $resultado->execute(array());
            while ($consultafinal=$resultado->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="col-md-4">
    <div class="card mb-3" style="max-width: 540px;">
      <img src="<?php echo $consultafinal['imagen_pdto'];?>" class="card-img-top" alt="...">
      <div class="card-body">
                                <h5 class="card-title"><?php echo $consultafinal['nombre_pdto'];?></h5>
                                <p class="card-text"><?php echo $consultafinal['descripcion_pdto'];?></p>
                                <p class="card-text"><?php echo $consultafinal['valor_pdto'];?></p>
                                <p class="card-text"><?php echo $consultafinal['descuento'];?></p>
                                <p class="card-text"><?php echo $consultafinal['stock'];?></p>
                                <p class="card-text"><?php echo $consultafinal['nombre_categoria'];?></p>
                            </div>
    </div>
  </div>
                <?php
            }
            ?>
        </div>
        </section>
        <?php
        } catch (Exepction $e) {
            die('Error al consultar Productos'.$e->getMessage());
        }
        ?>
</body>
</html>
<!-- <td><a href="confirmacionProducto.php?prop=<?php echo $consultafinal['id_pdto'];?>"><img src="img/eliminar.png" width="30px"></a></td>
                    <td><a href="actualizarProducto.php?cod=<?php echo $consultafinal['id_pdto'];?>"><img src="img/actualizar.png" width="30px"></a></td>
                -->
