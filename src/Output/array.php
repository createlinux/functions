<?php

if (!function_exists('array_fill_keys_by_values')) {
    function array_fill_keys_by_values($array, $key)
    {
        return array_combine(array_column($array, $key), $array);
    }
}