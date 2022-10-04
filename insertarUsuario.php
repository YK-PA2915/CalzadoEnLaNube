<?php
include'conexion.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>insertar Usuarios</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/registrarse.css">
</head>
<body>
<div>
	<form action="" method="POST">
		<div class="mb-6">
			<label for="exampleFormControlInput1" class="form-label">Identificacion</label>
			<input type="number" class="form-control" name="txtI" id="exampleFormControlInput1 rounded-3" placeholder="Introduce su Identificacion">
		</div>
		<div class="mb-6">
			<label for="exampleFormControlInput1" class="form-label">Nombres</label>
			<input type="text" class="form-control" name="txtn" id="exampleFormControlInput1 rounded-3" placeholder="Introduce sus Nombres">
		</div>
		<div class="mb-6">
			<label for="exampleFormControlInput1" class="form-label">Apellidos</label>
			<input type="text" class="form-control rounded-3" name="txta" id="exampleFormControlInput1 " placeholder="Introduce sus Apellidos">
		</div>
		<div class="mb-6">
			<label for="exampleFormControlInput1" class="form-label">Telefono</label>
			<input type="text" class="form-control" name="txtt" id="exampleFormControlInput1" placeholder="Introduce su Telefono">
		</div>
		<div class="mb-6">
			<label for="exampleFormControlInput1" class="form-label">Direccion</label>
			<input type="text" class="form-control" name="txtd" id="exampleFormControlInput1" placeholder="Introduce su Direccion">
		</div>
		<div class="mb-6">
			<label for="exampleFormControlInput1" class="form-label">Email</label>
			<input type="email" class="form-control" name="txte" id="exampleFormControlInput1" placeholder="Introduce su Email">
		</div>
		<div class="mb-6">
			<label for="exampleFormControlInput1" class="form-label">Contraseña</label>
			<input type="password" class="form-control" name="txtp" id="exampleFormControlInput1" placeholder="Introduce su Contraseña">
		</div>
		<div class="col-auto">
    		<button type="submit" name="btnU" value="registrar" class="btn btn-primary mb-3">Registrar</button>
  		</div>
		<!-- 	<tr>
				<td>Rol</td>
				<td>
				<input type="number" name="txtp">
				</td>		
			</tr> -->
				<a class="btn btn-danger" href="login.php">ATRAS</a>

<?php
if(isset($_POST['btnU'])) {
    try{
    $iii=$_POST['txtI'];
	$user=$_POST['txtI'];
    $nombres = $_POST['txtn'];
    $apellidos = $_POST['txta'];
    $telefono = $_POST['txtt'];
    $direccion = $_POST['txtd'];
    $correo = $_POST['txte'];
    $rol = 2;
    $password = $_POST['txtp'];

    

    $sqlU = "INSERT INTO usuario (`id_usuario`, `identificacion`, `username`, `nombres`,
	 `apellidos`, `telefono`, `direccion`, `correo`, `password`, `rol_id`) 
	 VALUES('',:iii,:user,:nom,:ape,:tel,:dir,:cor,:pass,:rol)";
    $resultadoL=$base ->prepare($sqlU);
    $resultadoL->execute(array(":iii"=>$iii,":user"=>$user,":nom"=>$nombres,":ape"=>$apellidos
	,":tel"=>$telefono,":dir"=>$direccion,":cor"=>$correo,":pass"=>$password,"rol"=>$rol));
?>
<script type="text/javascript">window.alert('registro guardado en la base de datos')</script>
<?php

}
catch( Exception $e){
	die('No se puede insetar datos a la tabla usuarios' .$e->getMessage());
}
}
?>
		</table>
		
	</form>
</div>

</body>
</html>