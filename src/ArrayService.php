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
        return array_map(function ($item) {
            return array_sum($item);
        },array_merge(...$arrays));
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
