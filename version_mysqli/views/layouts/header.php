<?php 
$tituloPagina = $tituloPagina ?? "Sistema de Videojuegos"; 
?> 
  
<!DOCTYPE html> 
<html lang="es"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title> 
        <?= htmlspecialchars($tituloPagina, ENT_QUOTES, "UTF-8"); ?> 
        | SISTEMA VIDEOJUEGOS 
    </title> 
  
    <!-- Bootstrap CSS --> 
    <link   href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
    > 
</head> 
  
<body class="bg-light"> 
  
    <!-- Barra de navegación --> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
        <div class="container"> 
            <a class="navbar-brand fw-bold" href="index.php"> 
                SISTEMA VIDEOJUEGOS 
            </a> 
  
            <button 
                class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#menuPrincipal" 
                aria-controls="menuPrincipal" 
                aria-expanded="false" 
                aria-label="Mostrar navegación"> 
                <span class="navbar-toggler-icon"></span> 
            </button> 
  
            <div class="collapse navbar-collapse" id="menuPrincipal"> 
                <ul class="navbar-nav ms-auto"> 
                    <li class="nav-item"> 
                        <a class="nav-link active" 
                           href="index.php?modulo=plataforma&accion=listar"> 
                            Plataformas 
                        </a> 
                    </li> 
                </ul> 
            </div> 
        </div> 
    </nav> 
  
 
