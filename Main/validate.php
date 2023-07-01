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
        $sql = "select *from users where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            header("location: list.php?user=".$username); 
        }  
        else{  
            echo "<SCRIPT>
                    alert('Wrong information!')
                    window.location.replace('http://localhost/Todolist/Main/login.php');
                    </SCRIPT>";
                    die();
        }     
    }
}
 
?>