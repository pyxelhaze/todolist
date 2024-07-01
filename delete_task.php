<?php
include 'db.php';

if ($_GET['task_id'] != '') {
    $task_id = $_GET['task_id'];
    $delete = $conn->prepare("DELETE FROM `task` WHERE `task_id` = ?");
    if (!$delete) {
        die('failed to prepare statement: ' . $conn->error);
    }
    $delete->bind_param('i', $task_id);
    if (!$delete->execute()) {
        die('failed to delete task: ' . $delete->error);
    }
    $delete->close();
    header('Location: index.php');
    exit();
}
