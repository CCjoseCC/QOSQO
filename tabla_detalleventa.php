<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'administrador') {
    header("Location: ../index.php");
    exit();
}

include 'global/conexion.php';
include 'principal/cabecera.php';

$anio = $_GET['anio'] ?? '';
$precio = $_GET['precio'] ?? '';

$condiciones = [];
$parametros = [];

if ($anio !== '') {
    $condiciones[] = 'dv.anio = :anio';
    $parametros[':anio'] = $anio;
}
if ($precio !== '') {
    $condiciones[] = 'dv.preciounitario = :precio';
    $parametros[':precio'] = $precio;
}

$where = count($condiciones) > 0 ? 'WHERE ' . implode(' AND ', $condiciones) : '';

$stmt = $pdo->prepare("
    SELECT 
        dv.idventa,
        p.Nombre AS producto,
        dv.anio,
        dv.preciounitario,
        dv.cantidad,
        (dv.preciounitario * dv.cantidad) AS subtotal
    FROM detalleventa dv
    JOIN producto p ON dv.idproducto = p.ID
    $where
    ORDER BY dv.idventa DESC
");
$stmt->execute($parametros);
$detalles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
    body { font-family: Arial; padding: 20px; background: #f8f9fa; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
    th { background: #3498db; color: white; }
    h1 { text-align: center; }
    form { margin-bottom: 15px; text-align: center; }
    input, button { margin: 5px; padding: 6px; }
    .btn-exportar { background: #2ecc71; color: white; border: none; border-radius: 5px; }
</style>

<h1>Detalles de Venta</h1>

<form method="GET">
    <label>Año:
        <input type="number" name="anio" value="<?= htmlspecialchars($anio) ?>">
    </label>
    <label>Precio Unitario:
        <input type="number" step="0.01" name="precio" value="<?= htmlspecialchars($precio) ?>">
    </label>
    <button type="submit">Filtrar</button>
</form>

<form method="POST" action="exportar.php" target="_blank">
    <input type="hidden" name="anio" value="<?= htmlspecialchars($anio) ?>">
    <input type="hidden" name="precio" value="<?= htmlspecialchars($precio) ?>">
    <button type="submit" class="btn-exportar">Exportar a Excel</button>
</form>

<table>
    <thead>
        <tr>
            <th>ID Venta</th>
            <th>Producto</th>
            <th>Año</th>
            <th>Precio Unitario</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($detalles as $fila): ?>
            <tr>
                <td><?= $fila['idventa'] ?></td>
                <td><?= htmlspecialchars($fila['producto']) ?></td>
                <td><?= $fila['anio'] ?></td>
                <td>S/ <?= number_format($fila['preciounitario'], 2) ?></td>
                <td><?= $fila['cantidad'] ?></td>
                <td>S/ <?= number_format($fila['subtotal'], 2) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
