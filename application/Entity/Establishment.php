<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Class Establishment
 * @package App\Entity
 * @ORM\Entity()
 */
class Establishment extends AbstractEntity
{

    /**
     * @var integer $type
     * @ORM\Column(type="integer")
     */
    protected $type;
    /**
     * @var Address $address
     * @ORM\ManyToOne(targetEntity="Address")
     *
     */
    protected $address;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return Establishment
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return Establishment
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }



}
