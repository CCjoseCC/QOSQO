<?php
include '../global/config.php';
include '../global/conexion.php';
include '../carrito.php';
include '../principal/cabecera.php';
?>

<main>
    <div class="slider">
        <img src="https://calimodpruebaio.vtexassets.com/assets/vtex.file-manager-graphql/images/da5a914e-104b-47a1-84e7-df19eacfb6b5___aa9edce40b75c8297dfe71a201c278fc.jpg" alt="principal">
    </div>

    <div class="container">
        <!-- Filtros -->
        <div class="filters">
            <h2>Filtros</h2>
            
            <div class="filter">
                <h3>Tallas</h3>
                <?php for ($i = 35; $i <= 42; $i++) { ?>
                    <label><input type="checkbox"> <?php echo $i; ?></label>
                <?php } ?>
            </div>
            
            <div class="filter">
                <h3>Color</h3>
                <?php foreach(['Negro', 'Blanco', 'Rojo', 'Azul', 'Verde'] as $color) { ?>
                    <label><input type="checkbox"> <?php echo $color; ?></label>
                <?php } ?>
            </div>
        
            <div class="filter">
                <h3>Marca</h3>
                <?php foreach(['Nike', 'Adidas', 'Puma', 'Reebok', 'Vans'] as $marca) { ?>
                    <label><input type="checkbox"> <?php echo $marca; ?></label>
                <?php } ?>
            </div>
        
            <div class="filter">
                <h3>Precio</h3>
                <?php foreach(['Menos de $50', '$50 - $100', '$100 - $150', 'Más de $150'] as $rango) { ?>
                    <label><input type="checkbox"> <?php echo $rango; ?></label>
                <?php } ?>
            </div>
        </div>

        <!-- Productos -->
        <div class="row mt-4">
        <?php
            $categoria = 'zapatos';
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

                        <!-- Mostrar stock disponible -->
                        <p class="mb-1"><strong>Stock:</strong> <?php echo (int)$producto['Stock']; ?></p>

                        <form action="" method="post" class="mt-auto">
                            <input type="hidden" name="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
                            <input type="hidden" name="nombre" value="<?php echo openssl_encrypt($producto['Nombre'],COD,KEY);?>">
                            <input type="hidden" name="precio" value="<?php echo openssl_encrypt($producto['Precio'],COD,KEY);?>">
                            <input type="hidden" name="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">
                            <input type="hidden" class="stock-producto" value="<?php echo (int)$producto['Stock']; ?>">

                            <button 
                                class="btn btn-primary w-100" 
                                name="btnAccion" 
                                value="Agregar" 
                                type="submit"
                                <?php echo ($producto['Stock'] == 0) ? 'disabled' : ''; ?>>
                                <?php echo ($producto['Stock'] == 0) ? 'Sin stock' : 'Agregar al carrito'; ?>
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

<script>
// Validación para evitar agregar productos sin stock
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', function(event) {
        const stockInput = this.querySelector('.stock-producto');
        if (stockInput) {
            const stock = parseInt(stockInput.value);
            if (stock === 0) {
                event.preventDefault();
                mostrarAlerta("No se puede añadir el producto porque no hay stock disponible.");
            }
        }
    });
});

function mostrarAlerta(mensaje) {
    let alerta = document.createElement('div');
    alerta.className = 'alert-float';
    alerta.textContent = mensaje;
    document.body.appendChild(alerta);
    alerta.style.display = 'block';
    setTimeout(() => {
        alerta.style.display = 'none';
        alerta.remove();
    }, 4000);
}
</script>

<style>
.alert-float {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 9999;
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
    padding: 15px 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    min-width: 300px;
    max-width: 80%;
    text-align: center;
    font-size: 16px;
}
</style>

<?php include '../principal/pie.php'; ?>
