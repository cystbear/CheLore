<?php

namespace Che\CheLoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @MongoDB\MappedSuperclass
 */
abstract class BaseDocument
{
    /**
     * @MongoDB\Id
     */
    private $id;

    /**
     * @MongoDB\String
     * @Assert\Length(min=3, max=100)
     */
    private $title;

    /**
     * @MongoDB\String
     * @Gedmo\Slug(fields={"title"}, updatable=true)
     */
    private $slug;

    /**
     * @MongoDB\Date
     * @Gedmo\Timestampable(on="create")
     */
    private $created;

    /**
     * @MongoDB\Date
     * @Gedmo\Timestampable(on="update")
     */
    private $updated;


    public function __toString()
    {
        return $this->getTitle();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    public function getUpdated()
    {
        return $this->updated;
    }
}
