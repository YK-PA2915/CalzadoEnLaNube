<?php
include 'conexion.php';
?>

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
	<link rel="stylesheet" href="css/stylePrincipal.css">
<style>
	div {
		/* background-color: rgb(151,200,233); */
		margin: 0 auto;
		padding: 5%;
	
	}
	form {
		background-color: rgb(151,200,233);
         width: 500px;
		 margin: 0 auto;
		 font-size: 1.5em;
	}
</style>
</head>
<body>
<nav>
    <span class="logo">
        <img class="logoo"  src="img/logo.png">
    </span>
    <ul>
     <!-- <li> <a href="admin.php">Inicio</a> </li> -->
      <li> <a href="insertarProducto.php"> Productos</a></li>
      <li> <a href="consultaProducto.php">Listar Productos </a> </li>
     <!--  <li> <a href="/FrmEmpresa">Empresas</a> </li>
      <li> <a href="/FrmCompra">Compras</a> </li>
      <li> <a href="/FrmCategoria">Categoria</a> </li> -->
            <input type="text">
                <li></li>
               
                <!-- <li class="ini"> Iniciar Sesion</li> -->
                <li class="ini"> <a href="login.php">Salir</a></li>
            </ul>
 </nav>

<div>
<form action="" method="POST"  enctype="multipart/form-data"   class="border shadow p-3 rounded" >
		<table>
			<tr>
				<td>Imagen</td>
				<td>
					<input type="file" name="files[]"  >
				</td>
				
			</tr>
			<tr>
				<td>Nombres</td>
				<td>
					<input type="text" name="txtn">
				</td>
				
			</tr>
		
			<tr>
				<td>Descripcion</td>
				<td>
					<input type="text" name="txtd">
				</td>
				
			</tr>
			<tr>
				<td>TALLA</td>
				<td>
				<label for=""> <input type="checkbox" name="txtt" value="33">33</label>
				<label for=""> <input type="checkbox" name="txtt" value="34">34</label>
				<label for=""> <input type="checkbox" name="txtt" value="35">35</label>
				<label for=""> <input type="checkbox" name="txtt" value="36">36</label>
				<label for=""> <input type="checkbox" name="txtt" value="37">37</label>
				<label for=""> <input type="checkbox" name="txtt" value="38">38</label>
				<label for=""> <input type="checkbox" name="txtt" value="39">39</label>
				<label for=""> <input type="checkbox" name="txtt" value="40">40</label>
				<label for=""> <input type="checkbox" name="txtt" value="41">41</label>
				<label for=""> <input type="checkbox" name="txtt" value="42">42</label>
				<label for=""> <input type="checkbox" name="txtt" value="43">43</label>


				</td>
			</tr>
			<tr>
				<td>Valor</td>
				<td>
					<input type="number" name="txtv">
				</td>
				
			</tr>
			<tr>
				<td>Descuento</td>
				<td>
					<input type="number" name="txtdes">
				</td>
				
			</tr>
			<tr>
				<td>Stock</td>
				<td>
					<input type="number" name="txts">
				</td>
				
			</tr>
          
            <tr>
				<td>Categoria</td>
			<td>
				<select name="txtc" id="">
					<option value="">Seleccione La Categoria</option>
					<?php
					try {
						$sqlc="SELECT * FROM categoria";
						$resultadoc=$base->prepare($sqlc);
						$resultadoc->execute(array());
						while ($consultac=$resultadoc->fetch(PDO::FETCH_ASSOC)) {
							?>
							<option value="<?php echo $consultac['codigo_categoria'];?>"> <?php echo $consultac['nombre_categoria'];?></option>
							<?php
						}
					} catch (exepction $ae) {
                        die('Error al enviar categoria'.$ae->getMessage());
                    }
					?>
				</select>
			</td>
				
			</tr>
			<tr>
				<td>Empresa</td>
				<td>
					<input type="number" name="txte">
				</td>
				
			</tr>
					
			<tr>
				<td>
					<input type="submit" name="btnP" value="INGRESAR">
				</td>
				
			</tr>
			</table>
			</form>
</div>

<?php
if(isset($_POST['btnP'])) {
    try{
	$countfiles = count($_FILES['files']['name']);
    $nombre = $_POST['txtn'];
    $descriopcion = $_POST['txtd'];
	$talla = $_POST['txtt'];
    $valor = $_POST['txtv'];
	$descuento = $_POST['txtdes'];
    $stock = $_POST['txts'];
    $categoria = $_POST['txtc'];
	$empresa=$_POST['txte'];

    

    $sqlU = "INSERT INTO  productos (`id_pdto`,`imagen_pdto`,`nombre_pdto`,`descripcion_pdto`,`talla`, `valor_pdto`, `descuento`,`stock`, `fk_codigo_categ`,`fk_empresa`)
     VALUES (NULL,?,?,?,?,?,?,?,?,?)";
    $resultado=$base ->prepare($sqlU);
    

	for($i = 0; $i < $countfiles; $i++) {
		$filename = $_FILES['files']['name'][$i];
		$carpeta = 'img/'.$filename;
		$file_extension = pathinfo($carpeta, PATHINFO_EXTENSION); 
		$file_extension = strtolower($file_extension);
		$valid_extension = array("png","jpeg","jpg");
		if(in_array($file_extension, $valid_extension)) {

			if(move_uploaded_file(
				$_FILES['files']{'tmp_name'}[$i],$carpeta)
			) {
				$resultado->execute(array(
					$carpeta,
					$nombre ,
					$descriopcion,
					$talla,
					$valor ,
					$descuento,
					$stock,
					$categoria,
					$empresa
				));


			}
		}
	}
?>
<script type="text/javascript">window.alert('registro guardado en la base de datos')</script>
<?php

}
catch( Exception $e){
	die('No se puede insertar datos a la tabla productos' .$e->getMessage());
}
}
?>
		
		
	
    
</body>
</html>