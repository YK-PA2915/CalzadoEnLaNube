<?php
include 'conexion.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar  categoria</title>
</head>
<body>
    <div>
        <table border="1">
            <tr>
                <td>codigo</td>
                <td>nombre_ca</td>
            </tr>
            <?php
            try{
                $sqlc="SELECT * FROM categoria";
                $resultado=$base->prepare($sqlc);
                $resultado->execute(array());
                while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td><?php echo $consulta['codigo']; ?></td>
                        <td><?php echo $consulta['nombres_ca']; ?></td>
                        <td><a href="eliminarCategoria.php?segurou=<?php echo $consulta['codigo'];?>"><img src="img/eliminar.png" width="30px"></a></td>
                        <td><a href="actualizarCategoria.php?cod=<?php echo $consulta['codigo'] ?>"><img src="img/actualizar.png" width="30px"></a></td>
                    </tr>
                    <?php
                }
            }catch(Exception $e){
                die('error en la consulta de categoria' .$e->getMessage());
            }
            ?>
        </table>
    </div>
</body>
</html> 