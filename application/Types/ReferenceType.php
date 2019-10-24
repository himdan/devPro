<?php


namespace App\Types;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use App\ValueObject\Reference;

class ReferenceType extends Type
{
    const REFERENCE = 'reference';

    private function getCustomSqlDeclaration()
    {
        return strtoupper(self::REFERENCE);
    }
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $this->getCustomSqlDeclaration();
    }

    public function getCustomSqlFormat()
    {
        return $this->getCustomSqlDeclaration().'(%s %s)';
    }

    public function getName()
    {
        return self::REFERENCE;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        list($class, $id) = sscanf($value, $this->getCustomSqlFormat());

        return new Reference($class, $id);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value instanceof Reference) {
            $value = sprintf($this->getCustomSqlFormat(), $value->getClass(), $value->getId());
        }

        return $value;
    }

    public function canRequireSQLConversion()
    {
        return true;
    }

    public function convertToPHPValueSQL($sqlExpr, $platform)
    {
        return sprintf('%s', $sqlExpr);
    }

    public function convertToDatabaseValueSQL($sqlExpr, AbstractPlatform $platform)
    {
        return sprintf('%s', $sqlExpr);
    }


}
