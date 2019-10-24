<?php


namespace App\Entity;

use App\ValueObject\Reference;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractEntity
 * @package App\Entity
 * @ORM\MappedSuperclass(repositoryClass="App\Repository\AbstractEntityRepository")
 * @ORM\HasLifecycleCallbacks
 */
abstract class AbstractEntity implements IReference
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var integer $id
     */
    protected $id;
    /**
     * @var \DateTime $createdAt
     * @ORM\Column(type="datetime",nullable=true)
     */
    protected $createdAt;
    /**
     * @var \DateTime $updatedAt
     * @ORM\Column(type="datetime",nullable=true)
     */
    protected $updatedAt;
    protected $registry = [];

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return $this
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return $this
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @throws \Exception
     * @ORM\PrePersist()
     */
    public function prePersist()
    {
        if (!$this->getCreatedAt()) {
            $this->createdAt = new \DateTime();
        }
    }

    /**
     * @throws \Exception
     * @ORM\PreUpdate()
     */
    public function preUpdate()
    {
        if (!$this->getUpdatedAt()) {
            $this->updatedAt = new \DateTime();
        }
    }


    public function __call($name, $arguments)
    {

        list($op, $key) = explode("_", $name);
        switch ($op) {
            case 'get':
                return $this->applyGetter($key);
            case 'set':
                return $this->applySetter($key, $arguments);

        }
    }

    /**
     * @param $key
     * @return mixed
     */
    protected function applyGetter($key)
    {
        return $this->registry[$key];
    }

    /**
     * @param $key
     * @param $argument
     * @return $this
     * @internal
     */
    protected function applySetter($key, $arguments)
    {
        $this->registry[$key] = $arguments[0];
        return $this;
    }

}
