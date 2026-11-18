<?php 
$tituloPagina = "Consultar plataforma"; 
require __DIR__ . "/../layouts/header.php"; 
?> 
<div class="row justify-content-center"> 
     <div class="col-12 col-md-8 col-lg-6"> 
 
        <div class="mb-4"> 
            <h1 class="h3">Consulta de plataforma</h1> 
            <p class="text-muted"> 
                Información de la plataforma seleccionada. 
            </p> 
        </div> 
 
        <?php if ($plataforma !== null): ?> 
 
            <div class="card border-0 shadow-sm"> 
                <div class="card-header bg-primary text-white py-3"> 
                    <h2 class="h5 mb-0">Datos de la plataforma</h2> 
                </div> 
 
                <div class="card-body p-4"> 
 
                    <div class="mb-4"> 
                        <label class="form-label text-muted"> 
                            Código de la plataforma 
                        </label> 
                        <div class="form-control bg-light"> 
                            <?= htmlspecialchars( 
                                (string) $plataforma["id_plataforma"], 
                                ENT_QUOTES, 
                                "UTF-8" 
                            ); ?> 
                        </div> 
                    </div> 
 
                    <div class="mb-4"> 
                        <label class="form-label text-muted"> 
                            Nombre de la plataforma 
                        </label> 
                        <div class="form-control bg-light"> 
                            <?= htmlspecialchars( 
                                $plataforma["nombre"], 
                                ENT_QUOTES, 
                                "UTF-8" 
                            ); ?> 
                        </div> 
                    </div> 
 
                    <a 
                        href="index.php?modulo=plataforma&accion=listar" 
                        class="btn btn-outline-secondary" 
                    > 
                        Volver al listado 
                    </a> 
 
                </div> 
            </div> 
 
        <?php else: ?> 
 
            <div class="card border-0 shadow-sm"> 
                <div class="card-body p-4 text-center">
                       <h2 class="h5"> 
                        No se pudo consultar la plataforma 
                    </h2> 
 
                    <div class="alert alert-warning mt-3"> 
                        <?= htmlspecialchars( 
                            $mensajeConsulta, 
                            ENT_QUOTES, 
                            "UTF-8" 
                        ); ?> 
                    </div> 
 
                    <a 
                        href="index.php?modulo=plataforma&accion=listar" 
                        class="btn btn-primary" 
                    > 
                        Volver al listado 
                    </a> 
 
                </div> 
            </div> 
 
        <?php endif; ?> 
 
    </div> 
</div> 
 
<?php 
require __DIR__ . "/../layouts/footer.php"; 
?> 