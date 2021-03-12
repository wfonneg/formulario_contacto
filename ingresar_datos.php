<?php require_once('Conexiones/micon.php'); ?>

<?php



if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";


function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

?>

<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

   
        

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form_nuevo")) {

    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellido"];
    $documento = $_POST["cc"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $barrio = $_POST["barrio"];
    $ciudad = $_POST["ciudad"];
    $pais = $_POST["pais"];


   $consulta1="INSERT INTO tbldatos (nombres, apellidos, cedula, telefono, direccion, barrio, ciudad, pais) VALUES ('$nombre', '$apellidos', '$documento', '$telefono', '$direccion', '$barrio', '$ciudad', '$pais')";
    
     mysqli_select_db($micon, $database_micon) or die ("No se encuentra la BBDD"); //por si hay un error de la base de datos//
    $resultados1=mysqli_query($micon, $consulta1);
    
    
  
             
      }



      $consulta2 = "SELECT * FROM tbldatos ORDER BY id DESC";
      $mostrar = mysqli_query($micon, $consulta2) or die(mysqli_error($micon));
      $row_mostrar = mysqli_fetch_assoc($mostrar);
      $totalRows_mostrar = mysqli_num_rows($mostrar);
          
   
?>
    
<!DOCTYPE html>
<html>
    <head>

     <meta charset="UTF-8" />
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <title>Formulario de contacto</title>  
    
      <!-- Inicio CSS-->
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />


    </head>
    
   <body style="background-color: #EAEBF5;">
    
       <h1>Estos son los datos que has ingresado</h1>
    
        
         <table>
           <tr><td>
            <label>Nombre:</label></td><td> <input type="text" name="nombre" id="nombre" value="<?php echo $row_mostrar['nombres'] ?>"></td></tr>
            <tr><td><label>Apellidos:</label></td><td><input type="text" name="apellido" id="apellido" value="<?php echo $row_mostrar['apellidos'] ?>"></td></tr>     
            <tr><td>  <label>Cédula: </label></td><td><input type="text" name="cc" id="cc" value="<?php echo $row_mostrar['cedula'] ?>"></td></tr>
            <tr><td>  <label>Teléfono: </label></td><td><input type="text" name="telefono" id="telefono" value="<?php echo $row_mostrar['telefono'] ?>"></td></tr>
            <tr><td>  <label>Dirección</label> </td><td><input type="text" name="direccion" id="direccion" value="<?php echo $row_mostrar['direccion'] ?>"></td></tr>
             <tr><td> <label>Barrio: </label></td><td><input type="text" name="barrio" id="barrio" value="<?php echo $row_mostrar['barrio'] ?>"></td></tr>
             <tr><td> <label>Ciudad:</label> </td><td><input type="text" name="ciudad" id="ciudad" value="<?php echo $row_mostrar['ciudad'] ?>"></td></tr>
             <tr><td> <label>País de Origen: </label></td><td><input type="text" name="pais" id="pais" value="<?php echo $row_mostrar['pais'] ?>"></td></tr>
         
                    
         </table>
      
   
    </body>
    
</html>
