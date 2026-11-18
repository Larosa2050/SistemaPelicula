<?php 
$tituloPagina = "Registrar plataforma"; 
require __DIR__ . "/../layouts/header.php"; 
?> 
 
<div class="row justify-content-center"> 
    <div class="col-12 col-md-8 col-lg-6"> 
 
        <div class="mb-4"> 
            <h1 class="h3">Registrar plataforma</h1> 
            <p class="text-muted"> 
                Complete los datos para registrar una nueva plataforma. 
            </p> 
        </div> 
 
        <div class="card border-0 shadow-sm"> 
            <div class="card-header bg-primary text-white py-3"> 
                <h2 class="h5 mb-0">Datos de la plataforma</h2> 
            </div> 
 
            <div class="card-body p-4"> 
 
                <?php if (!empty($erroresPlataforma)): ?> 
                    <div class="alert alert-danger"> 
                        <strong>No fue posible registrar la plataforma.</strong> 
                        <ul class="mb-0 mt-2"> 
                            <?php foreach ($erroresPlataforma as $error): ?> 
                                <li><?= htmlspecialchars( 
                                    $error, ENT_QUOTES, "UTF-8" 
                                ); ?></li> 
                            <?php endforeach; ?> 
                        </ul> 
                    </div> 
                <?php endif; ?> 
 
                <form    action="index.php?modulo=plataforma&accion=guardar" 
                    method="POST"> 
 
                    <input type="hidden" name="csrf_token" 
                        value="<?= htmlspecialchars( 
                            $_SESSION["csrf_plataforma"], 
                            ENT_QUOTES, 
                            "UTF-8" 
                        ); ?>"> 
 
                    <div class="mb-3"> 
                        <label for="id_plataforma" 
                            class="form-label fw-semibold"> 
                            Código de la plataforma 
                        </label> 
 
                        <input type="number" 
                            class="form-control" 
                            id="id_plataforma" 
                            name="id_plataforma" 
                            min="1" 
                            max="2147483647" 
                            step="1" 
                            placeholder="Ingrese el código" 
                            value="<?= htmlspecialchars( 
                                (string) $datosPlataforma["id_plataforma"], 
                                ENT_QUOTES, 
                                "UTF-8" 
                            ); ?>" 
                            required> 
 
                        <div class="form-text"> 
                            Ingrese un código entero positivo. 
                        </div> 
                    </div> 
 
                    <div class="mb-4"> 
                        <label for="nombre" 
                            class="form-label fw-semibold"> 
                            Nombre de la plataforma 
                        </label> 
 
                        <input type="text" 
                            class="form-control" 
                            id="nombre" 
                            name="nombre" 
                            maxlength="150" 
                            placeholder="Ingrese el nombre de la plataforma" 
                            value="<?= htmlspecialchars( 
                                $datosPlataforma["nombre"], 
                                ENT_QUOTES, 
                                "UTF-8" 
                            ); ?>" 
                            required> 
 
                        <div class="form-text"> 
                            Máximo 150 caracteres. 
                        </div> 
                    </div> 
 
                    <div class="d-flex flex-wrap gap-2"> 
                        <button type="submit" class="btn btn-primary"> 
                            Guardar plataforma 
                        </button>
                         <a href="index.php?modulo=plataforma&accion=listar" 
                            class="btn btn-outline-secondary"> 
                            Cancelar 
                        </a> 
                    </div> 
 
                </form> 
            </div> 
        </div> 
    </div> 
</div> 
 
<?php require __DIR__ . "/../layouts/footer.php"; ?>