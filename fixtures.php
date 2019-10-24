<?php
use App\Entity\Document;
use App\Manager\ReferenceManager;
use App\Entity\Candidate;
require_once 'bootstrap.php';
$refManager = new ReferenceManager($entityManager);
$candidate = new Candidate();
$candidate
    ->setEmail('momo@gmail.com')
    ->setusername('momo')
    ->setFirstname('momo')
    ->setLastname('mimi')
    ->setRegistrationNumber('198312345001001')
    ;
$entityManager->persist($candidate);
$entityManager->flush();
$doc = new Document();
$doc
    ->setType(1)
    ->setFilename('cv.txt')
    ->setVersion('1.0')
    ->setPublic(false)
    ->set_Owner($candidate);
$entityManager->persist($doc);
$entityManager->flush();
$entityManager->refresh($doc);


