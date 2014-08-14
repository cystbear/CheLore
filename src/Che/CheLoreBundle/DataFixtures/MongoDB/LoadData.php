<?php

namespace Che\CheLoreBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Hautelook\AliceBundle\Alice\DataFixtureLoader as DataFixtureLoaderBase;

class LoadData extends DataFixtureLoaderBase implements OrderedFixtureInterface
{
    public function getOrder()
    {
        return 100;
    }

    protected function getFixtures()
    {
        $path = __DIR__ . '/data';

        return  array(
            $path . '/users.yml',
            $path . '/tests.yml',
            $path . '/courses.yml',
        );
    }
}
