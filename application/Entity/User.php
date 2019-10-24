<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Personne
 * @package App\Entity
 * @ORM\MappedSuperclass()
 */
abstract class User extends AbstractEntity
{
    /**
     * @var string $username
     * @ORM\Column(type="string")
     */
    protected $username;
    /**
     * @var string $email
     * @ORM\Column(type="string")
     */
    protected $email;
    protected $plainPassword;

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return $this
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param mixed $plainPassword
     * @return User
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }



}
