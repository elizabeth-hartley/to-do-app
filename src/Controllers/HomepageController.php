<?php

namespace App\Controllers;

use App\Models\TasksModel;
use PHPUnit\TextUI\Configuration\Php;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class HomepageController
{
    private TasksModel $model;
    private PhpRenderer $renderer;

    public function __construct(TasksModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $tasks = $this->model->getTasksFromDb();
        return $this->renderer->render($response, 'homepage.phtml', ['tasks' => $tasks]);
    }
}

