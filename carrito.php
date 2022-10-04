<?php
session_start(); 
$mensaje="";
if(isset($_POST["btnaccion"])){
    switch($_POST["btnaccion"]){
        case 'Agregar':
        if(is_numeric($_POST["id"])){
            $ID=$_POST["id"];
            $mensaje.="Ok ... id correcto =".$ID."<br>";
        }else{
            $mensaje="UPS... ID erroneo..";
        }
        if(is_string($_POST["nombre"])){
            $NOMBRE=$_POST["nombre"];
            $mensaje.="Ok ... nombre correcto =".$NOMBRE."<br>";
        }else{
            $mensaje-="UPS... nombre ERRONEO =";
        }
        if(is_numeric($_POST["precio"])){
            $PRECIO=$_POST["precio"];
            $mensaje.="Ok ... precio correcto =".$PRECIO."<br>";
        }else{
            $mensaje="UPS... precio ERRONEO";
        }
        if(is_numeric($_POST["cantidad"])){
            $CANTIDAD=$_POST["cantidad"];
            $mensaje.="Ok ... cantidad correcto =".$CANTIDAD."<br>";
        }else{
            $mensaje="UPS... cantidad ERRONEO";
        }
         if(!isset($_SESSION['CARRITO'])){
            $producto=array(
                'ID'=>$ID,
                'NOMBRE'=>$NOMBRE,
                'PRECIO'=>$PRECIO,
                'CANTIDAD'=>$CANTIDAD);
                $_SESSION['CARRITO'][0]=$producto;
            }else{
                $numeroproductos=count($_SESSION['CARRITO']);
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'PRECIO'=>$PRECIO,
                    'CANTIDAD'=>$CANTIDAD);
                    $_SESSION['CARRITO'][$numeroproductos]=$producto; 
            }
            $mensaje=print_r($_SESSION,true); 
        break;
        case 'Eliminar':
            if(is_numeric($_POST['id'])){
               $ID=$_POST['id'];
               foreach($_SESSION['CARRITO'] as $indice=>$producto){
                   if($producto['ID']==$ID){
                       unset($_SESSION['CARRITO'][$indice]);
                       echo "<script>alert('Elemento borrado con exito');</script>";
                   }
               }
            }else{
               $mensaje.="UPS esto no sirve";
            }
   
           break;
    }
}
?>