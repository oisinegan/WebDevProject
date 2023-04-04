<?php

namespace App\Util;

class Food
{
    private string $name;
    private int $phValue;

    public function isAcidic(): bool
    {
        return $this->phValue < 7;
    }

//    public function acidString(): string
//    {
//        if($this->isAcidic()){
//            return 'acidic';
//        } else
//        {
//            return '(not acidic)';
//        }
//    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getPhValue(): int
    {
        return $this->phValue;
    }

    /**
     * @param int $phValue
     */
    public function setPhValue(int $phValue): void
    {
        $this->phValue = $phValue;
    }



}