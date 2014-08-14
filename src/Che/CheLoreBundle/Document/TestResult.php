<?php

namespace Che\CheLoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Common\Collections\ArrayCollection;

use Che\CheLoreBundle\Document\Test;
use Che\CheLoreBundle\Document\User;
use Che\CheLoreBundle\Document\QuestionAnswer;

/**
 * @MongoDB\Document
 */
class TestResult
{
    /**
     * @var \MongoId
     *
     * @MongoDB\Id
     */
    private $id;

    /**
     * @var \Che\CheLoreBundle\Document\Test
     * @MongoDB\ReferenceOne(targetDocument="Che\CheLoreBundle\Document\Test")
     */
    private $test;

    /**
     * @var \Che\CheLoreBundle\Document\User
     * @MongoDB\ReferenceOne(targetDocument="Che\CheLoreBundle\Document\User")
     */
    private $owner;

    /**
     * @var float
     * @MongoDB\Float
     */
    private $grade;

    /**
     * @var bool
     * @MongoDB\Boolean
     */
    private $isPassed;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @MongoDB\EmbedMany(targetDocument="Che\CheLoreBundle\Document\QuestionAnswer")
     */
    private $answers;

    public function __construct()
    {
        $this->grade = 0;
        $this->isPassed = false;
        $this->answers = new ArrayCollection();

    }

    /**
     * @return \MongoId
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \Che\CheLoreBundle\Document\Test $test
     */
    public function setTest(Test $test)
    {
        $this->test = $test;

        return $this;
    }

    /**
     * @return \Che\CheLoreBundle\Document\Test
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * @param \Che\CheLoreBundle\Document\User $owner
     */
    public function setOwner(User $owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return \Che\CheLoreBundle\Document\User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param float $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * @return float
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param bool $isPassed
     */
    public function setIsPassed($isPassed)
    {
        $this->isPassed = $isPassed;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsPassed()
    {
        return $this->isPassed;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $answers
     */
    public function setAnswers(ArrayCollection $answers)
    {
        $this->answers = $answers;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * @param \Che\CheLoreBundle\Document\QuestionAnswer $answers
     */
    public function addAnswer(QuestionAnswer $answer)
    {
        $this->getAnswers()->add($answer);

        return $this;
    }
}
