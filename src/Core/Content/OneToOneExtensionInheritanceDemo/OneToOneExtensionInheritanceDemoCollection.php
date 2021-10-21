<?php declare(strict_types=1);

namespace OneToOneExtensionInheritanceDemo\Core\Content\OneToOneExtensionInheritanceDemo;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void               add(OneToOneExtensionInheritanceDemoEntity $entity)
 * @method void               set(string $key, OneToOneExtensionInheritanceDemoEntity $entity)
 * @method OneToOneExtensionInheritanceDemoEntity[]    getIterator()
 * @method OneToOneExtensionInheritanceDemoEntity[]    getElements()
 * @method OneToOneExtensionInheritanceDemoEntity|null get(string $key)
 * @method OneToOneExtensionInheritanceDemoEntity|null first()
 * @method OneToOneExtensionInheritanceDemoEntity|null last()
 */
class OneToOneExtensionInheritanceDemoCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return OneToOneExtensionInheritanceDemoEntity::class;
    }
}