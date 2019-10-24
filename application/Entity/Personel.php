<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Personel
 * @package App\Entity
 * @ORM\Entity()
 */
class Personel extends Person
{
    /**
     * @var string $registrationNumber
     * @ORM\Column(type="string")
     */
    protected $registrationNumber;
    /**
     * @var string $title
     * @ORM\Column(type="string")
     */
    protected $title;
    /**
     * @var Establishment $establishment
     * @ORM\ManyToOne(targetEntity="Establishment")
     */
    protected $establishment;
}
