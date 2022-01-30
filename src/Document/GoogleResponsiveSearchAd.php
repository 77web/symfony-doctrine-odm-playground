<?php
declare(strict_types=1);

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class GoogleResponsiveSearchAd extends AdCreative
{
    #[MongoDB\Field(type: 'collection')]
    private array $headlines = [];

    #[MongoDB\Field(type: 'collection')]
    private array $descriptions = [];

    #[MongoDB\Field(type: "string")]
    private ?string $finalUrl;

    #[MongoDB\Field(type: "string", nullable: true)]
    private ?string $path1;

    #[MongoDB\Field(type: "string", nullable: true)]
    private ?string $path2;

    /**
     * @return array
     */
    public function getHeadlines(): array
    {
        return $this->headlines;
    }

    /**
     * @param array $headlines
     * @return GoogleResponsiveSearchAd
     */
    public function setHeadlines(array $headlines): self
    {
        $this->headlines = $headlines;
        return $this;
    }

    /**
     * @return array
     */
    public function getDescriptions(): array
    {
        return $this->descriptions;
    }

    /**
     * @param array $descriptions
     * @return GoogleResponsiveSearchAd
     */
    public function setDescriptions(array $descriptions): self
    {
        $this->descriptions = $descriptions;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFinalUrl(): ?string
    {
        return $this->finalUrl;
    }

    /**
     * @param string|null $finalUrl
     * @return GoogleResponsiveSearchAd
     */
    public function setFinalUrl(?string $finalUrl): self
    {
        $this->finalUrl = $finalUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPath1(): ?string
    {
        return $this->path1;
    }

    /**
     * @param string|null $path1
     * @return GoogleResponsiveSearchAd
     */
    public function setPath1(?string $path1): self
    {
        $this->path1 = $path1;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPath2(): ?string
    {
        return $this->path2;
    }

    /**
     * @param string|null $path2
     * @return GoogleResponsiveSearchAd
     */
    public function setPath2(?string $path2): self
    {
        $this->path2 = $path2;
        return $this;
    }

    public function getType(): string
    {
        return 'google_responsive_search';
    }
}
