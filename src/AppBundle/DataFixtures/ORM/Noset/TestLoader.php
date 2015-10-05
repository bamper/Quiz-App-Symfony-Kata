<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/2/15
 * Time: 6:48 PM
 */

namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Nelmio\Alice\Fixtures;

class TestLoader extends DataFixtureLoader
{
    /**
     * {@inheritDoc}
     */
    protected function getFixtures()
    {
        return  array(
            __DIR__ . '/no_set.yml'
        );
    }
}