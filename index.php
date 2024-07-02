<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>ToDoList</title>
</head>

<body>
    <div class="container">
        <nav class="heading">ToDoList</nav>
        <main>
            <div class="input-area">
                <form action="add_task.php" method="post">
                    <input class="task" type="text" name="task" placeholder="put your tasks here" required />
                    <button class="btn" name="add">Add</button>

                </form>
            </div>
        </main>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tasks</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $stmt = $conn->prepare("SELECT * FROM `task` ORDER BY `task_id` ASC");
                    if (!$stmt) {
                        die('failed to prepare ' . $conn->connect_error);
                    }
                    $stmt->execute();
                    $result = $stmt->get_result();

                    $count = 1;
                    while ($fetch = $result->fetch_assoc()) {
                    ?>
                        <tr class="border-bottom">
                            <td>
                                <?= htmlspecialchars($count++) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($fetch['task']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($fetch['status']) ?>
                            </td>
                            <td colspan="2" class="action">
                                <?php if ($fetch['status'] != "Done") : ?>
                                    <a href="update_task.php?task_id=<?= htmlspecialchars($fetch['task_id']) ?>" class="btn-completed">✅</a>
                                <?php endif; ?>
                                <a href="delete_task.php?task_id=<?= htmlspecialchars($fetch['task_id']) ?>" class="btn-remove">❌</a>
                            </td>

                        </tr>
                    <?php
                    }
                    $stmt->close();
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>


</html>