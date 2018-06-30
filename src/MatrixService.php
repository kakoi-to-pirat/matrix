<?php

namespace Matrix\Src;

class MatrixService
{
    private $sizeOfMatrix;
    private $minValue;
    private $maxValue;
    private $countOfMatrices;

    /**
     * Конструктор матрицы
     * @param $config
     */
    public function __construct($config)
    {
        if ($config->minValue >= $config->maxValue || $config->sizeOfMatrix ** 2 > $config->maxValue) {

            throw new \InvalidArgumentException('недопустимые значения');
        }

        $this->sizeOfMatrix = $config->sizeOfMatrix;
        $this->minValue = $config->minValue;
        $this->maxValue = $config->maxValue;
        $this->countOfMatrices = $config->countOfMatrices;
    }

    /**
     * @return array
     */
    public function createMatrices(): array
    {
        $matrices = [];

        for ($i = 1; $i <= $this->countOfMatrices; $i++) {
            // сгенерировать массив от $minValue до $maxValue
            $matrices[$i] = range($this->minValue, $this->maxValue);

            //перемешать значения в массиве в случайном порядке
            shuffle($matrices[$i]);

            // разбить одномерный массив $matrices[$i] на многмерный размерностью $sizeOfMatrix
            $matrices[$i] = array_chunk($matrices[$i], $this->sizeOfMatrix);
        }

        return $matrices;
    }
}