<?php

if (!function_exists('println')) {
    function println($anything)
    {
        print_r($anything);
        print_r("\n");
    }
}