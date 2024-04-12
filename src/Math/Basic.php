<?php

namespace Createlinux\Helper\Math;

use \Exception;
use InvalidArgumentException;

class Basic
{

    protected static function checkExtension()
    {
        if (!extension_loaded('bcmath')) {
            throw new Exception("bcmath extension required");
        }
    }

    /**
     * @param int $scale
     * @param ...$number
     * @return int|float|string
     * @throws Exception
     */
    public static function add(int $scale, array|int|float ...$number): int|float|string
    {
        self::checkExtension();
        $numbers = func_get_args();
        $result = 0;
        foreach ($numbers as $index => $number) {
            if (!is_numeric($number) && !is_array($number)) {
                throw new InvalidArgumentException("add(): wrong args!");
            }
            if ($index === 0) {
                continue;
            }
            if (is_array($number)) {
                foreach ($number as $childNumber) {
                    if (!is_numeric($childNumber)) {
                        throw new InvalidArgumentException("add(): wrong args!");
                    }
                    $result = bcadd($result, $childNumber, $scale);
                }
            } else {
                $result = bcadd($result, $number, $scale);
            }
        }
        return $result;
    }

    public static function mul(int $scale, array|int|float ...$number): int|float|string
    {
        self::checkExtension();
        $numbers = func_get_args();
        $result = 1;
        foreach ($numbers as $index => $number) {
            if (!is_numeric($number) && !is_array($number)) {
                throw new InvalidArgumentException("mul(): wrong args!");
            }
            if ($index === 0) {
                continue;
            }
            if (is_array($number)) {
                foreach ($number as $childNumber) {
                    if (!is_numeric($childNumber)) {
                        throw new InvalidArgumentException("mul(): wrong args!");
                    }
                    $result = bcmul($result, $childNumber, $scale);
                }
            } else {
                $result = bcmul($result, $number, $scale);

            }
        }
        return $result;
    }

    /**
     * @throws Exception
     */
    public static function div(int $scale, int|float ...$digits)
    {
        self::checkExtension();
        $numbers = $digits;
        $result = 0;

        foreach ($numbers as $index => $number) {
            if (!is_numeric($number) && !is_array($number)) {
                throw new InvalidArgumentException("div(): wrong args!");
            }
            if ($index === 0) {
                $result = $number;
                continue;
            }

            if ($number <= 0) {
                throw new InvalidArgumentException("number must greater than zero");
            }

            $result = bcdiv($result, $number, $scale);
        }
        return $result;
    }

    /**
     * @param int $scale
     * @param array<int|float>|int|float ...$number
     * @return int|float|string
     * @throws Exception
     */
    public static function sub(int $scale, array|int|float ...$number): int|float|string
    {
        self::checkExtension();
        $numbers = func_get_args();
        $result = 0;
        foreach ($numbers as $index => &$number) {
            if (!is_numeric($number) && !is_array($number)) {
                throw new InvalidArgumentException("sub(): wrong args!");
            }
            if ($index === 0) {
                continue;
            }
            if (!is_array($number)) {
                $secondNumber = $index === 1 ? $number : -($number);
                $result = bcadd($result, $secondNumber, $scale);
            } else {
                foreach ($number as $childIndex => $childNumber) {
                    if ($index === 1) {
                        if ($childIndex === 0) {
                            $secondNumber = $childNumber;
                        } else {
                            $secondNumber = -($childNumber);
                        }
                    } else {
                        $secondNumber = -($childNumber);
                    }

                    $result = bcadd($result, $secondNumber, $scale);
                }
            }
        }
        return $result;
    }


}

