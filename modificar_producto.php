<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'administrador') {
    header("Location: ../index.php");
    exit();
}

include 'global/conexion.php';
include 'principal/cabecera.php';

$id = $_GET['id'] ?? null;
$mensaje = '';

if ($id) {
    // --- Código original para MODIFICAR producto (con categoria) ---
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $imagen = $_POST['imagen'];
        $descripcion = $_POST['descripcion'];
        $stock = (int)$_POST['stock'];
        $talla = $_POST['talla'];
        $categoria = $_POST['categoria'];

        if ($stock < 0) {
            $mensaje = "El stock no puede ser negativo.";
        } else {
            $stmt = $pdo->prepare("UPDATE producto SET Nombre = :nombre, Precio = :precio, Imagen = :imagen, Descripcion = :descripcion, Stock = :stock, Talla = :talla, Categoria = :categoria WHERE ID = :id");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':imagen', $imagen);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':stock', $stock);
            $stmt->bindParam(':talla', $talla);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                $mensaje = "Producto actualizado correctamente.";
            } else {
                $mensaje = "Error al actualizar el producto.";
            }
        }
    }

    $stmt = $pdo->prepare("SELECT * FROM producto WHERE ID = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    $categoria = $producto['Categoria'] ?? '';
} else {
    // --- NUEVO: Agregar producto (con categoria) ---
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $imagen = $_POST['imagen'];
        $descripcion = $_POST['descripcion'];
        $stock = (int)$_POST['stock'];
        $talla = $_POST['talla'];
        $categoria = $_POST['categoria'];

        if ($stock < 0) {
            $mensaje = "El stock no puede ser negativo.";
        } else {
            $stmt = $pdo->prepare("INSERT INTO producto (Nombre, Precio, Imagen, Descripcion, Stock, Talla, Categoria) VALUES (:nombre, :precio, :imagen, :descripcion, :stock, :talla, :categoria)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':imagen', $imagen);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':stock', $stock);
            $stmt->bindParam(':talla', $talla);
            $stmt->bindParam(':categoria', $categoria);

            if ($stmt->execute()) {
                $mensaje = "Producto agregado correctamente.";
                // Limpiar variables para formulario vacío
                $nombre = $precio = $imagen = $descripcion = $categoria = '';
                $stock = 0;
                $talla = 35;
            } else {
                $mensaje = "Error al agregar el producto.";
            }
        }
    } else {
        // Inicializar variables vacías para agregar
        $nombre = '';
        $precio = '';
        $imagen = '';
        $descripcion = '';
        $stock = 0;
        $talla = 35;
        $categoria = '';
    }
}
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color:rgb(233, 171, 58);
        margin: 0;
        padding: 0;
    }

    .alert-float {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 999;
        background-color: #d1ecf1;
        color: #0c5460;
        border: 1px solid #bee5eb;
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        min-width: 300px;
        max-width: 80%;
        text-align: center;
        font-size: 16px;
        display: none;
    }

    .container {
        max-width: 600px;
        margin: 80px auto;
        background: #fff;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 0 20px rgba(255, 79, 79, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 25px;
    }

    .form-label {
        display: block;
        margin-bottom: 6px;
        color: #555;
        font-weight: bold;
    }

    .form-control {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 16px;
    }

    textarea.form-control {
        resize: vertical;
    }

    .btn {
        padding: 10px 20px;
        font-size: 16px;
        text-decoration: none;
        border: none;
        border-radius: 8px;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #3498db;
        color: white;
    }

    .btn-secondary {
        background-color: #95a5a6;
        color: white;
    }

    .btn + .btn {
        margin-left: 10px;
    }

    .img-preview {
        display: block;
        max-height: 200px;
        margin: 10px auto 20px auto;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .form-buttons {
        display: flex;
        justify-content: space-between;
    }

    .top-buttons {
        max-width: 600px;
        margin: 40px auto 0 auto;
        display: flex;
        justify-content: flex-end;
    }
</style>

<?php if ($mensaje): ?>
    <div class="alert-float" id="alerta"><?php echo htmlspecialchars($mensaje); ?></div>
    <script>
        const alerta = document.getElementById('alerta');
        alerta.style.display = 'block';
        setTimeout(() => {
            alerta.style.display = 'none';
        }, 4000);
    </script>
<?php endif; ?>

<div class="top-buttons">
    <?php if ($id): ?>
        <a href="<?php echo strtok($_SERVER["REQUEST_URI"], '?'); ?>" class="btn btn-primary">Agregar Nuevo Producto</a>
    <?php else: ?>
        <a href="../index.php" class="btn btn-secondary">Volver a Inicio</a>
    <?php endif; ?>
</div>

<main class="container">
    <h1><?php echo $id ? "Modificar Producto" : "Agregar Nuevo Producto"; ?></h1>

    <form method="post">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($id ? $producto['Nombre'] : $nombre); ?>" required class="form-control">

        <label for="precio" class="form-label">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" value="<?php echo htmlspecialchars($id ? $producto['Precio'] : $precio); ?>" required class="form-control">

        <label for="talla" class="form-label">Talla:</label>
        <select id="talla" name="talla" required class="form-control">
            <?php
                $tallas = range(35, 42);
                foreach ($tallas as $t) {
                    $selected = ($id ? $producto['Talla'] : $talla) == $t ? 'selected' : '';
                    echo "<option value=\"$t\" $selected>$t</option>";
                }
            ?>
        </select>

        <label for="stock" class="form-label">Stock:</label>
        <input type="number" id="stock" name="stock" value="<?php echo htmlspecialchars($id ? $producto['Stock'] : $stock); ?>" required class="form-control" min="0">

        <label for="imagen" class="form-label">URL Imagen:</label>
        <input type="text" id="imagen" name="imagen" value="<?php echo htmlspecialchars($id ? $producto['Imagen'] : $imagen); ?>" required class="form-control" oninput="document.getElementById('preview').src=this.value">

        <img id="preview" src="<?php echo htmlspecialchars($id ? $producto['Imagen'] : $imagen); ?>" alt="Vista previa" class="img-preview">

        <label for="categoria" class="form-label">Categoría:</label>
        <input type="text" id="categoria" name="categoria" value="<?php echo htmlspecialchars($id ? $categoria : $categoria); ?>" required class="form-control">

        <label for="descripcion" class="form-label">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="4" required class="form-control"><?php echo htmlspecialchars($id ? $producto['Descripcion'] : $descripcion); ?></textarea>

        <div class="form-buttons">
            <button type="submit" class="btn btn-primary"><?php echo $id ? "Guardar Cambios" : "Agregar Producto"; ?></button>
            <?php if ($id): ?>
                <a href="../index.php" class="btn btn-secondary">Volver</a>
            <?php else: ?>
                <a href="../index.php" class="btn btn-secondary">Cancelar</a>
            <?php endif; ?>
        </div>
    </form>
</main>

<?php include 'principal/pie.php'; ?>
