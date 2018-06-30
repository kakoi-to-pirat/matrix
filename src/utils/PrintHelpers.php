<?php

namespace Matrix\Src\Utils;

class PrintHelpers
{
    /**
     * @param array $array
     */
    public function printArray(array $array)
    {
        echo implode(', ', $array) . PHP_EOL;
    }

    /**
     * @param array $matrices
     */
    public function printMatrices(array $matrices)
    {
        foreach ($matrices as $keyOfMatrix => $matrix) {

            echo $keyOfMatrix . '-я Матрица' . PHP_EOL;

            foreach ($matrix as $rowOfMatrix) {
                echo implode(', ', $rowOfMatrix) . PHP_EOL;
            }
        }
    }
}