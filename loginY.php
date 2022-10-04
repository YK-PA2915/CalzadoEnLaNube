<?php
include'conexion.php';
session_start();
if (isset($_POST['btni'])) {
    if (empty($_POST['txtu']) || (empty($_POST['txtp']))) {
        ?>
        <script type="text/javascript">window.alert("Usuario o contraseña obligatorios ::.::")</script>
        <?php
    }if($_POST['txtu'] && $_POST['txtp']){
        $sqli="SELECT * FROM usuario INNER JOIN roles ON usuario.rol_id=id WHERE  username=:user AND password=:passw";
        $resultado=$base->prepare($sqli);
        $resultado->execute(array(":user"=>$_POST['txtu'],":passw"=>$_POST['txtp']));
        while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['ident']=$consulta['identificacion'];
            $_SESSION['user']=$consulta['username'];
            $_SESSION['nombre']=$consulta['nombres'];
            $_SESSION['rol']=$consulta['rol_id'];
        }
        if ($_SESSION['rol'] == 2) {
            header("location:perfilCliente.php");
          
        }
        elseif ($_SESSION['rol'] !== 2){
            
            $sqli="SELECT * FROM empresas INNER JOIN roles ON empresas.rol_id_em=id WHERE  id_propietario =:user AND password=:passw";
            $resultado=$base->prepare($sqli);
            $resultado->execute(array(":user"=>$_POST['txtu'],":passw"=>$_POST['txtp']));
            while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)) {
              /*   $_SESSION['ident']=$consulta['identificacion']; */
                $_SESSION['user']=$consulta['id_propietario'];
               $_SESSION['nombre']=$consulta['nombre_emp'];
                $_SESSION['rol']=$consulta['rol_id_em'];
            }
            if  ($_SESSION['rol'] == 1) {
                header("location:perfilEmpresa.php");
            }
            else {
                ?>
                <script type="text/javascript">window.alert("Usuario o contraseña erroneos ....");window.location="login.php"</script>
                <?php
            }
        }
      

        }


    }
        /*  else {
            $sqli="SELECT * FROM empresas INNER JOIN roles ON empresas.rol_id_em=id WHERE  id_propietario =:user AND password=:passw";
            $resultado=$base->prepare($sqli);
            $resultado->execute(array(":user"=>$_POST['txtu'],":passw"=>$_POST['txtp']));
            while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)) {
               $_SESSION['ident']=$consulta['identificacion'];
                $_SESSION['user']=$consulta['id_propietario'];
                $_SESSION['nombre']=$consulta['nombres'];
                $_SESSION['rol']=$consulta['rol_id_em'];
            }
        } */
        /* $verificar=$resultado->rowCount();
        if ($verificar > 0 ) {
            header("location:perfil.php");
        } else {
            ?>
            <script type="text/javascript">window.alert("Usuario o contraseña erroneos ....")</script>
            <?php
        } */
        
 //    $verificar=$resultado->rowCount();
/* if ($_SESSION['rol'] == 1) { //empresa
      header("location:perfilEmpresa.php");
      }elseif ($_SESSION['rol'] == 2) {
       header("location:perfilCliente.php");
   } */
 
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login2.css">
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
	</div>
	<div class="form-container sign-in-container">
		<form action="#"method="POST">
        <h1>Entrar</h1>
        <!-- <div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div> -->
			<span>o usa tu cuenta</span>
			<input placeholder="usuario" type="text"placeholder="Usuario" required name="txtu"/>
			<input placeholder="contraseña" type="password" name="txtp" placeholder="Contraseña" required />
			<a href="#">¿Olvidaste tu contraseña?</a>
            <button type="submit"  name="btni" value="Ingresar" class="boton-p">Iniciar Sesion</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				
<h1>¡Bienvenido de nuevo!</h1>
<p>Para mantenerse conectado con nosotros, inicie sesión con su información personal</p>
<button class="ghost" id="signIn">Iniciar sesión</button>
</div>
			<div class="overlay-panel overlay-right">
            <h1>¡Hola, Registrate!</h1>
<p>Ingrese sus datos personales y comience a viajar con nosotros</p>
<button><a href="insertarUsuario.php">Cliente</a></button>
<button><a href="insertarEmpresa.php">Empresa</a></button>
			</div>
		</div>
	</div>
</div>

<!-- <script src="js/login.js"></script> -->
</body> 
</html>



