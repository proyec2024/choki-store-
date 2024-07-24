<?php
$result = $conn->query("SELECT * FROM marcas");
if (isset($_GET['add'])) {
?>
    <div class="container2">
        <h2 class="my-4">Agregar Marca</h2>
        <form method="POST" action="<?php echo RUTA_PRINCIAL; ?>Admin/Actions/codeMarcasAdd.php">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="<?php echo RUTA_PRINCIAL ?>?pages=marcas" class="btn btn-secondary">Cancelar</a>
        </form>

    <?php
}
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM marcas WHERE id=$id");
    $marca = $result->fetch_assoc();
    ?>
        <div class="container2">
            <h2 class="my-4">Editar Marca</h2>
            <form method="POST" action="<?php echo RUTA_PRINCIAL; ?>Admin/Actions/codeMarcasEdit.php">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $marca['nombre']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="<?php echo RUTA_PRINCIAL ?>?pages=marcas" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    <?php
} else {
    ?>
        <section class="main">
            <div class="container2">
                <h2 class="my-4">Lista de Marcas</h2>
                <a href="<?php echo RUTA_PRINCIAL; ?>?pages=marcas&add"><i class="fas fa-plus-circle"></i> Agregar Marca</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td>
                                    <a href="<?php echo RUTA_PRINCIAL; ?>?pages=marcas&edit=<?php echo $row['id']; ?>"><i class="far fa-edit"></i></a>
                                    <a href="<?php echo RUTA_PRINCIAL; ?>Admin/Actions/codeMarcasDelete.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </section>
    <?php
}
    ?>