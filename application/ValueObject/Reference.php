<?php


namespace App\ValueObject;


class Reference
{
    private $class;
    private $id;

    /**
     * Reference constructor.
     * @param $class
     * @param $id
     */
    public function __construct($class, $id)
    {
        $this->class = $class;
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


}
