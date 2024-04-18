<?php

namespace App\Controllers;

use App\Models\TasksModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class DeleteTasksController
{
    private TasksModel $model;
    public function __construct(TasksModel $model)
    {
        $this->model = $model;
    }
    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $deleteTasks = $args['id'];
        $this->model->deleteTask($deleteTasks);
        return $response->withHeader('Location', '/completedTasks')->withStatus(301);
    }
}