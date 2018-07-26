<?php

namespace Tests\Unit;
use App\Entities\Task;
use PHPUnit\Framework\TestCase;

/**
 * Class Task
 * @package Tests\Unit
 */
class TaskTest extends TestCase
{
    const ID = 1;
    const TITLE = 'read';
    const DESCRIPTION = 'read book';
    const STATUS = 'open';

    /**
     * This method tests get and set id in entity Task.
     *
     * @return void
     */
    public function testGetSetId()
    {
        $task = new Task();

        $testTask = $task->setId(self::ID);
        $this->assertAttributeEquals(self::ID, 'id', $task);
        $this->assertInstanceOf(Task::class, $testTask);
        $taskId = $task->getId();
        $this->assertEquals(self::ID, $taskId);
    }

    /**
     * This method tests get and set title in entity Task.
     *
     * @return void
     */
    public function testGetSetTitle()
    {
        $task = new Task();

        $testTask = $task->setTitle(self::TITLE);
        $this->assertAttributeEquals(self::TITLE, 'title', $task);
        $this->assertInstanceOf(Task::class, $testTask);
        $taskTitle = $task->getTitle();
        $this->assertEquals(self::TITLE, $taskTitle);
    }

    /**
     * This method tests get and set description in entity Task.
     *
     * @return void
     */
    public function testGetSetDescription()
    {
        $task = new Task();

        $testTask = $task->setDescription(self::DESCRIPTION);
        $this->assertAttributeEquals(self::DESCRIPTION, 'description', $task);
        $this->assertInstanceOf(Task::class, $testTask);
        $taskDescription = $task->getDescription();
        $this->assertEquals(self::DESCRIPTION, $taskDescription);
    }

    /**
     * This method tests get and set status in entity Task.
     *
     * @return void
     */
    public function testGetSetStatus()
    {
        $task = new Task();

        $testTask = $task->setStatus(self::STATUS);
        $this->assertAttributeEquals(self::STATUS, 'status', $task);
        $this->assertInstanceOf(Task::class, $testTask);
        $taskStatus = $task->getStatus();
        $this->assertEquals(self::STATUS, $taskStatus);
    }

    /**
     * This method tests collect to array all data in entity Task.
     *
     * @dataProvider toArrayProvider
     * @param object $task.
     * @param array $expectedTaskArray.
     *
     * @return void
     */
    public function testToArray($task, array $expectedTaskArray)
    {
        $actualTaskArray = $task->toArray();

        $this->assertEquals($expectedTaskArray, $actualTaskArray);
    }

    /**
     * Data provider for testToArray.
     *
     * @return array
     */
    public static function toArrayProvider()
    {
        $task = new Task();
        $task->setId(1);
        $task->setTitle('testTitle');
        $task->setDescription('testDescription');
        $task->setStatus('testStatus');

        $taskArray = [];

        $taskArray['id'] = $task->getId();
        $taskArray['title'] = $task->getTitle();
        $taskArray['description'] = $task->getDescription();
        $taskArray['status'] = $task->getStatus();

        return [
            [$task, $taskArray]
        ];
    }
}
