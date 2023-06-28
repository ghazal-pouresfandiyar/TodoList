<?php
if (isset($_POST['login'])) {
    include_once('connection.php');
    $con = mysqli_connect($servername, $username, $password, $dbname);

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = validate($_POST["email"]);
        $password = validate($_POST["password"]);
        $sql = "SELECT * FROM users";
        $results = mysqli_query($conn, $sql);
        if(!$results){
            die(mysqli_error($con));
        }
        if (mysqli_num_rows($results)) {
            while ($row = mysqli_fetch_assoc($results)) {
                if (($row['email'] == $email) && ($row['password'] == $password)) {
                    header("location: books.php");
                } else {
                    echo "<SCRIPT>
                    alert('Wrong information!')
                    window.location.replace('http://localhost/my-php-hw/index.php');
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
 
?><?php
if (isset($_POST['login'])) {
    include_once('connection.php');
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = validate($_POST["email"]);
        $password = validate($_POST["password"]);
        $sql = "SELECT * FROM users";
        $results = mysqli_query($conn, $sql);
        if(!$results){
            die(mysqli_error($con));
        }
        if (mysqli_num_rows($results)) {
            while ($row = mysqli_fetch_assoc($results)) {
                if (($row['email'] == $email) && ($row['password'] == $password)) {
                    header("location: books.php");
                } else {
                    echo "<SCRIPT>
                    alert('Wrong information!')
                    window.location.replace('http://localhost/my-php-hw/index.php');
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