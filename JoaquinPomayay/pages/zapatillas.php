<?php
include '../global/config.php';
include '../global/conexion.php';
include '../carrito.php';
include '../principal/cabecera.php';
?>

<main>
    <div class="slider">
        <img src="https://pixcap.com/cdn/library/templates/f1ee999f-4f9e-4b5d-83b5-51d04681a999/thumbnail/9158b87d-1079-4973-9514-ee4ada0adf54_transparent_1422_800.webp" alt="principal">
    </div>

    <div class="container">
        <!-- Filtros -->
        <div class="filters">
            <h2>Filtros</h2>
            
            <div class="filter">
                <h3>Tallas 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><rect x="3" y="7" width="18" height="12" rx="2" ry="2"/><path d="M16 3v4M8 3v4M3 12h18"/></svg>
                </h3>
                <label><input type="checkbox"> 38</label>
                <label><input type="checkbox"> 39</label>
                <label><input type="checkbox"> 40</label>
                <label><input type="checkbox"> 41</label>
                <label><input type="checkbox"> 42</label>
            </div>
            
            <div class="filter">
                <h3>Color 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><circle cx="12" cy="12" r="10"/><path d="M8 14h.01M12 10h.01M16 16h.01"/></svg>
                </h3>
                <label><input type="checkbox"> Negro</label>
                <label><input type="checkbox"> Blanco</label>
                <label><input type="checkbox"> Maron</label>
                <label><input type="checkbox"> Azul</label>
                <label><input type="checkbox"> Crema</label>
            </div>
        
            <div class="filter">
                <h3>Marca 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><path d="M8 16l4-4-4-4M16 16l-4-4 4-4"/></svg>
                </h3>
                <label><input type="checkbox"> Boston</label>
                <label><input type="checkbox"> Bata</label>
                <label><input type="checkbox"> Palmer</label>
                <label><input type="checkbox"> Modare</label>
                <label><input type="checkbox"> Billy Gin</label>
            </div>
        
            <div class="filter">
                <h3>Precio 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M12 1l9 9-9 13-9-13L12 1z"/><path d="M12 8v6M9 12h6"/></svg>
                </h3>
                <label><input type="checkbox"> $90 - $100</label>
                <label><input type="checkbox"> $100 - $150</label>
                <label><input type="checkbox"> Más de $150</label>
            </div>
        </div>

        <!-- Productos -->
        <div class="row mt-4">
        <?php
            $categoria = 'zapatilla';
            $sentencia = $pdo->prepare("SELECT * FROM producto WHERE categoria = :categoria");
            $sentencia->bindParam(':categoria', $categoria);
            $sentencia->execute();
            $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        ?>    
        <?php foreach($listaProductos as $producto){ ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch mb-4">
                <div class="card h-100 w-100">
                    <img 
                        title="<?php echo $producto['Nombre'];?>" 
                        alt="<?php echo $producto['Nombre'];?>" 
                        class="card-img-top" 
                        src="<?php echo $producto['Imagen'];?>"
                        style="object-fit:cover; height:250px;"
                    >
                    <div class="card-body d-flex flex-column">
                        <span><?php echo $producto['Nombre'];?></span>  
                        <h5 class="card-title"><?php echo $producto['Precio'];?></h5>
                        <p class="card-text">Descripción</p>

                        <!-- Mostrar stock -->
                        <p class="card-text"><strong>Stock disponible:</strong> <?php echo $producto['Stock']; ?></p>

                        <form action="" method="post" class="mt-auto">
                            <input type="hidden" name="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
                            <input type="hidden" name="nombre" value="<?php echo openssl_encrypt($producto['Nombre'],COD,KEY);?>">
                            <input type="hidden" name="precio" value="<?php echo openssl_encrypt($producto['Precio'],COD,KEY);?>">
                            <input type="hidden" name="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">
                            <button class="btn btn-primary w-100" 
                                name="btnAccion" 
                                value="Agregar" 
                                type="submit"
                                <?php if ($producto['Stock'] <= 0) echo 'disabled'; ?>>
                                <?php echo ($producto['Stock'] <= 0) ? 'Sin stock' : 'Agregar al carrito'; ?>
                            </button>
                        </form>

                        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'administrador') { ?>
                            <a href="/JoaquinPomayay/modificar_producto.php?id=<?php echo $producto['ID']; ?>" class="btn btn-warning w-100 mt-2">
                                Modificar
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</main>

<?php include '../principal/pie.php'; ?> 
