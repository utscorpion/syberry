<?php

namespace App\Http\Controllers;

use Doctrine\ORM\EntityNotFoundException;
use Illuminate\Http\Request;
use App\Entities\Task;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

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
     * @throws EntityNotFoundException
     */
    public function index()
    {
        $arrTasks = [];

        $tasks = $this->entityManager->getRepository(Task::class)->findAll();

        if(!isset($tasks)) {
            throw new EntityNotFoundException('Tasks with such id was not found, DB is empty');
        }

        foreach ($tasks as $task){
            $arrTasks[] = $task->toArray();
        }

        return view('tasks', ['tasks' => $arrTasks]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|View
     * @throws ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function show($id)
    {
        $taskUpdate = $this->entityManager->find(Task::class, $id);
        $taskUpdate = $taskUpdate->toArray();

        return view('tasks', ['taskUpdate' => $taskUpdate]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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

        $this->validate($this->request, [
            'title' => 'required|between:5,45',
            'description' => 'required|string',
            'status' => 'required|in:opened,closed',
        ]);

        $task->setTitle($this->request->input('title'));
        $task->setDescription($this->request->input('description'));
        $task->setStatus($this->request->input('status'));

        $this->entityManager->persist($task);
        $this->entityManager->flush();

        return redirect(route('index'));
    }

    /**
     * @param Task $task
     * @return \Illuminate\Http\Response
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
        $task->setStatus($data['status']);

        $this->entityManager->persist($task);
        $this->entityManager->flush();

        return redirect(route('index'), Response::HTTP_CREATED);
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
