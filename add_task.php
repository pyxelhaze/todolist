<?php
include 'db.php';

if (isset($_POST['task']) && $_POST['task'] != '') {
    $task = $_POST['task'];
    $addtask = $conn->prepare("INSERT INTO `task` (`task`, `status`) VALUES (?, 'Pending')");
    if (!$addtask) {
        die('failed to prepare statement: ' . $conn->error);
    }
    // bind parameter to protect from sql injections
    $addtask->bind_param('s', $task);
    // execute statement
    if (!$addtask->execute()) {
        die('failed to add task: ' . $addtask->error);
    }
    $addtask->close();
    header('Location: index.php');
    exit();
}
