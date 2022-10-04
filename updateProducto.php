<?php
include'conexion.php';
try {
    if (isset($_POST['btna'])) {     
        $nombre=$_POST['txt1'];
        $descripcion=$_POST['txt2'];
        $valor=$_POST['txt3'];
        $descuento=$_POST['txt4'];
        $stock=$_POST['txt5'];
     /*    $categoria=$_POST['txt6']; */

        $sqla="UPDATE productos SET /* imagen_pdto=:img, */nombre_pdto=:nom,descripcion_pdto=:descr,valor_pdto=:val,descuento=:descu,stock=:sto/* ,fk_codigo_categ=:cat */ WHERE id_pdto=".$_REQUEST['cod1'].";";
        $resultado=$base->prepare($sqla);
        $resultado->execute(array(/* ":img"=>$countfiles, */":nom"=>$nombre,":descr"=>$descripcion,":val"=>$valor,":descu"=>$descuento,":sto"=>$stock/* ,":cat"=>$categoria */));
        ?>
        <script type="text/javascript">window.alert("El producto fue actualizado con exito...");window.location="consultaProducto.php"</script>
        <?php
    }else {
        echo "regrese a consultar para hacer el procedimiento =)";
    }
} catch (exception $e) {
    die('ALERTA - Se produjo un error al actualizar'.$e->getMessage());
}
?>