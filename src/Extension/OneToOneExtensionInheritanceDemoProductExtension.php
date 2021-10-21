<?php declare(strict_types=1);

namespace OneToOneExtensionInheritanceDemo\Extension;

use OneToOneExtensionInheritanceDemo\Core\Content\OneToOneExtensionInheritanceDemo\OneToOneExtensionInheritanceDemoDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\CascadeDelete;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Inherited;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class OneToOneExtensionInheritanceDemoProductExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        // 'id' as second parameter results in product.extesions.oneToOneExtensionInheritanceDemo => null
        $collection->add(
            (new OneToOneAssociationField(
                'oneToOneExtensionInheritanceDemo', 
                'id',
                'product_id',
                OneToOneExtensionInheritanceDemoDefinition::class,
                true
            ))->addFlags(new CascadeDelete(), new Inherited())
        );

        // changing second parameter to 'parent_id' gives proper parent values but can no longer be saved.
        // $collection->add(
        //     (new OneToOneAssociationField(
        //         'oneToOneExtensionInheritanceDemo', 
        //         'parent_id',
        //         'product_id',
        //         OneToOneExtensionInheritanceDemoDefinition::class,
        //         true
        //     ))->addFlags(new CascadeDelete(), new Inherited())
        // );

        // changing second parameter to 'oneToOneExtensionInheritanceDemo' gives proper parent values but can no longer be saved.
        // $collection->add(
        //     (new OneToOneAssociationField(
        //         'oneToOneExtensionInheritanceDemo', 
        //         'oneToOneExtensionInheritanceDemo',
        //         'product_id',
        //         OneToOneExtensionInheritanceDemoDefinition::class,
        //         true
        //     ))->addFlags(new CascadeDelete(), new Inherited())
        // );
    }

    public function getDefinitionClass(): string
    {
        return ProductDefinition::class;
    }
}