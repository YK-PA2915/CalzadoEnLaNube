<?php
include 'conexion.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mensaje de eliminación</title>
</head>
<body>
<?php
try{
	$sqlu="SELECT * FROM usuario WHERE id_usuario=".$_REQUEST['segurou'].";";
$resultado=$base->prepare($sqlu);
$resultado->execute(array());
while($consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
	echo "Esta seguro de eliminar el usuario ".$consulta['nombres']; 

	?>
	<table>
		<tr>
			<td><a href="eliminarUsuario.php?eliminar=<?php echo $_REQUEST['segurou'];?>"><img src="img/aceptar.png" width="30px"></a></td>
			<td><a href="javascript:history.go(-1)"><img src="img/cancelar.png" width="30px"></a></td>
		</tr>
	</table>
	<?php
}
}catch(Exception $e){
	die('error en al eliminar' .$e->getMessage());
}
?>
</body>
</html>