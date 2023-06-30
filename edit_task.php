<?php
    include('navbar.php');
    session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'todo_db');

    if(isset($_GET['edit'])){
	    $id = $_GET['edit'];
    }

    $username = $_GET['user'];

    $results = mysqli_query($conn, "SELECT * FROM tasks WHERE id=$id");
    if(!$results){
        die(mysqli_error($con));
    }
    if(mysqli_num_rows($results)){
        while ($row = mysqli_fetch_array($results)) {?>
            <?php
            $task_name = $row['task_name'];
            $task_subject = $row['task_subject'];
            $deadline = $row['deadline'];
            $reminder = $row['reminder'];
            $priority = $row['priority'];
            $task_status = $row['task_status'];
            $info = $row['info'];
        }
    }


?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
        <title>Edit Task</title>
</head>

<body>
    <h2 style="text-align: center; margin-top: 100px;">Edit Task</h2>

    <form method="post" action="handle_tasks.php?user=<?php echo $username ?>" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label style="margin-right: 50px;">Task name</label>
            <br/>
			<input type="text" name="task_name" value="<?php echo $task_name; ?>" required>
		</div>
        <div class="input-group">
			<label style="margin-right: 50px;">Subject</label>
			<select name="task_subject" id="task_subject" style="border-radius: 5px;">
            <option><?php echo $task_subject ?></option>
            <?php
            $results = mysqli_query($conn, "SELECT * FROM subjects");
            if(!$results){
                die(mysqli_error($con));
            }
            if(mysqli_num_rows($results)){
                while ($row = mysqli_fetch_array($results)) { 
                    if ($row['name'] != $task_subject){ ?>
                    <option><?php echo $row['name'] ?></option>
                    <?php
                    }
                }
            }
                ?>
            </select>
		</div>
        <div class="input-group">
			<label>Deadline</label>
            <br>
			<input type="datetime-local" id="deadline" name="deadline" value="<?php echo $deadline; ?>">
		</div>
        <div class="input-group">
			<label>Reminder</label>
            <br>
			<input type="datetime-local" id="reminder" name="reminder" value="<?php echo $reminder;?>" max="<?php echo $deadline; ?>">
		</div>
		<div class="input-group">
			<label style="margin-right:50px">Priority</label>
            <select name="priority" id="priority" style="border-radius: 5px;">
                <?php if ($priority == "Low"){?>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                <?php }
                elseif ($priority == "High"){?>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                <?php }
                elseif ($priority == "Medium"){?>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                    <option value="Low">Low</option>
                <?php } ?>

                    
            </select>
		</div>
        <div class="input-group">
			<label>More information about task</label>
            <br>
			<textarea type="text" style="width:93%; height: 150px; border-radius: 5px;" name="info" ><?php echo $info; ?></textarea>
		</div>
		<div class="input-group">
	        <input class="btn" type="submit" name="update" value="Update">
        </div>
	</form>
</body>

</html>