<?php

namespace Tests\Feature;

use Tests\Fixtures\TaskFixtureLoader;
use Tests\TestCase;

/**
 * Class TaskControllerTest
 * @package Tests\Feature
 */
class TaskControllerTest extends TestCase
{
    /**
     * Test index() method.
     *
     * @return void
     */
    public function testIndexStatus()
    {
        $response = $this->get(route('index'));

        $response->assertStatus(200)->assertOk();
    }

    /**
     * Test index() method that data return from DB.
     *
     * @return void
     */
    public function testIndexOutputFromDB()
    {
        $this->addFixture(new TaskFixtureLoader());
        $this->executeFixtures();

        $response = $this->get(route('index'));
        $response->assertSee('title_example');
        $response->assertSee('title_example_2');
        $response->assertSee('description_example');
        $response->assertSee('description_example_2');
        $response->assertSee('opened');
        $response->assertSee('closed');
    }


    /**
     * Test show($id) method that data return from DB.
     *
     * @return void
     */
    public function testShowOutputFromDB()
    {
        $fixture = new TaskFixtureLoader();
        $this->addFixture($fixture);
        $this->executeFixtures();

        $response = $this->get(route('show', array($fixture->tasks[0]->getId())));
        $response->assertStatus(200)->assertOk();

        $response = $this->get(route('show', $fixture->tasks[0]->getId()));
        $response->assertSee('title_example');
        $response->assertSee('description_example');
        $response->assertSee('opened');
    }
}
