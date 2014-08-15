<?php

namespace Che\CheLoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="question")
 */
class Question
{
    /**
     * @var \MongoId
     *
     * @MongoDB\Id
     */
    private $id;

    /**
     * @MongoDB\String
     */
    protected $subject;

    /**
     * @MongoDB\Hash
     */
    protected $answers;

    /**
     * @MongoDB\Boolean
     */
    protected $isMultiAnswers;

    /**
     * @MongoDB\Hash
     */
    protected $solution;

    /**
     * @return \MongoId
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $answers
     */
    public function setAnswers($answers)
    {
        $this->answers = $answers;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * @param mixed $isMultiAnswers
     */
    public function setIsMultiAnswers($isMultiAnswers)
    {
        $this->isMultiAnswers = $isMultiAnswers;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsMultiAnswers()
    {
        return $this->isMultiAnswers;
    }

    /**
     * @param mixed $solution
     */
    public function setSolution($solution)
    {
        $this->solution = $solution;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSolution()
    {
        return $this->solution;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }
}
