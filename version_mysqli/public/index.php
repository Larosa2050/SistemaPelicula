<?php 
 
session_start(); 
 
try { 
 
    $conexion = require __DIR__ . "/../config/database.php"; 
 
    $modulo = $_GET["modulo"] ?? "plataforma"; 
    $accion = $_GET["accion"] ?? "listar"; 
 
    if ($modulo === "plataforma") { 
 
        require_once __DIR__ . 
            "/../controllers/plataformaControllers.php"; 
 
        switch ($accion) { 
 
            case "listar": 
                listarPlataformasController($conexion); 
                break; 
 
            case "nuevo": 
                mostrarFormularioPlataformaController(); 
                break; 
 
            case "guardar": 
                registrarPlataformaController($conexion); 
                break; 
 
            case "ver": 
                verPlataformaController($conexion); 
                break; 
 
            default: 
                http_response_code(404); 
                exit("Acción no encontrada."); 
        } 
 
    } else { 
 
        http_response_code(404); 
        exit("Módulo no encontrado."); 
 
    }
    } catch (mysqli_sql_exception $e) { 
 
    error_log( 
        "Error en la aplicación SISTEMA VIDEOJUEGOS: " . 
        $e->getMessage() 
    ); 
 
    http_response_code(500); 
 
    exit( 
        "Ocurrió un error al procesar la solicitud." 
    ); 
 
}
?>