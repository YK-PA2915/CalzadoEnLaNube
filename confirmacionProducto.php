<?php
include'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=+, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    try {
        $sqll="SELECT * FROM productos WHERE id_pdto=".$_REQUEST['prop'].";";
        $resultadol=$base->prepare($sqll);
        $resultadol->execute(array());
        while ($consultal=$resultadol->fetch(PDO::FETCH_ASSOC)) {
            echo"usted esta segur@ de eliminar  ".$consultal['nombre_pdto'];
        }
        ?>
        <table>
            <tr>
            <td><a href="eliminarProducto.php?prop2=<?php echo $_REQUEST['prop']?>"><img src="img/aceptar.png" width="40px"></a></td>
            <td><a href="javascript:history.go(-1)"><img src="img/cancelar.png" width="40px"></a></td>
            </tr>
        </table>
        <?php
    } catch (exception $err) {
        die('Error al preguntar3'.$err->getMessage());
    }
    ?>
</body>
</html>