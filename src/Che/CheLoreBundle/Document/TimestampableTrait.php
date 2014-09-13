<?php

namespace Che\CheLoreBundle\Document;

use Gedmo\Mapping\Annotation as Gedmo;

trait TimestampableTrait
{
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
