<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="login.css"> -->
    <title>Sign Up</title>
</head>

<style>
    
body {
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background: url() no-repeat;
  background-size: cover;
}

.login-box {
  width: 280px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #343a40;
}

.login-box h1 {
  float: left;
  font-size: 40px;
  border-bottom: 4px solid #343a40;
  margin-bottom: 50px;
  padding: 13px;
}

.textbox {
  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0;
  border-bottom: 1px solid #343a40;
}

.fa {
  width: px;
  float: left;
  text-align: center;
}

.textbox input {
  border: none;
  outline: none;
  background: none;
  font-size: 18px;
  float: left;
  margin: 0 10px;
}

.button {
  width: 100%;
  padding: 8px;
  color: #ffffff;
  background: none #343a40;
  border: none;
  border-radius: 6px;
  font-size: 18px;
  cursor: pointer;
  margin: 12px 0;
}
</style>

<?php
    session_start();
    include_once('connection.php');
    $conn = mysqli_connect('localhost', 'root', '', 'todo_db');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = validate($_POST['username']);
        $password = validate($_POST['password']);
        if (empty($username) or empty($password)) {
            echo "Please fill out all required fields.";
        }else {
                $sql = "INSERT INTO `users`(`username`, `password`) VALUES ('$username', '$password')";
                $x = mysqli_query($conn, $sql);
                if($x){
                    echo "<SCRIPT>
                    alert('New user saved!')
                    window.location.replace('http://localhost/Todolist/login.php');
                    </SCRIPT>";
                }else{
                    echo "<SCRIPT>
                    alert('This username already exist! Try again with another username.')
                    </SCRIPT>";
                }
        }
    }
    function validate($data) {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
?>
<body>
    <form method="post" action="">
        <div class="login-box">
            <h1>Sign Up</h1>
    
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input placeholder="Username" name="username" value="">
                </div>
    
                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Password"
                            name="password" value="">
                </div>
    
                <input class="button" type="submit" name="signup" value="Sign Up">
                <a>Already have an account?</a>
                <a href="login.php">log in</a>
            </div>
        </div>
    </form>
</body>