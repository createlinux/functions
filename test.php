<?php
require_once 'vendor/autoload.php';

class A
{
    public static function sayHello(string $name)
    {
        println("Hello {$name}!");
    }
}
print_dump(new A(),new A);