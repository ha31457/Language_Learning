<?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $accusername = $_POST['username'];
    $accpwd = $_POST['password'];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "hhlearning";

    $conn = mysqli_connect($servername, $username, $password, $db);
    if(!$conn){
        echo "connection not successful";
    }
    else{        
        echo "connection successful";
        echo "<br>";
        echo $accusername;
        echo $accpwd;

        $sql = "SELECT * FROM `user credentials` WHERE `username`='$accusername'"; 
        $success = mysqli_query($conn, $sql);
        
        if($success){
            $num = mysqli_num_rows($success);
            echo $num;

            if($num>0){
                $row = mysqli_fetch_assoc($success);
                if($row['password'] == $accpwd){
                    setcookie("active", $accusername, time() + 86400, "/");
                    header("Location: /language_learning/");
                    exit;
                }
            }
        }
        else{
            echo "hello";
            echo "<br>";
            echo "data counted be entered. error: " . mysqli_error();
        }
    }
}
?>