<?php

namespace Che\CheLoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Common\Collections\ArrayCollection;

use Che\CheLoreBundle\Document\BaseDocument as Base;
use Che\CheLoreBundle\Document\User;
use Che\CheLoreBundle\Document\Test;

/**
 * @MongoDB\Document
 */
class Course extends Base
{
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @MongoDB\ReferenceMany(targetDocument="Che\CheLoreBundle\Document\User")
     */
    private $teachers;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @MongoDB\ReferenceMany(targetDocument="Che\CheLoreBundle\Document\Test")
     */
    private $tests;

    public function __construct()
    {
        $this->teachers = new ArrayCollection();
        $this->tests    = new ArrayCollection();
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $teachers
     */
    public function setTeachers(ArrayCollection $teachers)
    {
        $this->teachers = $teachers;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getTeachers()
    {
        return $this->teachers;
    }

    /**
     * @param \Che\CheLoreBundle\Document\User $teacher
     */
    public function addTeacher(User $teacher)
    {
        $this->getTeachers()->add($teacher);

        return $this;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $tests
     */
    public function setTests($tests)
    {
        $this->tests = $tests;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getTests()
    {
        return $this->tests;
    }

    /**
     * @param \Che\CheLoreBundle\Document\Test $test
     */
    public function addTest(Test $test)
    {
        $this->getTests()->add($test);

        return $this;
    }
}
