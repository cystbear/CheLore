<?php

namespace Che\CheLoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Common\Collections\ArrayCollection;

use Che\CheLoreBundle\Document\BaseDocument as Base;
use Che\CheLoreBundle\Document\Question;

/**
 * @MongoDB\Document
 */
class Test extends Base
{
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @MongoDB\EmbedMany(targetDocument="Che\CheLoreBundle\Document\Question")
     */
    private $questions;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $questions
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * @return \Che\CheLoreBundle\Document\Question
     */
    public function addQuestion(Question $question)
    {
        $this->getQuestions()->add($question);

        return $this;
    }
}
