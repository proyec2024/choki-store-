<div class="container">
    <?php
    // Suponiendo que $metodos->obtenerProductos() devuelve un resultado de consulta válido
    $result = $metodos->obtenerProductos();
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <div class="card">
            <img src="<?php echo RUTA_UPLOADS.htmlspecialchars($row['thumb']); ?>" alt="<?php echo htmlspecialchars($row['nombre']); ?>" width="25px">
            <div class="card-content">
                <h3 class="card-title"><?php echo htmlspecialchars($row['nombre']); ?></h3>
                <p class="card-description"><?php echo htmlspecialchars($row['descripcion']); ?></p>
                <p class="card-price">$<?php echo htmlspecialchars(number_format($row['precio'], 2)); ?></p>
                <a href="<?php echo RUTA_PRINCIAL; ?>?pages=product&producto=<?php echo htmlspecialchars($row['id']); ?>" class="btn"> <i class="fa-solid fa-money-check-dollar"></i> Comprar</a>
            </div>
        </div>
    <?php
    }
    ?>
</div>