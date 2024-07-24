<section class="main">
    <?php
    $categoria_result = $conn->query("SELECT * FROM categoria");
    $marca_result = $conn->query("SELECT * FROM marcas");
    if (isset($_GET['add'])) {

    ?>
        <div class="container2">
            <h2 class="my-4">Agregar Producto</h2>
            <form method="POST" enctype="multipart/form-data" action="<?php echo RUTA_PRINCIAL; ?>Admin/Actions/codeProduct.php">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoría</label>
                    <select class="form-control" id="categoria" name="categoria" required>
                        <?php while ($row = $categoria_result->fetch_assoc()) : ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="marca">Marca</label>
                    <select class="form-control" id="marca" name="marca" required>
                        <?php while ($row = $marca_result->fetch_assoc()) : ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                </div>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                </div>
                <div class="form-group">
                    <label for="thumb">Thumb</label>
                    <input type="file" class="form-control" id="thumb" name="thumb" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    <?php  }if (isset($_GET['edit'])) { 
        $result = $conn->query("SELECT * FROM producto WHERE id=$_GET[edit]");
        $product = $result->fetch_assoc();
        ?>
        <div class="container2">
    <h2 class="my-4">Editar Producto</h2>
    <form method="POST" enctype="multipart/form-data" action="<?php echo RUTA_PRINCIAL; ?>Admin/Actions/codeProductEdit.php">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>" required>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $product['nombre']; ?>" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required><?php echo $product['descripcion']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="categoria">Categoría</label>
            <select class="form-control" id="categoria" name="categoria" required>
                <?php while($row = $categoria_result->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>" <?php if($row['id'] == $product['categoria']) echo 'selected'; ?>><?php echo $row['nombre']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="marca">Marca</label>
            <select class="form-control" id="marca" name="marca" required>
                <?php while($row = $marca_result->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>" <?php if($row['id'] == $product['marca']) echo 'selected'; ?>><?php echo $row['nombre']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo $product['cantidad']; ?>" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="<?php echo $product['precio']; ?>" required>
        </div>
        <div class="form-group">
            <label for="thumb">Thumb</label>
            <input type="file" class="form-control" id="thumb" name="thumb">
            <img src="<?php echo $product['thumb']; ?>" alt="thumb" style="width: 100px;">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="<?php echo RUTA_PRINCIAL; ?>?pages=product" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
    <?php
    } else {
    ?>
        <section class="main">
            <div class="container">
                <h2 class="my-4">Lista de Productos</h2>
                <a href="<?php echo RUTA_PRINCIAL; ?>?pages=product&add" class=""><i class="fas fa-plus-circle"></i> Agregar Producto</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Categoría</th>
                            <th>Marca</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Thumb</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($result)) : ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['descripcion']; ?></td>
                                <td><?php echo $row['categoria']; ?></td>
                                <td><?php echo $row['marca']; ?></td>
                                <td><?php echo $row['cantidad']; ?></td>
                                <td><?php echo number_format($row['precio']); ?></td>
                                <td><img src="<?php echo RUTA_UPLOADS . htmlspecialchars($row['thumb']); ?>" alt="thumb" style="width: 50px;"></td>
                                <td>
                                    <a href="<?php echo RUTA_PRINCIAL; ?>?pages=product&edit=<?php echo $row['id']; ?>" class=""><i class="far fa-edit"></i></a> 
                                    <a href="<?php echo RUTA_PRINCIAL; ?>Admin/Actions/codeDelete.php?id=<?php echo $row['id']; ?>" class=""><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>


            <?php
        }
            ?>
        </section>
        </div>