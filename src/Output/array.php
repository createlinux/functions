<?php

if (!function_exists('array_fill_keys_by_values')) {
    /**
     * @param $array array 数组
     * @param $key mixed 键名
     * @return array
     */
    function array_fill_keys_by_values($array, $key)
    {
        return array_combine(array_column($array, $key), $array);
    }
}

if (!function_exists('array_slice_by_key')) {
    function array_slice_by_key($array, $startKey, $endKey)
    {
        foreach ($array as $key => $value) {

        }
    }
}