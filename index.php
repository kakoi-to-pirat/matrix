<?php
/**
 * User: Pirate
 * Date: 29.06.2018
 * Time: 16:01
 */

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';

use Matrix\Src\Utils\PrintHelpers;
use Matrix\Src\MatrixService;
use Matrix\Src\MatrixServiceProcedure;

$config         = new Config();
$printHelpers   = new PrintHelpers();
$matrix         = new MatrixService($config);
//$matrix       = new MatrixServiceProcedure($config);

$matrices       = $matrix->createMatrices();
$sums           = $matrix->getSumsOfValuesInRowsMatrices($matrices);
$uniqueSums     = $matrix->getUniqueValues($sums);

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
