<?php

namespace Che\CheLoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\EmbeddedDocument
 */
class Answer
{
    /**
     * @MongoDB\String
     */
    protected $answer;

    /**
     * @MongoDB\Boolean
     */
    protected $isCorrect;

    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    public function getAnswer()
    {
        return $this->answer;
    }

    public function setIsCorrect($isCorrect)
    {
        $this->isCorrect = $isCorrect;

        return $this;
    }

    public function getIsCorrect()
    {
        return $this->isCorrect;
    }
}
