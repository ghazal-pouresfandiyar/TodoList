<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>To-do</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./bootstrap-5.1.3-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="list.css" />


    
    <?php
      include('navbar.php');
      header("refresh: 1;");
    ?>
  </head>
  <body>
  <?php 
      include_once('connection.php');
      $con = mysqli_connect('localhost', 'root', '', 'todo_db');
      $results = mysqli_query($conn, "SELECT * FROM tasks");
      date_default_timezone_set("Asia/Tehran");
    ?>
    <div style="margin-top: 80px;">
      <p><?php echo date('Y-m-d H:i:s') ?></p>
    </div>
    <div class="flex-container">
      <!-- table -->
      <div style="width: 70%; padding:0; margin:0;">
        <table>
          <thead>
            <tr>
              <th style="font-size: 25px; text-align: left;" colspan="5">My tasks</th>
              <th><a href="create_task.php" class="add_btn">+Add new task</a></th>
            </tr>
          </thead>

          <tr>
            <th>#</th>
            <th>Task name</th>
            <th>Deadline</th>
            <th>Reminder</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Info</th>
            <th colspan="2">Options</th>
          </tr>
          
          <?php 
            $i = 1;
            if(!$results){
              die(mysqli_error($con));
            }
            if(mysqli_num_rows($results)){
              while ($row = mysqli_fetch_array($results)) {
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['task_name']; ?></td>
                  <td><?php echo $row['deadline']; ?></td>
                  <td><?php echo $row['reminder']; ?></td>
                  <td><?php echo $row['priority']; ?></td>
                  <td>
                    <?php
                      if ($row['task_status'] == "Done"){ ?>
                        <a href="handle_tasks.php?undone=<?php echo $row['id']; ?>" class="edit_btn fa fa-check"></a>
                      <?php }
                      else{ ?>
                        <a href="handle_tasks.php?done=<?php echo $row['id']; ?>" class="del_btn fa fa-times"></a>
                      <?php }
                    ?>
                  </td>
                  <td><?php echo $row['info']; ?></td>
                  <td>
                    <a href="edit_task.php?edit=<?php echo $row['id']; ?>" class="edit_btn fa fa-pencil"></a>
                    <a href="handle_tasks.php?del=<?php echo $row['id']; ?>" class="del_btn fa fa-trash" ></a>
                  </td>
                </tr>
                <?php $i++;}
            }
          ?>
        </table>
      </div>
      <!-- notif box -->
      <div style="width: 20%">
        <h2>Alert Messages</h2>
        <p>Click on the "x" symbol to close the alert message.</p>
        <?php
          $results = mysqli_query($con, "SELECT * FROM tasks");
          if(!$results){
            die(mysqli_error($con));
          }
          if(mysqli_num_rows($results)){
            while ($row = mysqli_fetch_array($results)) {
              $date = date("Y-m-d H:i:s");
              if($row['reminder'] <= $date and $row['task_status'] == "Undone"){
                $name = $row['task_name'];
                $task_deadline = $row['deadline'];
                mysqli_query($con, "INSERT INTO alerts (task_name, task_deadline) VALUES ('$name', '$task_deadline')");
              }
            }
          }

          $alerts = mysqli_query($con, "SELECT * FROM alerts");
          if(!$alerts){
            die(mysqli_error($con));
          }
          if(mysqli_num_rows($alerts)){
            while ($row = mysqli_fetch_array($alerts)) {
              $message = "<div class=\"alert\">"
                                  ."<span class=\"closebtn\">&times;</span>"
                                  ."Don't forget to do ".$row['task_name']."!<br> The deadline is ".$row['task_deadline']."</div>";
              echo $message;
            }
          }
          
        ?>

        <script>
          var close = document.getElementsByClassName("closebtn");
          var i;

          for (i = 0; i < close.length; i++) {
            close[i].onclick = function(){
              var div = this.parentElement;
              div.style.opacity = "0";
              setTimeout(function(){ div.style.display = "none"; }, 600);
            }
          }
        </script>
      </div>
    </div>	
  </body>
</html>
