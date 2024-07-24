<section class="main">
    <?php
$rol_result = $conn->query("SELECT * FROM roles");
$result = $conn->query("SELECT persona.*, roles.nombre as rol_nombre FROM persona JOIN roles ON persona.rol = roles.id");

    if (isset($_GET['add'])) {

    ?>
<div class="container2">
    <h2 class="my-4">Agregar Persona</h2>
    <form method="POST">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <select class="form-control" id="rol" name="rol" required>
                <?php while($row = $rol_result->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="<?php echo RUTA_PRINCIAL; ?>?pages=users" class="btn btn-secondary">Cancelar</a>
    </form>

    <?php
 } else {
    ?>

    <div class="container2">
    <h2 class="my-4">Lista de Personas</h2>
    <a href="<?php echo RUTA_PRINCIAL; ?>?pages=users&add"><i class="fas fa-plus-circle"></i>  Agregar Persona</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellido']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['rol_nombre']; ?></td>
                <td>
                    <a href="delete_persona.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
            <?php
        }
            ?>
            </div>
        </section>