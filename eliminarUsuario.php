<?php
include 'conexion.php';
try{
$sqle="DELETE  FROM usuario WHERE id_usuario=".$_REQUEST['eliminar'].";";
$eliminarcalzado=$base->prepare($sqle);
$eliminarcalzado->execute(array());
?>
<script type="text/javascript">window.alert('Se elimino el usuario con exito');window.location="consultaUsuario.php"</script>
<?php
}catch(Exception $el){
	die('Error al eliminar ' .$el->getMessage());
}
?>