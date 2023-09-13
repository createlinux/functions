<?php

namespace Createlinux\Helper\NaturalLanguage;


class Regular
{

    protected string $string;

    public function __construct(string $string)
    {
        $this->string = $string;
    }

    /**
     * @return bool 是否有中文
     */
    public function hasChinese(): bool
    {
        $pattern = '/[\x{4e00}-\x{9fa5}]+/u';
        return preg_match($pattern, $this->string);
    }

    /**
     * @return bool 是否有日文
     */
    public function hasJapanese(): bool
    {
        $pattern = '/[\x{3040}-\x{30FF}]+/u';
        return preg_match($pattern, $this->string);
    }

}