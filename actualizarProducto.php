<?php
include'conexion.php'; 
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar datos</title>
    <link rel="stylesheet" href="css/actualizar.css">
</head>
<body>
    <?php
    try {
        $sqlu="SELECT * FROM productos WHERE id_pdto =".$_REQUEST['cod'].";";
        $resultado=$base->prepare($sqlu);
        $resultado->execute(array());
        while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <form action="updateProducto.php?cod1=<?php echo $_REQUEST['cod']; ?>" name="f1" method="POST">
            <table>
                <h1>Actualizar Datos</h1>
                <tr>
                    <td>Imagen</td>
                    <td> <img  name="imagen"  disabled=»disabled» src="<?php echo $consulta['imagen_pdto'];?>" width="100" height="150"  alt="no hay jaja">               
                </tr>
                <tr>
                    <td>Nombre :</td>
                    <td colspan="2"><input type="text" name="txt1" required value="<?php echo $consulta['nombre_pdto'] ?>"></td>
                </tr>
                <tr>
                    <td>Descripcion :</td>
                    <td colspan="2"><input type="text" name="txt2" required value="<?php echo $consulta['descripcion_pdto'] ?>"></td>
                </tr>
                <tr>
                    <td>Valor :</td>
                    <td  colspan="2"><input type="number" name="txt3" required value="<?php echo $consulta['valor_pdto'] ?>"></td>
                </tr>
                <tr>
                    <td>Descuento :</td>
                    <td  colspan="2"><input type="text" name="txt4" required value="<?php echo $consulta['descuento'] ?>"></td>
                </tr>
                <tr>
                    <td>Stock :</td>
                    <td colspan="2"><input type="number" name="txt5" required value="<?php echo $consulta['stock'] ?>"></td>
                </tr>
                <tr>
                <tr>
                    <td>Categoria:</td>
                    <td colspan="2"><input type="text" name="txt6"  disabled=»disabled»  required value="<?php echo $consulta['fk_codigo_categ'] ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="btna" value="Actualizar:.:"></td>
                </tr>
            </table>
        </form>
        <?php
        }
    } catch (exception $er) {
        die('Error al actualizar'.$er->getMessage());
    }
    ?>
    
</body>
</html> 
