
<?php

 error_reporting(E_ALL ^ E_DEPRECATED);
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$hostname_micon = "localhost";
$database_micon = "base_proimpo";
$username_micon = "root";
$password_micon = "WilJuAn2118";
$micon = mysqli_connect($hostname_micon, $username_micon, $password_micon, $database_micon); 
error_reporting(E_ALL);
ini_set("display_errors", 1);
mysqli_set_charset($micon, 'utf8');
?>

