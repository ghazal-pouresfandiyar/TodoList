<?php
    include('navbar.php');
    session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'todo_db');

    $id = 0;
    $username= $_GET['user'];
	$task_name = "";
    $subject = "";
    $deadline = "";
    $reminder = "";
	$priority = "";
	$task_status = "";
	$info = "";
	$update = false;
?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Create Task</title>
</head>

<body>
    <h2 style="text-align: center; margin-top: 100px;">Create Task</h2>

    <form method="post" action="handle_tasks.php?user=<?php echo $username ?>" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label style="margin-right: 50px;">Task name</label>
            <br/>
			<input type="text" name="task_name" value="<?php echo $task_name; ?>" required>
		</div>
        <div class="input-group">
			<label>Deadline</label>
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
            <option value="Done">Done</option>
            </select>
		</div>
        <div class="input-group">
			<label style="margin-right: 50px;">Subject</label>
			<select name="task_subject" id="task_subject" style="border-radius: 5px;">
            <option value="" selected disabled>
            <?php
            $results = mysqli_query($conn, "SELECT * FROM subjects");
            if(!$results){
                die(mysqli_error($con));
            }
            if(mysqli_num_rows($results)){
                while ($row = mysqli_fetch_array($results)) { ?>
                    <option><?php echo $row['name'] ?></option>
                    <?php
                }
            }
                ?>
            </select>
		</div>
        <div class="input-group">
			<label>More information about task</label>
            <br>
			<textarea type="text" style="width:93%; height: 150px; border-radius: 5px;" name="info" ><?php echo $info; ?></textarea>
		</div>
		<div class="input-group">
	        <input class="btn" type="submit" name="save" value="Create"></button>	
        </div>
	</form>
</body>

</html>