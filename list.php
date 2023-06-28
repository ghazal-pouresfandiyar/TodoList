<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>To-do</title>

    <link rel="stylesheet" href="./bootstrap-5.1.3-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="style.css" />


    <style>
      body {
        background-color: wheat;
      }

      .task-container {
        margin-top: 2.5em;
        margin-left: 25%;
      }

      #inputTask {
        margin-top: 0.1em;
        border: black dashed 0.1em;
      }

      .add-btn {
        margin-top: 0.1em;
      }

      table {
        width: 50% !important;
        margin-top: 2em;
        margin-left: 25%;
      }
    </style>
    <?php
      include('navbar.php');
    ?>
  </head>
  <body>

  <?php 
      include_once('connection.php');
      $con = mysqli_connect('localhost', 'root', '', 'todo_db');
      $results = mysqli_query($conn, "SELECT * FROM tasks");
    ?>

    <table style="margin-top: 100px;">
      <thead>
        <tr>
          <th style="font-size: 25px; text-align: left;" colspan="3">My tasks</th>
        </tr>
        <tr>
          <th><a href="create_task.php" class="edit_btn">Add</a></th>
        </tr>
      </thead>

      <tr>
        <th>#</th>
        <th>Task name</th>
        <th>Deadline</th>
        <th>Priority</th>
        <th>Status</th>
        <th>Info</th>
        <th colspan="2">Options</th>
      </tr>
      
      <?php 
        print_r($results);
        $i = 1;
        if(!$results){
          die(mysqli_error($con));
        }
        if(mysqli_num_rows($results)){
          while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row['task_name']; ?></td>
              <td><?php echo $row['deadline']; ?></td>
              <td><?php echo $row['priority']; ?></td>
              <td><?php echo $row['task_status']; ?></td>
              <td><?php echo $row['info']; ?></td>
              <td>
                <a href="edit_task.php?edit=<?php echo $row['id']; ?>" class="edit_btn">Edit</a>
                <a href="handle_tasks.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
              </td>
            </tr>
            <?php $i++;}
        }
      ?>
    </table>		

    <script>
      var my_table = document.getElementById("my_table");
      var my_list = document.getElementsByTagName("TR");

      function add_task() {
        let new_index = my_list.length;
        const input_task = document.getElementById("inputTask").value;
        var body = document.getElementById("table_body");
        var new_tr =
          '<tr><td scope="col">' +
          new_index +
          '</td><td scope="col">' +
          input_task +
          '</td><td scope="col"><button id="' +
          new_index +
          '" class="btn btn-outline-primary" onclick="remove_task(this.id)">Done</button></td>';
        body.innerHTML += new_tr;
        document.getElementById("inputCol").innerHTML =
          '<input id="inputTask" class="form-control" placeholder="New task" />';
      }

      function remove_task(index) {
        my_table.deleteRow(index);
        for (let i = 1; i < my_list.length; i++) {
          my_table.rows[i].cells[0].innerHTML = i;
        }
      }
    </script>
  </body>
</html>
