<?php
include 'db.php';
$id = $_GET['id'];

$sqlupdate = "SELECT * FROM tasks WHERE id = :id";
$stmtupdate = $pdo->prepare($sqlupdate);
$stmtupdate->execute(['id'=>$id]);
$updates = $stmtupdate->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST['task'];
    

    // Update the task in the database
    $stmt = $pdo->prepare("UPDATE tasks SET task = ? WHERE id = ?");
    $stmt->execute([$task,$id]);

    // Redirect back to index.php after update
    header("Location: index.php");
    exit;
}
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
    <h1 style="font-size:70px;margin-left:50px">TODO LIST </h1style>
    

<form method="post">
        <input type="text" name="task" placeholder="" value="<?php echo htmlspecialchars($updates['task']?? ''); ?>"><br><br>

        <button type="submit" class="btn-submit">Update Task</button>
    </form>
        
</body>
</html>