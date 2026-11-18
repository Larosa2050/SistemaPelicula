<?php 
mysqli_report( 
MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT 
); 
try { 
$servidor = "localhost"; 
$usuario = "root"; 
$clave = ""; 
$base_datos = "sistemavideojuegos"; 
$conexion = new mysqli( 
$servidor, 
$usuario, 
$clave, 
$base_datos 
); 
$conexion->set_charset("utf8mb4"); 
return $conexion; 
} catch (mysqli_sql_exception $e) { 
error_log("Error de conexión MySQLi: " . $e->getMessage()); 
exit("No se pudo conectar con la base de datos."); 
}

?> 
