<?php
$result2 = $conn->query("SELECT * FROM categoria");
if(isset($_GET['add']))
{
?>
<div class="container2">
    <h2 class="my-4">Agregar Categoría</h2>
    <form method="POST" action="<?php echo RUTA_PRINCIAL; ?>Admin/Actions/codeCategoryAdd.php">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="<?php echo RUTA_PRINCIAL ?>?pages=category" class="btn btn-secondary">Cancelar</a>
    </form>
<?php 
}if(isset($_GET['edit'])){
$id = $_GET['edit'];
$result = $conn->query("SELECT * FROM categoria WHERE id=$id");
$categoria = $result->fetch_assoc();
?>
<div class="container2">

    <h2 class="my-4">Editar Categoría</h2>
    <form method="POST" action="<?php echo RUTA_PRINCIAL; ?>Admin/Actions/codeCategoryEdit.php">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $categoria['nombre']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="<?php echo RUTA_PRINCIAL ?>?pages=category" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php 
}else{
?>
<section class="main">
<div class="container2">
    <h2 class="my-4">Lista de Categorías</h2>
    <a href="<?php echo RUTA_PRINCIAL; ?>?pages=category&add"><i class="fas fa-plus-circle"></i> Agregar Categoría</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result2->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td>
                    <a href="<?php echo RUTA_PRINCIAL; ?>?pages=category&edit=<?php echo $row['id']; ?>"><i class="far fa-edit"></i></a>
                    <a href="<?php echo RUTA_PRINCIAL; ?>Admin/Actions/codeCategoryDetele.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash-alt"></i></a>
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