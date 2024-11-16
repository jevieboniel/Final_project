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
</head>
<body>
    <h1>TODO LIST </h1>
    

<form method="post">
        <input type="text" name="task" placeholder="" value="<?php echo htmlspecialchars($updates['task']?? ''); ?>"><br><br>

        <button type="submit" class="btn-submit">Update Task</button>
    </form>
        
</body>
</html>