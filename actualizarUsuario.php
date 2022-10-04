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
        $sqlu="SELECT * FROM usuario WHERE id_usuario =".$_REQUEST['cod'].";";
        $resultado=$base->prepare($sqlu);
        $resultado->execute(array());
        while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <form action="updateUsuario.php?cod1=<?php echo $_REQUEST['cod']; ?>" name="f1" method="POST">
            <table>
                <h1>Actualizar Datos</h1>
                <tr>
                    <td>Nombres :</td>
                    <td colspan"2"><input type="text" name="txt1" required value="<?php echo $consulta['nombres'] ?>"></td>
                </tr>
                <tr>
                    <td>Apellidos :</td>
                    <td colspan"2"><input type="text" name="txt2" required value="<?php echo $consulta['apellidos'] ?>"></td>
                </tr>
                <tr>
                    <td>Teléfono :</td>
                    <td colspan"2"><input type="text" name="txt3" required value="<?php echo $consulta['telefono'] ?>"></td>
                </tr>
                <tr>
                    <td>Dirección :</td>
                    <td colspan"2"><input type="text" name="txt4" required value="<?php echo $consulta['direccion'] ?>"></td>
                </tr>
                <tr>
                    <td>correo :</td>
                    <td colspan"2"><input type="email" name="txt5" required value="<?php echo $consulta['correo'] ?>"></td>
                </tr>
                <tr>
                <tr>
                    <td>Tipo de usuario:</td>
                    <td colspan"2"><input type="enum" name="txt6"  disabled=»disabled»  required value="<?php echo $consulta['tipo_usuario'] ?>"></td>
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
