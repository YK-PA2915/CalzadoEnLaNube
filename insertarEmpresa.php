<?php
include'conexion.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>insertar Empresa</title>
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
			<label for="exampleFormControlInput1" class="form-label">NIT</label>
			<input type="text" class="form-control" name="txtn" id="exampleFormControlInput1 rounded-3" placeholder="Introduce NIT">
		</div>
		<div class="mb-6">
			<label for="exampleFormControlInput1" class="form-label">Nombre Empresa</label>
			<input type="text" class="form-control" name="txtne" id="exampleFormControlInput1 rounded-3" placeholder="Introduce su Nombre de Empresa">
		</div>
		<div class="mb-6">
			<label for="exampleFormControlInput1" class="form-label">Telefono Empresa</label>
			<input type="text" class="form-control rounded-3" name="txtte" id="exampleFormControlInput1 " placeholder="Introduce su telefono">
		</div>
		<div class="mb-6">
			<label for="exampleFormControlInput1" class="form-label">Direccion Empresa</label>
			<input type="text" class="form-control" name="txtde" id="exampleFormControlInput1" placeholder="Introduce su Direccion Empresa">
		</div>
		<div class="mb-6">
			<label for="exampleFormControlInput1" class="form-label">Identificacion Propietario</label>
			<input type="number" class="form-control" name="txtI" id="exampleFormControlInput1" placeholder="Introduce su Identificacion">
		</div>
		<div class="mb-6">
			<label for="exampleFormControlInput1" class="form-label">Nombre Propietario</label>
			<input type="text" class="form-control" name="txtnp" id="exampleFormControlInput1" placeholder="Introduce su Nombre">
		</div>
		<div class="mb-6">
			<label for="exampleFormControlInput1" class="form-label">Password</label>
			<input type="password" class="form-control" name="txtp" id="exampleFormControlInput1" placeholder="Introduce su Contraseña">
		</div>
		<div class="col-auto">
    		<button type="submit" name="btnU" value="registrar" class="btn btn-primary mb-3">Registrar</button>
			<a class="btn btn-danger" href="login.php">ATRAS</a>
  		</div>
		<!-- 	<tr>
				<td>Rol</td>
				<td>
				<input type="number" name="txtp">
				</td>		
			</tr> -->
				
	<!-- 		<tr>
				<td>Username</td>
				<td>
					<input type="text" name="txtI">
				</td>
				
			</tr> -->

		<!-- 	<tr>
				<td>Rol</td>
				<td>
				<input type="number" name="txtp">
				</td>
				
			</tr> -->
<?php
if(isset($_POST['btnU'])) {
    try{
    $nit=$_POST['txtn'];
	$nomE=$_POST['txtne'];
    $telE = $_POST['txtte'];
    $dirE = $_POST['txtde'];
    $idenP = $_POST['txtI'];   
	$nomP = $_POST['txtnp'];
    $password = $_POST['txtp'];
	$rol = 1;

    

    $sqlU = "INSERT INTO empresas (`NIT`, `nombre_emp`, `telefono_emp`, `direccion_emp`, `id_propietario`, `nombre_propi`, `password`, `rol_id_em`) 
	 VALUES(:nit,:nomE,:telE,:dirE,:idenP,:nomP,:pass,:rol)";
    $resultadoL=$base ->prepare($sqlU);
    $resultadoL->execute(array(":nit"=>$nit,":nomE"=>$nomE,":telE"=>$telE,":dirE"=>$dirE
	,":idenP"=>$idenP,":nomP"=>$nomP,":pass"=>$password,"rol"=>$rol));
?>
<script type="text/javascript">window.alert('registro guardado en la base de datos')</script>
<?php

}
catch( Exception $e){
	die('No se puede insetar datos a la tabla empresa' .$e->getMessage());
}
}
?>
		</table>
		
	</form>
</div>

</body>
</html>