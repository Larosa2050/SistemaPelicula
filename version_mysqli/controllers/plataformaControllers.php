<?php 
 
require_once __DIR__ . "/../models/plataforma.php"; 
 
function listarPlataformasController($conexion) 
{ 
    $plataformas = listarPlataformas($conexion); 
 
    require __DIR__ . "/../views/plataforma/listar.php"; 
} 
 
function mostrarFormularioPlataformaController() 
{ 
    if (empty($_SESSION["csrf_plataforma"])) { 
        $_SESSION["csrf_plataforma"] = bin2hex( 
            random_bytes(32) 
        ); 
    } 
 
    $datosPlataforma = [ 
        "id_plataforma" => "", 
        "nombre" => "" 
    ]; 
 
    if (isset($_SESSION["datos_plataforma"])) { 
        $datosPlataforma = $_SESSION["datos_plataforma"]; 
        unset($_SESSION["datos_plataforma"]); 
    } 
 
    $erroresPlataforma = $_SESSION["errores_plataforma"] ?? []; 
    unset($_SESSION["errores_plataforma"]); 
 
    require __DIR__ . "/../views/plataforma/formulario.php"; 
} 
 
function registrarPlataformaController($conexion) 
{ 
    if ($_SERVER["REQUEST_METHOD"] !== "POST") { 
        header( 
            "Location: index.php?modulo=plataforma&accion=nuevo" 
        ); 
        exit; 
    } 
 
    $tokenRecibido = $_POST["csrf_token"] ?? ""; 
    $tokenSesion = $_SESSION["csrf_plataforma"] ?? ""; 
 
    if ( 
        $tokenSesion === "" || 
        $tokenRecibido === "" || 
        !hash_equals($tokenSesion, $tokenRecibido) 
    ) { 
        $_SESSION["errores_plataforma"] = [ 
            "El formulario ha expirado o no es válido. Intente nuevamente." 
        ]; 
 
        header( 
            "Location: index.php?modulo=plataforma&accion=nuevo" 
        ); 
        exit; 
    } 
 
    $codigoOriginal = trim($_POST["id_plataforma"] ?? ""); 
 $nombre = trim($_POST["nombre"] ?? ""); 
 
    $_SESSION["datos_plataforma"] = [ 
        "id_plataforma" => $codigoOriginal, 
        
        "nombre" => $nombre 
    ]; 
 
    $errores = []; 
 
    if ($codigoOriginal === "") { 
        $errores[] = "El código de la plataforma es obligatorio."; 
    } 
 
    if ($nombre === "") { 
        $errores[] = "El nombre de la plataforma es obligatorio."; 
    } 
 
    $codigo = filter_var( 
        $codigoOriginal, 
        FILTER_VALIDATE_INT 
    ); 
 
    if ($codigo === false) { 
        $errores[] = "El código debe ser un número entero válido."; 
    } elseif ($codigo <= 0) { 
        $errores[] = "El código debe ser mayor que cero."; 
    } elseif ($codigo > 2147483647) { 
        $errores[] = "El código supera el valor máximo permitido."; 
    } 
 
    if ( 
        $nombre !== "" && 
        mb_strlen($nombre, "UTF-8") > 150 
    ) { 
        $errores[] = "El nombre no debe superar los 150 caracteres."; 
    } 
 
    if (!empty($errores)) { 
        $_SESSION["errores_plataforma"] = $errores; 
        header( 
            "Location: index.php?modulo=plataforma&accion=nuevo" 
        ); 
        exit; 
    } 
 
    try { 
 
        if (existePlataformaPorCodigo($conexion, $codigo)) { 
            $errores[] = "El código de la plataforma ya está registrado."; 
        } 
 
        if (existePlataformaPorNombre($conexion, $nombre)) { 
            $errores[] = "El nombre de la plataforma ya está registrado."; 
        } 
 
        if (!empty($errores)) { 
            $_SESSION["errores_plataforma"] = $errores; 
            header( 
                "Location: index.php?modulo=plataforma&accion=nuevo" 
            ); 
            exit; 
        } 
 
        registrarPlataforma($conexion, $codigo, $nombre); 
          unset($_SESSION["datos_plataforma"]); 
        unset($_SESSION["csrf_plataforma"]); 
 
        $_SESSION["mensaje_plataforma"] = [ 
            "tipo" => "success", 
            "texto" => "La plataforma se registró correctamente." 
        ]; 
 
        header( 
            "Location: index.php?modulo=plataforma&accion=listar" 
        ); 
        exit; 
 
    } catch (mysqli_sql_exception $e) { 
 
        error_log( 
            "Error al registrar plataforma: " . 
            $e->getMessage() 
        ); 
 
        if ($e->getCode() === 1062) { 
            $_SESSION["errores_plataforma"] = [ 
                "El código o nombre de la plataforma ya existe." 
            ]; 
        } else { 
            $_SESSION["errores_plataforma"] = [ 
                "No fue posible registrar la plataforma. Intente nuevamente." 
            ]; 
        } 
 
        header( 
            "Location: index.php?modulo=plataforma&accion=nuevo" 
        ); 
        exit; 
    } 
} 
 
function verPlataformaController($conexion) 
{ 
    $codigoOriginal = $_GET["codigo"] ?? ""; 
 
    $codigo = false; 
 
    if (is_string($codigoOriginal)) { 
        $codigo = filter_var( 
            $codigoOriginal, 
            FILTER_VALIDATE_INT 
        ); 
    } 
 
    $plataforma = null; 
    $mensajeConsulta = ""; 
 
    if ($codigo === false || $codigo <= 0) { 
 
        http_response_code(400); 
 
        $mensajeConsulta = "El código de la plataforma no es válido."; 
 
    } else { 
 
        $plataforma = obtenerPlataformaPorCodigo( 
            $conexion, 
            $codigo 
        ); 
if ($plataforma === null) { 
http_response_code(404); 
$mensajeConsulta = "La plataforma solicitada no existe."; 
} 
} 
require __DIR__ . "/../views/plataforma/ver.php"; 
}
?>