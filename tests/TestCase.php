<?php

namespace Tests;

use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManager;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase
 * Base class for integration testing
 *
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 * @package Tests
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /** @var FixtureInterface[] $fixtures */
    protected $fixtures = [];

    /**
     * Add a single fixture to data set
     *
     * @param FixtureInterface $fixture Fixture instance
     *
     * @return void
     */
    protected function addFixture(FixtureInterface $fixture)
    {
        $this->fixtures[] = $fixture;
    }

    /**
     * Execute fixtures
     *
     * @return void
     */
    protected function executeFixtures()
    {
        $entityManager = $this->app->get(EntityManager::class);

        $loader = new Loader();

        if (count($this->fixtures) === 0) {
            return;
        }

        foreach ($this->fixtures as $fixture) {
            $loader->addFixture($fixture);
        }

        $purger = new ORMPurger();

        $executor = new ORMExecutor($entityManager, $purger);
        $executor->execute($loader->getFixtures());
    }
}
