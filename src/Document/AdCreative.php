<?php
declare(strict_types=1);

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
#[MongoDB\InheritanceType('SINGLE_COLLECTION')]
#[MongoDB\DiscriminatorField('type')]
#[MongoDB\DiscriminatorMap([
    'facebook_feed' => FacebookFeedAd::class,
    'google_responsive_search' => GoogleResponsiveSearchAd::class,
])]
abstract class AdCreative
{
    #[MongoDB\Id(strategy: "AUTO")]
    private ?string $id = null;

    #[MongoDB\Field(type: 'date_immutable')]
    private ?\DateTimeImmutable $registeredAt;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getRegisteredAt(): ?\DateTimeImmutable
    {
        return $this->registeredAt;
    }

    /**
     * @param \DateTimeImmutable|null $registeredAt
     * @return AdCreative
     */
    public function setRegisteredAt(?\DateTimeImmutable $registeredAt): self
    {
        $this->registeredAt = $registeredAt;
        return $this;
    }

    abstract public function getType(): string;
}
