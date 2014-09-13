<?php

namespace Che\CheLoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Common\Collections\ArrayCollection;

use Che\CheLoreBundle\Document\BaseDocument as Base;
use Che\CheLoreBundle\Document\User;
use Che\CheLoreBundle\Document\Test;

/**
 * @MongoDB\Document(collection="course")
 */
class Course extends Base
{
    use TimestampableTrait;

    /**
     * @MongoDB\ReferenceMany(targetDocument="Che\CheLoreBundle\Document\User")
     */
    private $teachers;

    /**
     * @MongoDB\ReferenceMany(targetDocument="Che\CheLoreBundle\Document\Test")
     */
    private $tests;

    public function __construct()
    {
        $this->teachers = new ArrayCollection();
        $this->tests    = new ArrayCollection();
    }

    public function setTeachers(ArrayCollection $teachers)
    {
        $this->teachers = $teachers;

        return $this;
    }

    public function getTeachers()
    {
        return $this->teachers;
    }

    public function addTeacher(User $teacher)
    {
        $this->getTeachers()->add($teacher);

        return $this;
    }

    public function setTests($tests)
    {
        $this->tests = $tests;

        return $this;
    }

    public function getTests()
    {
        return $this->tests;
    }

    public function addTest(Test $test)
    {
        $this->getTests()->add($test);

        return $this;
    }
}
