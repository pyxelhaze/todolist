<?php
include 'db.php';

if ($_GET['task_id'] != '') {
    $task_id = $_GET['task_id'];
    $update_task = $conn->prepare("UPDATE `task` SET `status` = 'Done' WHERE `task_id` = ?");
    if (!$update_task) {
        die('failed to prepare statement: ' . $conn->error);
    }
    $update_task->bind_param('i', $task_id);
    if (!$update_task->execute()) {
        die('failed to update task: ' . $update_task->error);
    }
    $update_task->close();
    header('Location: index.php');
    exit();
}
