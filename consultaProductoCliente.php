<?php
include'conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTANDO ...</title>
    <link rel="stylesheet" href="css/stylePrincipal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        table,tr,th,td {
            border: black 1px solid;
            align-content: center;
            width:  100%;
            text-align: center;
            font-size: 1.2em;
        }
        a {
            text-decoration: none;
        }


    </style>
</head>
<body>
<nav>
    <span class="logo">
        <img class="logoo"  src="img/logo.png">
    </span>
    <ul>
   <!-- <li> <a href="admin.php">Inicio</a></li> --> 
      <li> <a href="consultarProductoCliente.php"> Productos</a></li>
     <!--  <li> <a href="consultarProducto.php">Listar Productos </a> </li> -->
     <!--  <li> <a href="/FrmEmpresa">Empresas</a> </li>
      <li> <a href="/FrmCompra">Compras</a> </li>
      <li> <a href="/FrmCategoria">Categoria</a> </li> -->
            <input type="text">
                <li></li>
               
                <!-- <li class="ini"> Iniciar Sesion</li> -->
                <li class="ini"> <a href="login.php">Salir</a></li>
            </ul>
 </nav>
<table>
        <h2>Consulta de Productos</h2>
        <tr>
            <!-- <th>Codigo</th> -->
            <th>Imagen</th>
            <th>...Nombre...</th>
            <th>...Descripcion...</th>
            <th>...Valor...</th>
            <th>...Descuento...</th>
            <th>...Stock...</th>
            <th>...Categoria...</th>

        </tr>
        <?php
        try {
            $sqlc="SELECT * FROM productos INNER JOIN categoria ON productos.fk_codigo_categ=categoria.codigo_categoria";
            $resultado=$base->prepare($sqlc);
            $resultado->execute(array());
            while ($consultafinal=$resultado->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <!-- <td><?php echo $consultafinal['id_pdto'];?></td> -->
                    <td><img src="<?php echo $consultafinal['imagen_pdto'];?>" width="200" height="150" alt=""></td>
                    <td><?php echo $consultafinal['nombre_pdto'];?></td>
                    <td><?php echo $consultafinal['descripcion_pdto'];?></td>
                    <td><?php echo $consultafinal['valor_pdto'];?></td>
                    <td><?php echo $consultafinal['descuento'];?></td>
                    <td><?php echo $consultafinal['stock'];?></td>
                    <td><?php echo $consultafinal['nombre_categoria'];?></td>
                  
                </tr>
                <?php
            }
        } catch (Exepction $e) {
            die('Error al consultar Productos'.$e->getMessage());
        }
        ?>
    </table>
</body>
</html>