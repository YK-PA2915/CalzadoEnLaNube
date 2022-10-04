<?php
include 'conexion.php';
include 'menuCliente.php';
include 'carrito.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .carro{
            margin-top: 100px;
            font-size: 2em;
        }
    </style>
</head>
<body>
<a href="perfilCliente.php" class="btn btn-danger">Volver</a>
<br>
<div class="carro">
    <h3>Listado de Productos</h3>
    <?php
    if(!empty($_SESSION['CARRITO'])){
        ?>
        <table class="table table leght table-border">
         <tbody>
         <tr>
            <th whidth="40%">Descripcion</th>
            <th whidth="15%">Cantdad</th>
            <th whidth="20%">precio</th>
            <th whidth="20%">Total</th>
            <th whidth="5%">--</th>
         </tr>
         <?php
         $total=0; 
         foreach($_SESSION['CARRITO'] as $indice=>$producto){
         ?>
         <tr>
            <td  whidth="40%"><?php echo $producto['NOMBRE']?></td>
            <td  whidth="15%"><?php echo $producto['CANTIDAD']?></td>
            <td  whidth="20%"><?php echo $producto['PRECIO']?></td>
            <td  whidth="20%"><?php echo  number_format($producto['PRECIO']*$producto['CANTIDAD'],3);?> </td>
            <td  whidth="5%"> 
            <form action="" method="POST">
                    <input type="hidden"
                    name="id"
                    id="id"
                    value="<?php echo $producto['ID']; ?>">
                    <button type="submit"
                    name="btnaccion"
                    value="Eliminar"
                    class="btn btn-danger">Eliminar</button>
                 </form>
                 </td>
         </tr>
         <?php
         $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
}
?>
<tr>
    <td colspan="3" align="right"><h3>Total a pagar</h3></td>
    <td align="right"><h3><?php echo number_format ($total,3) ?></h3></td>
</tr>
<?php
    }
    ?>
    </tbody>
        </table>
</div>
</body>
</html>