<?php 
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . '/bd/plantillas/master.php';

    if (isset($_SESSION['ciudad']))
    {
        $ciudad = $_SESSION['ciudad'];
        unset($_SESSION['ciudad']);
    }
    else
    {
        $ciudad = ['id_ciudad' => '', 'nombre' => ''];
    }
?>

<?php startblock('titulo') ?>
CIUDAD
<?php endblock() ?>

<?php startblock('principal') ?>
    <div class="container mt-3">
        <?php require_once './partials/mostrarMensajes.php' ?>

        <div class="card">
            <div class="card-header bg-primary text-white">
                CIUDAD
            </div> 
            <div class="card-body">
                <form action="../controllers/ciudadController.php" method="post">
                    <!-- Identificador de la ciudad -->
                    <div class="form-group row">
                        <label for="inputIdCiudad" class="col-sm-2 col-form-label col-form-label-sm">Identificador</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" name="id_ciudad" id="inputIdCiudad" 
                                aria-describedby="helpId" placeholder="Identidicador de la ciudad"
                                value="<?php echo $ciudad['id_ciudad'] ?>" autofocus
                            >
                        </div>
                    </div>

                    <!-- Nombre de la ciudad -->
                    <div class="form-group row">
                        <label for="inputNombre" class="col-sm-2 col-form-label col-form-label-sm">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" name="nombre" id="inputNombre" 
                                aria-describedby="helpId" placeholder="Nombre de la ciudad"
                                value="<?php echo $ciudad['nombre'] ?>" autofocus
                            >
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="form-group row">
                        <div class="col-sm-10 offset-2">
                            <button type="submit" name="alta" class="btn btn-primary btn-sm col-boton">ACEPTAR</button>
                            <a href="ciudades.php" class="btn btn-secondary btn-sm col-boton">CANCELAR</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


<?php endblock() ?>

