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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Template</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
<!--   <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/loginC.css">
</head>
<body>
  <main>
    <div class="container-fluid 1content">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
            <img src="img/logo.png" alt="logo" class="logo">
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Ingresa a  tu Cuenta</h1>
            <form action="#" method="POST">
              <div class="form-group">
                <label>N° de documento</label>
                <input type="number" name="txtu"  class="form-control" required placeholder="example 123.456.789">
              </div>
              <div class="form-group mb-4">
                <label>Password</label>
                <input type="password" name="txtp"  class="form-control" required placeholder="enter your passsword">
              </div>
              <button type="submit"  name="btni" value="Ingresar" class="btn btn-block login-btn">Iniciar Sesion</button>
            </form>
            <p class="login-wrapper-footer-text">¿Aún no tienes Cuenta?</p>
          <div class="cuenta">
            <p> <a href="insertarUsuario.php" class="text-reset">Registrate !!! </a></p><p><a href="insertarEmpresa.php" class="text-reset"> Registra Tu empresa</a></p>
          </div>
            
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="img/login.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
</body>
</html>



