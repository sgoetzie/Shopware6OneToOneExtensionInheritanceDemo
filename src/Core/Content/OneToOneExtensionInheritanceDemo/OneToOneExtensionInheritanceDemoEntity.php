<?php declare(strict_types=1);

namespace OneToOneExtensionInheritanceDemo\Core\Content\OneToOneExtensionInheritanceDemo;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class OneToOneExtensionInheritanceDemoEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var \DateTimeInterface|null
     */
    protected $myDate;

    public function getMyDate(): ?\DateTimeInterface
    {
        return $this->myDate;
    }

    public function setMyDate(?string $myDate): void
    {
        $this->myDate = $myDate;
    }
}