<?php


namespace App\Subscribers\Doctrine;

use App\Annotations\HasReferenceCycle;
use App\Manager\ReferenceManager;
use App\ValueObject\Reference;
use Doctrine\ORM\Events;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class NormalizeSubscriber implements EventSubscriber
{

    /**
     * @var ReferenceManager $referenceManager
     */
    protected $referenceManager;
    public function getSubscribedEvents()
    {

        return array(
            Events::postLoad,
            Events::prePersist,
        );
    }
    public function __construct(ReferenceManager $referenceManager)
    {
        $this->referenceManager = $referenceManager;
    }

    public function postLoad(LifecycleEventArgs $arg)
    {
        $entity = $arg->getEntity();
        $classMeta = $arg->getObjectManager()->getClassMetadata(get_class($entity));
        $this->referenceManager->setEm($arg->getObjectManager());
        foreach ($classMeta->fieldMappings as $fieldMapping) {
            /**
             * @unsafe
             */
            extract($fieldMapping);
            if($type === 'reference'){
                $getFn = sprintf('get%s', ucfirst($fieldName));
                $set_Fn = sprintf('set_%s', ucfirst($fieldName));
                $ref = call_user_func([$entity, $getFn]);
                call_user_func([$entity, $set_Fn], $this->referenceManager->reverseTransform($ref));
            }
        }

    }

    public function prePersist(LifecycleEventArgs $arg)
    {
        $entity = $arg->getEntity();
        $classMeta = $arg->getObjectManager()->getClassMetadata(get_class($entity));
        $this->referenceManager->setEm($arg->getObjectManager());
        foreach ($classMeta->fieldMappings as $fieldMapping) {
            /**
             * @unsafe
             */
            extract($fieldMapping);
            if($type === 'reference'){
                $get_Fn = sprintf('get_%s', ucfirst($fieldName));
                $setFn = sprintf('set%s', ucfirst($fieldName));
                $ref = call_user_func([$entity, $get_Fn]);
                call_user_func([$entity, $setFn], $this->referenceManager->transform($ref));
            }
        }

    }

}
