<?php

namespace Createlinux\Helper\Math;


class Calculator
{
    protected int|float $value;
    protected int $scale;

    /**
     * @param float|int $initValue
     */
    public function __construct(float|int $initValue = 0, int $scale = 2)
    {
        $this->value = $initValue;
        $this->scale = $scale;
    }

    /**
     * @param int $scale
     * @return $this
     */
    public function setScale(int $scale)
    {
        $this->scale = $scale;
        return $this;
    }

    /**
     * @param float|int $numeric
     * @param $scale
     * @return $this
     */
    public function add(float|int $numeric, ?int $scale = null)
    {
        $this->value = bcadd($this->value, $numeric, $scale ?: $this->scale);
        return $this;
    }

    /**
     * @param float|int $numeric
     * @param $scale
     * @return $this
     */
    public function sub(float|int $numeric, ?int $scale = null)
    {
        $this->value = bcsub($this->value, $numeric, $scale ?: $this->scale);
        return $this;
    }

    /**
     * @param float|int $numeric
     * @param $scale
     * @return $this
     */
    public function div(float|int $numeric, ?int $scale = null)
    {
        $this->value = bcdiv($this->value, $numeric, $scale ?: $this->scale);
        return $this;
    }

    /**
     * @param float|int $numeric
     * @param $scale
     * @return $this
     */
    public function mul(float|int $numeric, ?int $scale = null)
    {
        $this->value = bcmul($this->value, $numeric, $scale ?: $this->scale);
        return $this;
    }

    /**
     * @return float|int
     */
    public function getResult()
    {
        return number_format($this->value,$this->scale,'.','');
    }

    public function getScale()
    {
        return $this->scale;
    }
}