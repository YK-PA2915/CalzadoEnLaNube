<?php
include'conexion.php';
try {
    if (isset($_POST['btna'])) { 
        $nombres=$_POST['txt1'];
        $apellidos=$_POST['txt2'];
        $telefono=$_POST['txt3'];
        $direccion=$_POST['txt4'];
        $correo=$_POST['txt5'];
        $sqla="UPDATE usuario SET nombres=:nom,apellidos=:ape,telefono=:tel,direccion=:dir,correo=:cor WHERE id_usuario=".$_REQUEST['cod1'].";";
        $resultado=$base->prepare($sqla);
        $resultado->execute(array(":nom"=>$nombres,":ape"=>$apellidos,":tel"=>$telefono,":dir"=>$direccion,":cor"=>$correo));
        ?>
        <script type="text/javascript">window.alert("El usuario fue actualizado con exito...");window.location="consultaUsuario.php"</script>
        <?php
    }else {
        echo "regrese a consultar para hacer el procedimiento =)";
    }
} catch (exception $e) {
    die('ALERTA - Se produjo un error al actualizar'.$e->getMessage());
}
?>