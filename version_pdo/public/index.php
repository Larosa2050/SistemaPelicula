<?php 
$conexion = require __DIR__ . "/../config/database.php"; 
?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sistemavideojuegos - PDO</title>
</head>
<body>
    <H1>Sistema sistemavideojuegos</H1>
    <p><strong>Conexion PDO:</strong> Conectado Correctamente.</p>
    <p><strong>Servidor:</strong></p>
    <?= htmlspecialchars( 
$conexion->getAttribute(PDO::ATTR_CONNECTION_STATUS), 
ENT_QUOTES, 
"UTF-8" 
); ?>
<p><strong>Base de Datos: </strong> sistemavideojuegos</p>
</body>
</html>