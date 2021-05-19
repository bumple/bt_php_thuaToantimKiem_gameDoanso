<?php
class User
{
    public $low;
    public $high;
    public function __construct($data)
    {
        $this->low = $data['low'];
        $this->high = $data['high'];
    }

    /**
     * @return mixed|string
     */
    public function getHigh(): mixed
    {
        return $this->high;
    }

    /**
     * @return mixed|string
     */
    public function getLow(): mixed
    {
        return $this->low;
    }
}