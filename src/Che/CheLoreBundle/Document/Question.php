<?php

namespace Che\CheLoreBundle\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Che\CheLoreBundle\Document\Answer;

/**
 * @MongoDB\Document(collection="question")
 * @MongoDB\HasLifecycleCallbacks
 */
class Question
{
    /**
     * @MongoDB\Id
     */
    private $id;

    /**
     * @MongoDB\String
     */
    protected $subject;

    /**
     * @MongoDB\EmbedMany(targetDocument="Che\CheLoreBundle\Document\Answer", )
     */
    protected $answers;

    /**
     * @MongoDB\Boolean
     */
    protected $isMultiAnswers;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getSubject();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setAnswers($answers)
    {
        $this->answers = $answers;

        return $this;
    }

    public function getAnswers()
    {
        return $this->answers;
    }


    public function addAnswer(Answer $answer)
    {
        $this->getAnswers()->add($answer);

        return $this;
    }

    public function setIsMultiAnswers($isMultiAnswers)
    {
        $this->isMultiAnswers = $isMultiAnswers;

        return $this;
    }

    public function getIsMultiAnswers()
    {
        return $this->isMultiAnswers;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @MongoDB\PrePersist
     * @MongoDB\PreUpdate
     */
    public function defineIsMultiAnswers()
    {
        $counter = 0;
        foreach ($this->getAnswers() as $answer) {
            if ($answer->getIsCorrect()) {
                $counter++;
            }
        }

        $this->setIsMultiAnswers($counter > 1);
    }
}
