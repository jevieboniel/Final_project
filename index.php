<?php
include 'db.php';

// Fetch all tasks from the database
$stmt = $pdo->query("SELECT * FROM tasks");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
</head>
<body>
    <h1>TODO LIST APPLICATION</h1>
    
    <form action="add_task.php" method="post">
        <label>Task: </label>
        <input type="text" name="task" placeholder="" required><br><br>
     
        <button type="submit" class="btn-submit">Add Task</button>
    </form>

<legend>Created Tasks</legend>
<ul>
    <?php foreach ($tasks as $task): ?>
        <li>
            <?php echo htmlspecialchars($task['task']?? ''); ?><br><br>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
