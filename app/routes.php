<?php
declare(strict_types=1);

use App\Controllers\CoursesAPIController;
use Slim\App;
use Slim\Views\PhpRenderer;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use App\Controllers\ShowAllCompletedTasksController;
use App\Controllers\HomepageController;
use App\Controllers\AddNewTaskController;

return function (App $app) {
    $container = $app->getContainer();

    //demo code - two ways of linking urls to functionality, either via anon function or linking to a controller

    $app->get('/courses', CoursesAPIController::class);
    $app->get('/', HomepageController::class);
    $app->get('/completedTasks', ShowAllCompletedTasksController::class);
    $app->post('/homepage/addTask', AddNewTaskController::class);
    $app->get('/editTask/{id}', \App\Controllers\EditTaskController::class);
    $app->get('/completeATask/{id}', \App\Controllers\CompleteATaskController::class);
    $app->get('/deleteTask/{id}', \App\Controllers\DeleteTasksController::class);
};
