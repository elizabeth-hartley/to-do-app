<?php

namespace App\Controllers;

use App\Models\TasksModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class AddNewTaskController
{
    private TasksModel $model;
    public function __construct(TasksModel $model)
    {
        $this->model = $model;
    }
    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $formData = $request->getParsedBody();
        $this->model->addTask($formData);
        return $response->withHeader('Location', '/')->withStatus(301);
    }
}