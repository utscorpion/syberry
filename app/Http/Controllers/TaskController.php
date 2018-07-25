<?php

namespace App\Http\Controllers;

use Doctrine\ORM\EntityNotFoundException;
use Illuminate\Http\Request;
use App\Entities\Task;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Illuminate\View\View;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    const TASK_STATUS_OPENED = 'opened';

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var Request
     */
    private $request;

    /**
     * TaskController constructor.
     * @param EntityManager $entityManager
     * @param Request $request
     */
    public function __construct(EntityManager $entityManager, Request $request)
    {
        $this->entityManager = $entityManager;
        $this->request = $request;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index()
    {
        $tasks = $this->entityManager->getRepository(Task::class)->findAll();

        return view('tasks', ['tasks' => $tasks]);
    }

    /**
     * @param int $id
     * @throws EntityNotFoundException
     * @throws ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function update(int $id)
    {
        $task = $this->entityManager->find(Task::class, $id);

        if(!isset($task)) {
            throw new EntityNotFoundException('Task with such id was not found');
        }
    }

    /**
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function store(Task $task)
    {
        $this->validate($this->request, [
            'title' => 'required|between:5,45',
            'description' => 'required|string',
            'status' => 'required|in:opened,closed',
        ]);

        $data = $this->request->all();

        $task->setTitle($data['title']);
        $task->setDescription($data['description']);
        $task->setStatus(self::TASK_STATUS_OPENED);

        $this->entityManager->persist($task);
        $this->entityManager->flush();

        return redirect(route('index'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function destroy(int $id)
    {
        $task = $this->entityManager->find(Task::class, $id);

        if(!isset($task)) {
            throw new EntityNotFoundException('Task with such id was not found');
        }
        
        $this->entityManager->remove($task);
        $this->entityManager->flush();

        return redirect(route('index'));
    }
}
