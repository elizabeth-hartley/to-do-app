<?php

namespace App\Models;

use PDO;

class TasksModel
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getTasksFromDb(): array
    {
        $query = $this->db->prepare(
            'SELECT `id`, `task`, `completed` FROM `toDoList` WHERE `completed` = 0'
        );
        $query->execute();
        return $query->fetchAll();
    }

    public function addTask(array $task): void
    {
        $query = $this->db->prepare(
            'INSERT INTO `toDoList` (`task`) VALUES (:task)'
        );
        $query->bindParam(':task', $task['task']);
        $query->execute();
    }

    public function completeATask($idToComplete)
    {
        $query = $this->db->prepare("UPDATE `toDoList` SET `completed` = 1 WHERE `id` = $idToComplete");
        $query->execute();
    }

    public function showCompletedTasks()
    {
        $query = $this->db->prepare('SELECT `task`, `id` FROM `toDoList` WHERE `completed` = 1'
        );
        $query->execute();
        return $query->fetchAll();
    }
    public function deleteTask($deleteTasks)
    {
        $query = $this->db->prepare("DELETE FROM `toDoList` WHERE `id` = $deleteTasks");
        $query->execute();
    }

//public function editTask(array $task): void
//{
//    $query = $this->db->prepare(
//        'UPDATE `toDoList` WHERE '
//    )
//}
}