<?php 
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . '/bd/plantillas/master.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/bd/librerias/bd.php';
    $ciudades = selectAllCiudades();
    if (isset($_SESSION['error']))
    {
        $error = true;
    }
    else
    {
        $error = false;
    }
?>

<?php startblock('titulo') ?>
CIUDADES
<?php endblock() ?>

<?php startblock('principal') ?>
<div class="container mt-3">

    <?php require_once './partials/mostrarMensajes.php' ?>

    <?php if (!$error) { ?>
    <div class="card">
        <div class="card-body">
            <a href="ciudad.php" class="btn btn-primary btn-sm" >NUEVA CIUDAD</a>
        </div>
    </div>

    <div class="card mt-2 border-primary">
        <div class="card-header bg-primary text-white">
            Lista de ciudades
        </div>
        <div class="card-body">
            <?php 
                if(count($ciudades) == 0)
                {
            ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    No hay ciudades
                </div>


            <?php   }
                    else
                    {
            ?>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($ciudades as $ciudad) 
                                {
                            ?>
                                <tr>
                                    <td><?php echo $ciudad['nombre'] ?></td>
                                    <td class="col-boton">
                                        <form action="./ciudad_edit.php" method="post">
                                            <button type="submit" name="editar" class="btn btn-info btn-sm col-boton">EDITAR</button>
                                            <input type="hidden" name="id_ciudad" value="<?php echo $ciudad['id_ciudad'] ?>">
                                        </form>
                                    </td>
                                    <td class="col-boton">
                                    
                                        <button type="button" class="btn btn-danger btn-sm col-boton" data-toggle="modal" data-target="#exampleModal" 
                                        data-id_ciudad="<?php echo $ciudad['id_ciudad'] ?>" data-nombre="<?php echo $ciudad['nombre'] ?>">BORRAR</button>

                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Estas seguro de borrar este registro?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="./../controllers/ciudadController.php" method="post">
                                                    <button type="submit" class="btn btn-primary btn-sm col-boton" name="borrar">ACEPTAR</button>
                                                    <input type="hidden" name="id_ciudad" id="id_ciudad">
                                                    <button type="button" class="btn btn-secondary btn-sm col-boton" data-dismiss="modal">CANCELAR</button>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

            <?php } ?> 
        </div>
    </div>
    <?php } ?>
</div>

<!-- Modificar los datos del Modal -->
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id_ciudad = button.data('id_ciudad') // Extract info from data-* attributes
        var nombre = button.data('nombre') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text(nombre)
        // modal.find('.modal-footer input').val(id_ciudad)
        modal.find('.modal-footer #id_ciudad').val(id_ciudad)
    })
</script>

<?php endblock() ?>