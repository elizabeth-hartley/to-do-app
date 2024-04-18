<?php

namespace App\Controllers;

use App\Models\TasksModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class ShowAllCompletedTasksController
{
private TasksModel $model;
private PhpRenderer $renderer;

public function __construct(TasksModel $model, PhpRenderer $renderer)
{
    $this->model = $model;
    $this->renderer =$renderer;
}
public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
{
    $allCompletedTasks =$this->model->showCompletedTasks();
    return $this->renderer->render($response, 'completedTasks.phtml', ['allCompletedTasks' => $allCompletedTasks]);
}
}