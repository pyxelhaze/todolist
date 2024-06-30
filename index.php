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
    <nav class="heading"></nav>
    <main class="container">
        <div class="input-area">
            <form action="add_task.php" method="post">
                <input type="text" name="task" placeholder="put your tasks here" required />
                <button class="btn" name="add">Add Task</button>

            </form>
        </div>
    </main>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Tasks</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        </aside>
</body>

</html>