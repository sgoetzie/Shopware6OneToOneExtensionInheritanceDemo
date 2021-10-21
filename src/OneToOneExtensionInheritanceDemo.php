<?php declare(strict_types=1);

namespace OneToOneExtensionInheritanceDemo;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\ActivateContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;

class OneToOneExtensionInheritanceDemo extends Plugin
{
    public function activate(ActivateContext $activateContext): void
    {
    }

    public function uninstall(UninstallContext $context): void
    {
        parent::uninstall($context);

        if ($context->keepUserData()) {
            return;
        }

        $connection = $this->container->get(Connection::class);

        $connection->executeUpdate('DROP TABLE IF EXISTS `one_to_one_extension_inheritance_demo`');
        $connection->executeUpdate('ALTER TABLE `product` DROP COLUMN `oneToOneExtensionInheritanceDemo`');
    }
}