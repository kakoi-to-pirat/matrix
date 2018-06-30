<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';

use Matrix\Src\Utils\PrintHelpers;
use Matrix\Src\ArrayService;
use Matrix\Src\MatrixService;
use Matrix\Src\MatrixServiceProcedure;

$config = new Config();
$printHelpers = new PrintHelpers();
$arrayService = new ArrayService();

try {
    $matrix = new MatrixService($config);
    //$matrix = new MatrixServiceProcedure($config);
} catch (\InvalidArgumentException $e) {
    echo 'Невозможно сгенерировать матрицу: ' . $e->getMessage() . '<br>';
    echo 'Файл: ' . $e->getFile() . '<br>';
    echo 'Строка: ' . $e->getLine() . '<br>';
    exit();
}

$matrices = $matrix->createMatrices();
$sums = $arrayService->getSumsOfValuesInRowsArray($matrices);
$uniqueSums = $arrayService->getUniqueValues($sums);

echo '<pre>';
echo 'Матрицы:' . PHP_EOL;
$printHelpers->printMatrices($matrices);

echo PHP_EOL;
echo 'Список сумм значений в каждой строке каждой матрицы:' . PHP_EOL;
$printHelpers->printArray($sums);

echo PHP_EOL;
echo 'Уникальные суммы:' . PHP_EOL;
$printHelpers->printArray($uniqueSums);

echo '</pre>';
