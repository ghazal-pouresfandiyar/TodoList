<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
    <title>Sign Up</title>
</head>

<?php
    session_start();
    include_once('connection.php');
    $conn = mysqli_connect('localhost', 'root', '', 'my_db');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = validate($_POST['email']);
        $password = validate($_POST['password']);
        if (empty($email)|| empty($password)) {
            echo "Please fill out all required fields.";
        }else {
                $sql = "INSERT INTO `users`(`email`, `password`) VALUES ('$email', '$password')";
                $x = mysqli_query($conn, $sql);
                if($x){
                    echo "<SCRIPT>
                    alert('New user saved!')
                    window.location.replace('http://localhost/my-php-hw/index.php');
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
                <input type="email" placeholder="Email" name="email" value="">
                </div>
    
                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Password"
                            name="password" value="">
                </div>
    
                <input class="button" type="submit" name="signup" value="Sign Up">
                <a>Already have an account?</a>
                <a href="index.php">log in</a>
            </div>
        </div>
    </form>
</body>