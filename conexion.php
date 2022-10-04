<?php
try{
$base =new PDO('mysql:host=localhost; dbname=calzado_en_la_nube_php','root','');
//echo"Conexion Exitosa Puede Proceder";
}catch(Exception $e){
    die('Error de conexion '. $e->getMessage());

}
?>