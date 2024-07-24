<?php 
$resultado = $metodos->carritoCompras();
?>
<div class="container2">
    <h2 class="my-4">Carrito de compras </h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Producto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($resultado)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombreProducto']; ?></td>
                <td><?php echo $row['cantidad']; ?></td>
                <td><?php echo number_format($metodos->precioProductoCard(intval($row['cantidad']), floatval($row['precio']))); ?></td>
                <td><img src="<?php echo RUTA_UPLOADS.htmlspecialchars($row['thumb']); ?>" alt="thumb" style="width: 100px;">
                <td>
                    <a href="<?php echo RUTA_PRINCIAL; ?>Actions/deleteCarritoCompras.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>