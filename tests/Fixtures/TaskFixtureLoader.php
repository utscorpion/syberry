<?php

namespace Tests\Fixtures;

use App\Entities\Task;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class TaskFixtureLoader
 * Fixtures for task
 *
 * @package Tests\Fixtures
 */
class TaskFixtureLoader implements FixtureInterface
{
    /**
     * @var array $tasks.
     */
    public $tasks = [];

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $objectManager Object manager
     *
     * @return void
     */
    public function load(ObjectManager $objectManager)
    {
        $this->loadTasks($objectManager);
    }

    /**
     * Persist tasks
     *
     * @param ObjectManager $objectManager Doctrine object manager
     *
     * @return void
     */
    private function loadTasks(ObjectManager $objectManager)
    {

        $this->tasks[0] = new Task();
        $this->tasks[0]->setId(1)
            ->setTitle('title_example')
            ->setDescription('description_example')
            ->setStatus('opened');
        $objectManager->persist($this->tasks[0]);

        $this->tasks[1] = new Task();
        $this->tasks[1]->setId(2)
            ->setTitle('title_example_2')
            ->setDescription('description_example_2')
            ->setStatus('closed');
        $objectManager->persist($this->tasks[1]);

        $objectManager->flush();
    }
}
