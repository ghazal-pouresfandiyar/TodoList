<?php
    include('navbar.php');
    session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'todo_db');

    $id = 0;
	$task_name = "";
    $deadline = "";
	$priority = "";
	$task_status = "";
	$info = "";
	$update = false;
    $action = 0;

    // if (isset($_GET['action'])) {
	// 	$action = $_GET['action'];
	// }

	// if (isset($_POST['save'])) {
	// 	$task_name = $_POST['task_name'];

	// 	mysqli_query($conn, "INSERT INTO genre (title) VALUES ('$title')"); 
	// 	$_SESSION['message'] = "New Category saved!"; 
	// 	header('location: books.php?action=3');
	// }

    // if (isset($_POST['update'])) {
    //     $id = $_POST['id'];
	// 	$title = $_POST['title'];

    //     mysqli_query($conn, "UPDATE genre SET title='$title' WHERE id=$id");
    //     $_SESSION['message'] =  "Category " . $id . " updated!";; 
    //     header('location: books.php?action='. $action);
    // }

    // if (isset($_GET['del'])) {
    //     $id = $_GET['del'];
    //     mysqli_query($conn, "DELETE FROM genres WHERE id=$id");
    //     $_SESSION['message'] = "Genre " . $id . " deleted!";
    //     header('location: books.php?action='. $action);
    // }
    ?>
?>
<?php
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($conn, "SELECT * FROM tasks WHERE id=$id");

		if (count(array($record)) == 1 ) {
			$n = mysqli_fetch_array($record);
			$task_name = $n['task_name'];
            $deadline = $n['deadline'];
			$priority = $n['priority'];
			$task_status = $n['task_status'];
		}
	}

	if (isset($_GET['action'])) {
		$action = $_GET['action'];
	}
?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <!-- edit book -->
    <?php if ($update == true): ?>
        <title>Edit Book</title>
    <!-- create book -->
    <?php else: ?>
        <title>Create Book</title>
    <?php endif?>
    
    <!-- <script>
         window.onload = function () {
            const $select = document.querySelector('#genre');
            $select.value = "<echo $genre; ?>";
         }
    </script> -->
</head>

<body>
<!-- if (isset($_SESSION['message'])): -->
 <!-- $genres = mysqli_query($conn, "SELECT * FROM genres"); ?> -->
    
    <!-- edit book -->
    <?php if ($update == true): ?>
        <h2 style="text-align: center; margin-top: 100px;">Edit Book</h2>
    <!-- create book -->
    <?php else: ?>
        <h2 style="text-align: center; margin-top: 100px;">Create Book</h2>
    <?php endif?>

    <form method="post" action="handle_tasks.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label style="margin-right: 50px;">Task name</label>
            <br/>
			<input type="text" name="task_name" value="<?php echo $task_name; ?>" required>
		</div>
        <div class="input-group">
			<label>deadline</label>
            <br>
			<input type="datetime-local" id="deadline" name="deadline">
		</div>
		<div class="input-group">
			<label style="margin-right:50px">Priority</label>
            <select name="priority" id="priority" style="border-radius: 5px;">
            <!-- <option value="" selected disabled> -->
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
            </select>
		</div>
        <div class="input-group">
			<label style="margin-right: 50px;">Task Status</label>
			<select name="task_status" id="task_status" style="border-radius: 5px;">
            <!-- <option value="" selected disabled> -->
            <option value="Undone">Undone</option>
            <option value="Doing">Doing</option>
            <option value="Done">Done</option>
            </select>
		</div>
        <div class="input-group">
			<label>More information about task</label>
            <br>
			<textarea type="text" style="width:93%; height: 150px; border-radius: 5px;" name="info" ><?php echo $info; ?></textarea>
		</div>
		<div class="input-group">
            <?php if ($update == true): ?>
	        <button class="btn" type="submit" name="update">update</button>
            <?php else: ?>
	        <button class="btn" type="submit" name="save" >Create</button>
            <?php endif ?>		
        </div>
	</form>
</body>

</html>