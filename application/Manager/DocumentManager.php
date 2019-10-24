<?php


namespace App\Manager;


use App\Entity\Document;
use Doctrine\ORM\EntityManagerInterface;

class DocumentManager
{

    /**
     * @var IPaginator $paginator
     */
    protected $paginator;
    /**
     * @var ICud $cud
     */
    protected $cud;
    /**
     * @var EntityManagerInterface $em
     */
    protected $em;

    public function __construct(IPaginator $paginator, ICud $cud)
    {
        $this->paginator = $paginator;
        $this->cud = $cud;
    }

    /**
     * @param EntityManagerInterface $em
     * @return DocumentManager
     */
    public function setEm(EntityManagerInterface $em): DocumentManager
    {
        $this->em = $em;
        return $this;
    }



    public function create()
    {

    }

    public function update(Document $document)
    {

    }

    public function delete(Document $document)
    {

    }

    /**
     * @param array $criteria
     * @param int $offset
     */
    public function search($criteria=[], $offset=10)
    {

    }
}
