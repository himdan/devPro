<?php


namespace App\Manager;


use App\Entity\IReference;
use App\ValueObject\Reference;
use Doctrine\ORM\EntityManagerInterface;

class ReferenceManager
{
    /**
     * @var EntityManagerInterface
     */
    protected  $em;
    public function __construct(EntityManagerInterface $em=null)
    {
        $this->em = $em;
    }

    /**
     * @param EntityManagerInterface $em
     * @return ReferenceManager
     */
    public function setEm(EntityManagerInterface $em): ReferenceManager
    {
        $this->em = $em;
        return $this;
    }

    /**
     * Trasnform an Entity object to a reference
     * @param IReference $reference
     * @return Reference
     */
    public function transform(IReference $reference)
    {
        return new Reference(get_class($reference), $reference->getId());
    }

    public function reverseTransform(Reference $reference)
    {
        $obj = $this->em->find($reference->getClass(), $reference->getId());
        return $obj;
    }
}
