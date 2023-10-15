<?php
// Incluye el autoloader de Composer para cargar las clases de PhpSpreadsheet
require 'vendor/autoload.php';

// Conexión a la base de datos (ajusta los detalles de conexión según tu configuración)
$host = 'localhost:3307';
$dbname = 'login';
$username = 'root';
$password = '';

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}

// Consulta SQL para obtener los datos que deseas exportar a Excel (filtrando por rol_id = 2)
$sql = "SELECT nombres, apellidos, GradoAca FROM usuario WHERE rol_id = 2"; // Ajusta la tabla y las columnas según tu base de datos

try {
    $consulta = $conexion->query($sql);

    // Crear una nueva hoja de cálculo
    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Agregar encabezados de columna y aplicar formato
    $sheet->setCellValue('A1', 'N°'); // Agrega una columna para el número de fila
    $sheet->setCellValue('B1', 'Nombres');
    $sheet->setCellValue('C1', 'Apellidos');
    $sheet->setCellValue('D1', 'Grado Académico');
    
    $headerStyle = [
        'font' => ['bold' => true],
        'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'startColor' => ['rgb' => 'cccccc']]
    ];

    $sheet->getStyle('A1:D1')->applyFromArray($headerStyle);

    // Inicializar la fila actual
    $row = 2;
    $numeroFila = 1; // Inicializa el número de fila en 1

    // Recorrer los resultados de la consulta y agregar datos a la hoja de cálculo
    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $sheet->setCellValue('A' . $row, $numeroFila); // Agrega el número de fila
        $sheet->setCellValue('B' . $row, $fila['nombres']);
        $sheet->setCellValue('C' . $row, $fila['apellidos']);
        $sheet->setCellValue('D' . $row, $fila['GradoAca']);
        
        // Aplicar alineación horizontal centrada a la celda del número de fila
        $sheet->getStyle('A' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        
        $row++;
        $numeroFila++; // Incrementa el número de fila
    }

    // Ajustar el ancho de las columnas automáticamente
    foreach (range('A', 'D') as $column) {
        $sheet->getColumnDimension($column)->setAutoSize(true);
    }

    // Agregar bordes a las celdas
    $styleArray = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ];

    $sheet->getStyle('A1:D' . ($row - 1))->applyFromArray($styleArray);

    // Configurar encabezados para la descarga del archivo Excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="datos_estudiantes.xlsx"');
    header('Cache-Control: max-age=0');

    // Crear un objeto Writer para exportar el archivo Excel
    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

    // Guardar el archivo Excel en la salida (salida directa al navegador)
    $writer->save('php://output');
} catch (PDOException $e) {
    die("Error en la consulta SQL: " . $e->getMessage());
}
?>