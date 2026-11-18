<?php 
 
$tituloPagina = "Listado de plataformas"; 
 
require __DIR__ . "/../layouts/header.php"; 
 
?> 
 
<div class="d-flex flex-wrap justify-content-between 
            align-items-center mb-4"></div> 
        <h1 class="h3 mb-1">Gestión de plataformas</h1> 
        <p class="text-muted mb-0"> 
            Listado de plataformas registradas en el sistema. 
        </p> 
    </div> 
 
    <span class="badge text-bg-primary fs-6"> 
        Total: <?= count($plataformas); ?> 
    </span> 
 
</div> 
 
<?php if (isset($_SESSION["mensaje_plataforma"])): ?> 
 
    <?php $mensaje = $_SESSION["mensaje_plataforma"]; ?> 
 
    <div 
        class="alert alert-<?= htmlspecialchars( 
            $mensaje["tipo"], 
            ENT_QUOTES, 
            "UTF-8" 
        ); ?> alert-dismissible fade show" 
        role="alert" 
    > 
        <?= htmlspecialchars( 
            $mensaje["texto"], 
            ENT_QUOTES, 
            "UTF-8" 
        ); ?> 
 
        <button 
            type="button" 
            class="btn-close" 
            data-bs-dismiss="alert" 
            aria-label="Cerrar" 
        ></button> 
    </div> 
 
    <?php unset($_SESSION["mensaje_plataforma"]); ?> 
 
<?php endif; ?> 
 
<div class="card shadow-sm border-0"> 
 
    <div class="card-header bg-white py-3"> 
        <div class="d-flex flex-wrap justify-content-between 
                    align-items-center gap-2"> 
 
            <h2 class="h5 mb-0">Plataformas registradas</h2> 
 
            <a 
                href="index.php?modulo=plataforma&accion=nuevo" 
                class="btn btn-primary" 
            > 
                + Nueva plataforma 
            </a> 
 
        </div> 
    </div> 
 
    <div class="card-body"> 
 
        <?php if (!empty($plataformas)): ?>
             <div class="table-responsive"> 
                <table class="table table-striped 
                              table-hover align-middle"> 
 
                    <thead class="table-dark"> 
                        <tr> 
                            <th scope="col">N.°</th> 
                            <th scope="col">Código</th> 
                            <th scope="col">Nombre de la plataforma</th> 
                            <th scope="col">Acciones</th> 
                        </tr> 
                    </thead> 
 
                    <tbody> 
 
                        <?php $numero = 1; ?> 
 
                        <?php foreach ($plataformas as $plataforma): ?> 
 
                            <tr> 
                                <td><?= $numero++; ?></td> 
 
                                <td> 
                                    <?= htmlspecialchars( 
                                        (string) $plataforma["id_plataforma"], 
                                        ENT_QUOTES, 
                                        "UTF-8" 
                                    ); ?> 
                                </td> 
 
                                <td> 
                                    <?= htmlspecialchars( 
                                        $plataforma["nombre"], 
                                        ENT_QUOTES, 
                                        "UTF-8" 
                                    ); ?> 
                                </td> 
 
                                <td> 
                                    <a 
                                        href="index.php?modulo=plataforma&accion=ver&codigo=<?= 
urlencode((string) $plataforma["id_plataforma"]); ?>" 
                                        class="btn btn-sm btn-outline-info" 
                                    > 
                                        Ver detalle 
                                    </a> 
                                </td> 
                            </tr> 
 
                        <?php endforeach; ?> 
 
                    </tbody> 
                </table> 
            </div> 
 
        <?php else: ?> 
 
            <div class="alert alert-info mb-0"> 
                No existen plataformas registradas. 
            </div> 
 
        <?php endif; ?> 
 
    </div> 
</div> 
<?php 
require __DIR__ . "/../layouts/footer.php"; 
?>