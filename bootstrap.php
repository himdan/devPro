<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\Types\Type;
use App\Types\ReferenceType;
use Doctrine\Common\EventManager;
use App\Subscribers\Doctrine\NormalizeSubscriber;
use Doctrine\Common\Annotations\AnnotationRegistry;
$loader = require  __DIR__ . "/vendor/autoload.php";
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));
// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/application/Entity"), $isDevMode,null, null, false);
// or if you prefer XML
// $config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config"), $isDevMode);
// database configuration parameters
$conn = array(
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/DB/db.sqlite',
);
// creating eventManager
$eventManager = new EventManager();
$referenceManager = new \App\Manager\ReferenceManager();
$eventManager->addEventSubscriber(new NormalizeSubscriber($referenceManager));
// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config, $eventManager);
Type::addType(ReferenceType::REFERENCE, ReferenceType::class);
$entityManager
    ->getConnection()
    ->getDatabasePlatform()
    ->registerDoctrineTypeMapping(ReferenceType::REFERENCE, ReferenceType::REFERENCE);
