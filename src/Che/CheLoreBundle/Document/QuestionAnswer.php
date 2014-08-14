<?php

namespace Che\CheLoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

use Che\CheLoreBundle\Document\Question;

/**
 * @MongoDB\EmbeddedDocument
 */
class QuestionAnswer
{
    /**
     * @var \Che\CheLoreBundle\Document\Question
     * @MongoDB\EmbedOne(targetDocument="Che\CheLoreBundle\Document\Question")
     */
    private $question;

    /**
     * @var array
     *
     * @MongoDB\Hash
     */
    private $answer;

    /**
     * @var bool
     *
     * @MongoDB\Boolean
     */
    private $isCorrect;

    /**
     * @param \Che\CheLoreBundle\Document\Question $question
     */
    public function setQuestion(Question $question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * @return \Che\CheLoreBundle\Document\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param array $answer
     */
    public function setAnswer(array $answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * @return array
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param bool $isCorrect
     */
    public function setIsCorrect($isCorrect)
    {
        $this->isCorrect = $isCorrect;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsCorrect()
    {
        return $this->isCorrect;
    }
}
