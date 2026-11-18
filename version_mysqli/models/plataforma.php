<?php 
 
/** 
 * MODELO: PLATAFORMA 
 * MySQLi orientado a objetos – MVC procedimental 
 */ 
 
function listarPlataformas($conexion) 
{ 
    $sql = "SELECT id_plataforma, nombre 
            FROM plataforma 
            ORDER BY id_plataforma ASC"; 
 
    $stmt = $conexion->prepare($sql); 
    $stmt->execute(); 
 
    $resultado = $stmt->get_result(); 
    $plataformas = []; 
 
    while ($fila = $resultado->fetch_assoc()) { 
        $plataformas[] = $fila; 
    } 
 
    $stmt->close(); 
 
    return $plataformas; 
} 
 
function existePlataformaPorCodigo($conexion, $codigo) 
{ 
    $sql = "SELECT id_plataforma
      FROM plataforma 
            WHERE id_plataforma = ?"; 
 
    $stmt = $conexion->prepare($sql); 
    $stmt->bind_param("i", $codigo); 
    $stmt->execute(); 
 
    $resultado = $stmt->get_result(); 
    $existe = $resultado->num_rows > 0; 
 
    $stmt->close(); 
 
    return $existe; 
} 
 
function existePlataformaPorNombre($conexion, $nombre) 
{ 
    $sql = "SELECT id_plataforma 
            FROM plataforma 
            WHERE nombre = ?"; 
 
    $stmt = $conexion->prepare($sql); 
    $stmt->bind_param("s", $nombre); 
    $stmt->execute(); 
 
    $resultado = $stmt->get_result(); 
    $existe = $resultado->num_rows > 0; 
 
    $stmt->close(); 
 
    return $existe; 
} 
 
function registrarPlataforma($conexion, $codigo, $nombre) 
{ 
    $sql = "INSERT INTO plataforma 
            (id_plataforma, nombre) 
            VALUES (?, ?)"; 
 
    $stmt = $conexion->prepare($sql); 
    $stmt->bind_param("is", $codigo, $nombre); 
    $stmt->execute(); 
    $stmt->close(); 
 
    return true; 
} 
 
function obtenerPlataformaPorCodigo($conexion, $codigo) 
{ 
    $sql = "SELECT id_plataforma, nombre 
            FROM plataforma 
            WHERE id_plataforma = ?"; 
 
    $stmt = $conexion->prepare($sql); 
    $stmt->bind_param("i", $codigo); 
    $stmt->execute(); 
 
    $resultado = $stmt->get_result(); 
    $plataforma = $resultado->fetch_assoc(); 
 
    $stmt->close(); 
 
    return $plataforma; 
}
?>