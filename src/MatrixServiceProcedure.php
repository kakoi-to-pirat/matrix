<?php

namespace Matrix\Src;

/**
 * В данном классе собраны функции для генерации матриц,
 * реализованные с минимальным функционалом, встроенного в язык php
 */
class MatrixServiceProcedure
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
     * Создание матриц с уникальными значениями
     * @return array
     */
    public function createMatrices(): array
    {
        $matrices = [];

        for ($i = 1; $i <= $this->countOfMatrices; $i++) {
            $matrices[$i] = $this->createMatix();
        }

        return $matrices;
    }

    /**
     * Создание матрицы с уникальными значениями
     * @return array
     */
    private function createMatix(): array
    {
        $matrix = [];
        $array = $this->generateUniqArray();

        for ($a = 0; $a < $this->sizeOfMatrix; $a++) {
            for ($b = 0; $b < $this->sizeOfMatrix; $b++) {
                $matrix[$a][$b] = array_shift($array);
            }
        }

        return $matrix;
    }

    /**
     * Генерировать одномерный массив с уникальными значениями
     * @return array
     */
    private function generateUniqArray(): array
    {
        $array = [];

        for ($i = 0; $i < $this->sizeOfMatrix ** 2; $i++) {
            $array[] = $this->generateRandomValueForArray($array);
        }

        return $array;
    }

    /**
     * Сгенерировать случайное, но уникальное число, для добавления в массив в диапозоне чисел от $min до $max
     * @param array $array
     * @return int
     */
    private function generateRandomValueForArray(array $array): int
    {
        $randomValue = random_int($this->minValue, $this->maxValue);

        while (\in_array($randomValue, $array, true)) {
            $randomValue = random_int($this->minValue, $this->maxValue);
        }

        return $randomValue;
    }
}