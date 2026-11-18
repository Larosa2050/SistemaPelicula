<?php 
 
try { 
    $servidor = "localhost"; 
    $base_datos = "sistemavideojuegos"; 
    $usuario = "root"; 
    $clave = ""; 
 
    $dsn = "mysql:host=$servidor;dbname=$base_datos;charset=utf8mb4"; 
 
    $opciones = [ 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
        PDO::ATTR_EMULATE_PREPARES => false 
    ]; 
 
    $conexion = new PDO($dsn, $usuario, $clave, $opciones); 
 
    return $conexion; 
 
} catch (PDOException $e) { 
    error_log("Error de conexión PDO: " . $e->getMessage()); 
    exit("No se pudo conectar con la base de datos."); 
}
?> 