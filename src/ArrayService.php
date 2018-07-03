<?php

namespace Matrix\Src;

class ArrayService
{
    /**
     * @param array $arrays
     * @return array $sums
     */
    public function getSumsOfValuesInRowsArray(array $arrays): array
    {
        $sums = [];
        
        foreach ($arrays as $array) {
            $sums = array_merge($sums, array_map(function ($item) {
                return array_sum($item);
            }, $array));
        }

        return $sums;
    }

    /**
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
