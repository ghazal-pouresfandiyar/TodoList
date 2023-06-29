<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'todo_db');

    $id = 0;
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
        header('location: list.php');
    }
    
    // add task
	if (isset($_POST['save'])) {
		$task_name = $_POST['task_name'];
		$deadline = $_POST['deadline'];
        $reminder = $_POST['reminder'];
        $priority = $_POST['priority'];
        $task_status = $_POST['task_status'];
		$info = $_POST['info'];

		mysqli_query($db, "INSERT INTO tasks (task_name, deadline,reminder, priority, task_status, info) 
                            VALUES ('$task_name', '$deadline', '$reminder', '$priority', '$task_status', '$info')"); 
		header('location: list.php');
	}

    // edit task
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
		$task_name = $_POST['task_name'];
		$deadline = $_POST['deadline'];
        $reminder = $_POST['reminder'];
        $priority = $_POST['priority'];
		$info = $_POST['info'];

        mysqli_query($db, "UPDATE tasks SET task_name='$task_name',
                                               deadline='$deadline',
                                               reminder='$reminder',
                                               priority='$priority',
                                               info='$info'      
                                               WHERE id=$id");  
        header('location: list.php');  
    }

    // undone task
    if(isset($_GET['undone'])){
	    $id = $_GET['undone'];
        mysqli_query($db, "UPDATE tasks SET task_status = 'Undone' WHERE id=$id");  
        header('location: list.php');  
    }
    // done task
    if(isset($_GET['done'])){
	    $id = $_GET['done'];
        mysqli_query($db, "UPDATE tasks SET task_status = 'Done' WHERE id=$id");  
        header('location: list.php');  
    }

?>