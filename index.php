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
    
        <style>
      body {
        background-image: linear-gradient(blue,skyblue);
        background-repeat: no-repeat;
      }
      .form {
        margin: 0 auto;
        padding: 0;
        width: 400px;
        height: auto;
      }
      
      label {
        margin-left:160px;
        font-size: 50px;
      }
      
      legend {
        text-align: center;
        font-size: 50px;
        font-family: Times New Roman;
        display: block;
        margin-bottom: 90px;
        margin-top: 50px;
      }
      input[type='text'],
      input[type='date'] {
        display: flex;
        margin: auto;
        align-items: center;
        width: 600px;
        padding: 35px;
        border-radius: 10px;
      }
       .btn-submit {
         background-color: blue;
         color: white;
         border-radius: 10px;
         display: flex;
         margin: auto;
         justify-content: center;
         margin-bottom: 150px;
         padding: 25px;
         width:200px;
         font-size: 30px;
         font-weight: Bold;
       }
      
       ul li {
        font-size: 30px;
        margin-left: 150px;
        margin-block: 20px;
        margin-top: 20px;
       
       }
    </style>
</head>
<body>
    <h1 style="font-size:70px;margin-left:50px">TODO LIST APPLICATION</h1>
    
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
            
             <a href="edit_task.php?id=<?php echo $task['id']; ?>">Edit</a>
             <a href="delete_task.php?id=<?php echo $task['id']; ?>" onclick="return confirm('Are you sure you want to delete this task?');" style="background-color:red;color:white">Delete</a><br><br><br><br>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
