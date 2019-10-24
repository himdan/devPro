<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Address
 * @package App\Entity
 * @ORM\Entity()
 */
class Address extends AbstractEntity
{
    /**
     * @var string $address1
     * @ORM\Column(type="string")
     */
    protected $address1;
    /**
     * @var string $address2
     * @ORM\Column(type="string")
     */
    protected $address2;
    /**
     * @var string $zipCode
     * @ORM\Column(type="string")
     */
    protected $zipCode;
    /**
     * @var string $city
     * @ORM\Column(type="string")
     */
    protected $city;
    /**
     * @var string $country
     * @ORM\Column(type="string")
     */
    protected $country;

}
