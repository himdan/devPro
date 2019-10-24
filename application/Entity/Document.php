<?php


namespace App\Entity;

use App\ValueObject\Reference;
use Doctrine\ORM\Mapping as ORM;
use App\Annotations as CustomAnnotation;

/**
 * Class Document
 * @package App\Entity
 * @ORM\Entity()
 */
class Document extends AbstractEntity
{
    /**
     * @var string $filename
     * @ORM\Column(type="string")
     */
    protected $filename;
    /**
     * @var int $type
     * @ORM\Column(type="integer")
     */
    protected $type;
    /**
     * @var bool $public
     * @ORM\Column(type="boolean")
     */
    protected $public=false;
    /**
     * @var string $version
     * @ORM\Column(type="string",length=5)
     */
    protected $version;
    /**
     * @var Reference $reference
     * @ORM\Column(type="reference")
     * @CustomAnnotation\HasReferenceCycle()
     */
    protected $owner;

    /**
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param mixed $filename
     * @return Document
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return Document
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function isPublic()
    {
        return $this->public;
    }

    /**
     * @param mixed $public
     * @return Document
     */
    public function setPublic($public)
    {
        $this->public = $public;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param mixed $version
     * @return Document
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param $owner
     * @return $this
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
        return $this;
    }





}
