<?php
// Asegurarse de que el archivo single.css está correctamente enlazado en la cabecera del documento
echo '<link href="' . RUTA_PRINCIAL . 'css/single.css" rel="stylesheet">';
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">';
echo '<br/>';
$result = $metodos->obtenerProductosPorId($_GET['producto']);
if ($row = mysqli_fetch_array($result)) {
?>
    <div class="container">

        <div class="product-card">

            <div class="product-image">
                <img src="<?php echo RUTA_UPLOADS . htmlspecialchars($row['thumb']); ?>" alt="<?php echo htmlspecialchars($row['nombre']); ?>">
            </div>
            <div class="product-details">
                <?php
                if (isset($_GET['exito'])) {
                    echo "<h5 style='color: green;'>Producto agregado con exito al carrito</h5>";
                } else if (isset($_GET['error'])) {
                    echo '<h5 style="color: red;">' . $_GET['error'] . '</h5>';
                }
                ?>
                <?php
                if (isset($_GET['exitoCompra'])) {
                    echo "<h5 style='color: green;'>Producto comprado con exito al carrito</h5>";
                } else if (isset($_GET['errorCompra'])) {
                    echo '<h5 style="color: red;">' . $_GET['errorCompra'] . '</h5>';
                }
                ?>
                <h1 class="product-title"><?php echo htmlspecialchars($row['nombre']); ?></h1>
                <p class="product-price">$<?php echo htmlspecialchars(number_format($row['precio'], 2)); ?></p>
                <p class="product-description"><?php echo htmlspecialchars($row['descripcion']); ?></p>
                <form class="product-form" action="<?php echo RUTA_PRINCIAL; ?>Actions/insertCarritoCompras.php" method="POST">
                    <input type="hidden" name="producto_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                    <label for="quantity">Cantidad:</label>
                    <input type="number" id="quantity" name="quantity" min="1" value="1">
                    <?php if (isset($_SESSION['id'])) { ?>
                        <a href="<?php echo RUTA_PRINCIAL; ?>Actions/comprar.php?pruducto=<?php echo $row['id']; ?>&cliente=<?php echo $_SESSION['id']; ?>" class="btn2"><i class="fa-solid fa-money-check-dollar"></i> -> Comprar <- </a>
                                <p> </p>
                            <?php } ?>
                            <button type="submit" class="btn"><i class="fa-solid fa-cart-shopping"></i> Añadir al carrito</button>
                </form>

                <div class="product-meta">
                    <p><strong>Categoría:</strong> <?php echo htmlspecialchars($row['categoria']); ?></p>
                    <p><strong>Disponibilidad:</strong> <?php echo htmlspecialchars($row['cantidad']); ?></p>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    echo '<p>Producto no encontrado.</p>';
}
?>