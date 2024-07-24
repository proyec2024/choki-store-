<?php
$resultado = $metodos->compras($_SESSION['id']);
?>
<div class="container2">
    <h2 class="my-4">Mis compras </h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombreProducto']; ?></td>
                    <td><img src="<?php echo RUTA_UPLOADS . htmlspecialchars($row['thumb']); ?>" alt="thumb" style="width: 100px;">
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>