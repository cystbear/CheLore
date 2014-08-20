<?php

namespace Che\CheLoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Common\Collections\ArrayCollection;

use Che\CheLoreBundle\Document\BaseDocument as Base;
use Che\CheLoreBundle\Document\Question;

/**
 * @MongoDB\Document(collection="test")
 */
class Test extends Base
{
    /**
     * @MongoDB\ReferenceMany(targetDocument="Che\CheLoreBundle\Document\Question", cascade="all")
     */
    private $questions;

    /**
     * @MongoDB\Boolean
     */
    private $isActive;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
        $this->isActive = true;
    }

    public function setQuestions($questions)
    {
        $this->questions = $questions;

        return $this;
    }

    public function getQuestions()
    {
        return $this->questions;
    }

    public function addQuestion(Question $question)
    {
        $this->getQuestions()->add($question);

        return $this;
    }

    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getIsActive()
    {
        return $this->isActive;
    }
}
