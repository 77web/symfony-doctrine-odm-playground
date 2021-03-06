<?php
declare(strict_types=1);

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class FacebookFeedAd extends AdCreative
{
    #[MongoDB\Field(type: "string")]
    private ?string $headline = null;

    #[MongoDB\Field(type: "string")]
    private ?string $mainText = null;

    #[MongoDB\Field(type: "string")]
    private ?string $linkUrl = null;

    #[MongoDB\Field(type: "string")]
    private ?string $imageUrl = null;

    /**
     * @return string|null
     */
    public function getHeadline(): ?string
    {
        return $this->headline;
    }

    /**
     * @param string|null $headline
     * @return FacebookFeedAd
     */
    public function setHeadline(?string $headline): self
    {
        $this->headline = $headline;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMainText(): ?string
    {
        return $this->mainText;
    }

    /**
     * @param string|null $mainText
     * @return FacebookFeedAd
     */
    public function setMainText(?string $mainText): self
    {
        $this->mainText = $mainText;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLinkUrl(): ?string
    {
        return $this->linkUrl;
    }

    /**
     * @param string|null $linkUrl
     * @return FacebookFeedAd
     */
    public function setLinkUrl(?string $linkUrl): self
    {
        $this->linkUrl = $linkUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    /**
     * @param string|null $imageUrl
     * @return FacebookFeedAd
     */
    public function setImageUrl(?string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    public function getType(): string
    {
        return 'facebook_feed';
    }
}
