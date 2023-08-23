<?php

if (!function_exists('println')) {
    /**
     * @param $any string|callable|object|array|null|bool|boolean|numeric print everything in new line
     * @return void
     */
    function println($any)
    {
        print_r($any);
        print_r("\n");
    }
}


if (!function_exists('print_dump')) {
    function print_dump(...$any)
    {
        call_user_func_array('var_dump',func_get_args());
    }
}
