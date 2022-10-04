<?php
include 'conexion.php';
include 'menuEmpresa.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>insertar Categoria</title>

	<style>
	.nn {
		/* background-color: rgb(151,200,233); */
		margin: 0 auto;
		padding: 13%;
		margin-top: 30px;
	
	}
	form {
		background-color: rgb(151,200,233);
         width: 500px;
		 margin: 0 auto;
	}
	
	a {
		text-decoration: none;
	}
</style>
</head>
<body>
<div class="nn">
	<form action="" method="POST">
		<table>
			<tr>
				<td>codigo</td>
				<td>
					<input type="number" name="txtc">
				</td>
				
			</tr>
			<tr>
				<td>Nombre Categoria</td>
				<td>
					<input type="text" name="txtn">
				</td>
				
			</tr>		
			<tr>
				<td>
					<input type="submit" name="btnU" value="registrar">
					
				</td>
			
				
			</tr>
<?php
if(isset($_POST['btnU'])) {
    try{
    $codigo=$_POST['txtc'];
    $nombre = $_POST['txtn'];
   

    $sqlU = "INSERT INTO categoria (`codigo_categoria`, `nombre_categoria`) 
	 VALUES(:codigo,:nombre)";
    $resultadoL=$base ->prepare($sqlU);
    $resultadoL->execute(array(":codigo"=>$codigo,":nombre"=>$nombre));
?>
<script type="text/javascript">window.alert('registro guardado en la base de datos')</script>
<?php

}
catch( Exception $e){
	die('No se puede insetar datos a la tabla categoria' .$e->getMessage());
}
}
?>
		</table>
		
	</form>
</div>

</body>
</html>