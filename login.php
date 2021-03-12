<?php require_once('Conexiones/micon.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{

  global $conexion;

  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($conexion, $theValue) : mysqli_escape_string($micon, $theValue);  //inyección que ponemos, para evitar que acepte caracteres extraños

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

?>
<?php
// *** Validate request to login to this site.
ini_set("session.cookie_lifetime","60");
ini_set("session.gc_maxlifetime","60");

if (!isset($_SESSION)) {
  session_start();

}


$loginFormAction = $_SERVER['PHP_SELF'];//devuelve desde el servidor la ruta absoluta del archivo que en ese momento se esta ejecutando
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['strUsuario'])) {
  $loginUsername=$_POST['strUsuario'];
  $password=$_POST['strPassword'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "opciones.php";
  $MM_redirectLoginFailed = "error.php";
  $MM_redirecttoReferrer = false;
  
  mysqli_real_escape_string();
  
  $LoginRS__query=sprintf("SELECT * FROM tblusuarios WHERE strUsuario=%s AND strPassword=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "int")); 
   
   $LoginRS = mysqli_query($conexion, $LoginRS__query) or die(mysqli_error($conexion));
  $row_LoginRS = mysqli_fetch_assoc($LoginRS);
  $loginFoundUser = mysqli_num_rows($LoginRS);
  
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	
	$_SESSION['MM_idCliente'] = $row_LoginRS["idCliente"];

	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  

<title>Acceso Check List JM</title>
<link href="img/favicon1.ico" rel="icon">

<!-- CSS Part Start-->
<link rel="stylesheet" href="css2/bootstrap.min.css">
<link rel="stylesheet" href="css2/sb-admin-2.css">



<!-- CSS Part End-->
<!-- JS Part Start-->
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="js/colorbox/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="js/tabs.js"></script>
<script type="text/javascript" src="js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="js/cloud_zoom.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/jquery.dcjqaccordion.js"></script>
<!--[if lte IE 7]>

<style>
.content { margin-right: -1px; } /* este margen negativo de 1 px puede situarse en cualquiera de las columnas de este diseño con el mismo efecto corrector. */
ul.nav a { zoom: 1; }  /* la propiedad de zoom da a IE el desencadenante hasLayout que necesita para corregir el espacio en blanco extra existente entre los vínculos */
</style>
<![endif]-->


</head>

<body>

     <div class="container">

        
        <div class="row">
            <div class="col-md-4 col-md-offset-4">

                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ACCEDE AL CHECK LIST JM</h3>
                    </div>
                    <div class="panel-body">

                 <form role="form" method="POST" name="form1" action="<?php echo $loginFormAction; ?>">
       
                     <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Usuario" name="strUsuario" id="strUsuario" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Contraseña" name="strPassword" id="strPassword" type="password" value="">
                                </div>

                                
                                <!-- Change this to a button or input when using this as a form -->
                                <input name="" type="submit" id="Acceder" value="Acceder" class="btn btn-lg btn-success btn-block">

                                <input type="hidden" name="MM_insert" value="form1">
                                
                            </fieldset>



          
          
     </form>
    
   </div>
  </div>
  </div>
 </div>
</div>
  



</body>
</html>
