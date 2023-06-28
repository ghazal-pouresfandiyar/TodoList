<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>To-do</title>

    <link rel="stylesheet" href="./bootstrap-5.1.3-dist/css/bootstrap.css" />

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
  </head>
  <body>
    <div class="row task-container">
      <label for="inputTask">Add a new task</label>
      <div id="inputCol" class="col-6">
        <input id="inputTask" class="form-control" placeholder="New task" />
      </div>
      <div class="col-2">
        <button class="btn btn-info add-btn" onclick="add_task()">
          Add Task
        </button>
      </div>
    </div>

    <table id="my_table" class="table table-light border border-primary">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Task</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody id="table_body">
        <tr>
          <td scope="col">1</td>
          <td scope="col">حل تمرین مهندسی اینترنت</td>
          <td scope="col">
            <button
              id="1"
              class="btn btn-outline-primary"
              onclick="remove_task(this.id)"
            >
              Done
            </button>
          </td>
        </tr>
      </tbody>
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
