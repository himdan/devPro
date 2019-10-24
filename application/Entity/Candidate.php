<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Candidate
 * @package App\Entity
 * @ORM\Entity()
 */
class Candidate extends Person
{
    /**
     * @var string $registrationNumber
     * @ORM\Column(type="string")
     */
    protected $registrationNumber;

    /**
     * @return string
     */
    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    /**
     * @param string $registrationNumber
     * @return Candidate
     */
    public function setRegistrationNumber(string $registrationNumber): Candidate
    {
        $this->registrationNumber = $registrationNumber;
        return $this;
    }

}
