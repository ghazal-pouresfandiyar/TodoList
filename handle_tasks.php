<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'todo_db');

    $id = 0;
    $username = $_GET['user'];
	$task_name = "";
    $deadline = "";
    $reminder = "";
	$priority = "";
	$task_status = "";
	$info = "";
	$update = false;

    // delete task
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
        header('location: list.php?user='.$username);
    }
    
    // add task
	if (isset($_POST['save'])) {
		$task_name = $_POST['task_name'];
        $task_subject = $_POST['task_subject'];
		$deadline = $_POST['deadline'];
        $reminder = $_POST['reminder'];
        $priority = $_POST['priority'];
        $task_status = $_POST['task_status'];
		$info = $_POST['info'];

		mysqli_query($db, "INSERT INTO tasks (username, task_name, task_subject, deadline,reminder, priority, task_status, info) 
                            VALUES ('$username', '$task_name', '$task_subject', '$deadline', '$reminder', '$priority', '$task_status', '$info')"); 
		header('location: list.php?user='.$username);
	}

    // edit task
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
		$task_name = $_POST['task_name'];
        $task_subject = $_POST['task_subject'];
		$deadline = $_POST['deadline'];
        $reminder = $_POST['reminder'];
        $priority = $_POST['priority'];
		$info = $_POST['info'];
        $result = mysqli_query($db, "SELECT * FROM tasks WHERE id=$id AND reminder=$reminder");
        if($result){ //it means that the reminder of task hasn't been updated
            $alert = "Deactive";
        }else{
            $alert = "";
        }

        mysqli_query($db, "UPDATE tasks SET task_name='$task_name',
                                            task_subject = '$task_subject',
                                            deadline='$deadline',
                                            reminder='$reminder',
                                            alert = '$alert',
                                            priority='$priority',
                                            info='$info'      
                                            WHERE id=$id");  
        header('location: list.php?user='.$username); 
    }

    // undone task
    if(isset($_GET['undone'])){
	    $id = $_GET['undone'];
        mysqli_query($db, "UPDATE tasks SET task_status = 'Undone' WHERE id=$id");  
        header('location: list.php?user='.$username); 
    }

    // done task
    if(isset($_GET['done'])){
	    $id = $_GET['done'];
        mysqli_query($db, "UPDATE tasks SET task_status = 'Done', alert = 'Deactive' WHERE id=$id");  
        header('location: list.php?user='.$username);
    }

    // deactive alert
    if(isset($_GET['del_note'])){
        $id = $_GET['del_note'];
        mysqli_query($db, "UPDATE tasks SET alert = 'Deactive' WHERE id=$id");
        header('location: list.php?user='.$username);
    }

?>