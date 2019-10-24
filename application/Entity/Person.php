<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Class Person
 * @package App\Entity
 * @ORM\MappedSuperclass()
 */
abstract class Person extends User
{
    /**
     * @var string $firstname
     * @ORM\Column(type="string")
     */
    protected $firstname;
    /**
     * @var string $firstname
     * @ORM\Column(type="string")
     */
    protected $lastname;

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return $this
     */
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return $this
     */
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

}
