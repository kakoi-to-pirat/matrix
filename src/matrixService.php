<?php
/**
 * User: Pirate
 * Date: 29.06.2018
 * Time: 16:31
 * Class MatrixProcedure
 */

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

            throw new InvalidArgumentException('Недопустимые значения');
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


    /**
     * @param array $matrices
     * @return array
     */
    public function getSumsOfValuesInRowsMatrices(array $matrices): array
    {
        $result = [];

        foreach ($matrices as $matrix) {
            foreach ($matrix as $row) {
                $result[] = array_sum($row);
            }
        }

        return $result;
    }

    /**
     * Вернуть массив уникальных сумм
     * @param array $values
     * @return array
     */
    public function getUniqueValues(array $values): array
    {
        return array_keys(array_filter(array_count_values($values), function ($item) {
            return $item === 1;
        }));
    }
}