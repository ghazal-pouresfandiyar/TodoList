<?php
if (isset($_POST['login'])) {
    include_once('connection.php');
    $con = mysqli_connect('localhost', 'root', '', 'todo_db');

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = validate($_POST["username"]);
        $password = validate($_POST["password"]);
        $sql = "SELECT * FROM users";
        $results = mysqli_query($conn, $sql);
        if(!$results){
            die(mysqli_error($con));
        }
        if (mysqli_num_rows($results)) {
            while ($row = mysqli_fetch_assoc($results)) {
                if (($row['username'] == $username) && ($row['password'] == $password)) {
                    header("location: home.php");
                } else {
                    echo "<SCRIPT>
                    alert('Wrong information!')
                    window.location.replace('http://localhost/Todolist/login.php');
                    </SCRIPT>";
                    die();
                }
            }
        }
    }
}

else
{
    header("location: home.php");
}
 
?>