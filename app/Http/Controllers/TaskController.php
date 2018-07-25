<?php
namespace App\Http\Controllers;

use Doctrine\ORM\EntityNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
     * @return View
     */
    public function index() : View
    {



        $entities = $this->entityManager->getRepository(Task::class)->findAll();


        return view('boot');
    }

    /**
     * @param int $id
     * @return View
     * @throws ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function show(int $id) : View
    {
        $entity = $this->entityManager->find(Task::class, $id);
        dd($entity);
    }

    /**
     * @param Request $request
     * @param int $id
     * @throws ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function update(Request $request, int $id)
    {
        $task = $this->entityManager->find(Task::class, $id);

        if(!isset($task)) {
            throw new EntityNotFoundException('Task with such id was not found');
        }

    }

    /**
     * @param Task $task
     * @throws ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function store(Task $task)
    {

        $data = $this->request->all();

        $task->setTitle('111');
        $task->setDescription('111');
        $task->setStatus(self::TASK_STATUS_OPENED);

        $this->entityManager->persist($task);
        $this->entityManager->flush();
    }

    /**
     * @param $id
     * @throws ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function destroy($id)
    {
        $task = $this->entityManager->find(Task::class, $id);
    }


}
