<?php
include'conexion.php';
try {
    $sqld="DELETE FROM productos WHERE id_pdto=".$_REQUEST['prop2'].";";
    $resultado=$base->prepare($sqld);
    $resultado->execute(array());
    ?>
    <script type="text/javascript">window.alert('El producto fue eliminado correctamente');window.location="consultaProducto.php"</script>
    <?php
} catch (exception $e) {
    die('error en eliminar1'.$e->getMessage());
}
?>