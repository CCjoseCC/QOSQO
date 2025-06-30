<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'administrador') {
    header("Location: ../index.php");
    exit();
}

require __DIR__ . '/vendor/autoload.php';
include 'global/conexion.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$anio = $_POST['anio'] ?? '';
$precio = $_POST['precio'] ?? '';

$condiciones = [];
$parametros = [];

if ($anio !== '') {
    $condiciones[] = 'anio = :anio';
    $parametros[':anio'] = $anio;
}
if ($precio !== '') {
    $condiciones[] = 'preciounitario = :precio';
    $parametros[':precio'] = $precio;
}

$where = count($condiciones) > 0 ? 'WHERE ' . implode(' AND ', $condiciones) : '';

$stmt = $pdo->prepare("
    SELECT 
        idventa,
        idproducto,
        anio,
        preciounitario,
        cantidad,
        (preciounitario * cantidad) AS subtotal
    FROM detalleventa
    $where
    ORDER BY idventa DESC
");
$stmt->execute($parametros);
$detalles = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Crear Excel
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'ID Venta');
$sheet->setCellValue('B1', 'ID Producto');
$sheet->setCellValue('C1', 'Año');
$sheet->setCellValue('D1', 'Precio Unitario');
$sheet->setCellValue('E1', 'Cantidad');
$sheet->setCellValue('F1', 'Subtotal');

// Encabezado con estilo
$sheet->getStyle('A1:F1')->applyFromArray([
    'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
    'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'startColor' => ['rgb' => '3498DB']],
    'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
]);

// Llenar filas
$fila = 2;
foreach ($detalles as $item) {
    $sheet->setCellValue('A' . $fila, $item['idventa']);
    $sheet->setCellValue('B' . $fila, $item['idproducto']);
    $sheet->setCellValue('C' . $fila, $item['anio']);
    $sheet->setCellValue('D' . $fila, $item['preciounitario']);
    $sheet->setCellValue('E' . $fila, $item['cantidad']);
    $sheet->setCellValue('F' . $fila, $item['subtotal']);
    $fila++;
}

// Ajustar ancho
foreach (range('A', 'F') as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
}

// Descargar
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ventas_filtradas.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit();
