<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>To-do</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/bootstrap-5.1.3-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="../style/style.css" />

    <?php
      include('navbar.php');
    ?>
  </head>
  <body>

  <?php 
      include_once('connection.php');
      $con = mysqli_connect('localhost', 'root', '', 'todo_db');
      $results = mysqli_query($con, "SELECT * FROM tasks");
      $username = $_GET['user'];
    ?>

    <table style="margin-top: 100px;">
      <thead>
        <tr>
          <th style="font-size: 25px; text-align: left;" colspan="5">Filtered tasks</th>
        </tr>
      </thead>

      <tr>
        <th>#</th>
        <th>Task name</th>
        <th>Subject</th>
        <th>Deadline</th>
        <th>Priority</th>
        <th>Status</th>
        <th>Info</th>
      </tr>
      
      <?php
        if(isset($_POST['filter'])){
          $type = $_POST['search'];
          if($type != "All tasks"){
            $subject = $type;
          }
          $i = 1;
          if(!$results){
            die(mysqli_error($con));
          }
          if(mysqli_num_rows($results)){
            while ($row = mysqli_fetch_array($results)) { 
              if ($row['username'] == $username){
                // done tasks
                if (isset($_POST['done']) and $row['task_status']=="Done"){
                  // all done tasks
                  if($type == "All tasks"){ ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row['task_name']; ?></td>
                      <td><?php echo $row['task_subject']; ?></td>
                      <td><?php echo $row['deadline']; ?></td>
                      <td><?php echo $row['priority']; ?></td>
                      <td>
                        <p class="edit_btn fa fa-check"></p>
                      </td>
                      <td><?php echo $row['info']; ?></td>
                    </tr>
                  <?php
                  $i++;
                  }
                  // subjective done tasks
                  else{
                    if($row['task_subject'] == $subject){ ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['task_name']; ?></td>
                        <td><?php echo $row['task_subject']; ?></td>
                        <td><?php echo $row['deadline']; ?></td>
                        <td><?php echo $row['priority']; ?></td>
                        <td>
                        <p class="edit_btn fa fa-check"></p>
                        </td>
                        <td><?php echo $row['info']; ?></td>
                      </tr>
                      <?php
                      $i++;
                    }
                  }
                }
                // done & undone tasks
                elseif(!isset($_POST['done'])){ 
                  // all done & undone tasks
                  if($type == "All tasks"){
                    header('location: list.php?user='.$username); 
                  }
                   // subjective done & undone tasks
                  else{
                    if($row['task_subject'] == $subject){ ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['task_name']; ?></td>
                        <td><?php echo $row['task_subject']; ?></td>
                        <td><?php echo $row['deadline']; ?></td>
                        <td><?php echo $row['priority']; ?></td>
                        <td>
                        <?php
                          if ($row['task_status'] == "Done"){ ?>
                            <a href="handle_tasks.php?user=<?php echo $username; ?>&undone=<?php echo $row['id']; ?>" class="edit_btn fa fa-check"></a>
                          <?php
                          }
                          else{ ?>
                            <a href="handle_tasks.php?user=<?php echo $username; ?>&done=<?php echo $row['id']; ?>" class="del_btn fa fa-times"></a>
                          <?php
                          }
                        ?>
                      </td>
                        <td><?php echo $row['info']; ?></td>
                      </tr>
                      <?php
                      $i++;
                    }
                  }
                }
              }
            }
          }
        }
      ?>

    </table>		
  </body>
</html>
