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

        $sql = "INSERT INTO `user credentials`(`username`, `password`, `cpparr`, `cppstr`, `cppfun`, `cppio`, `cppdata`, `cppoper`, `javaarr`, `javastr`, `javafun`, `javaio`, `javadata`, `javaoper`) VALUES ('$accusername','$accpwd',0,0,0,0,0,0,0,0,0,0,0,0)"; 
        $success = mysqli_query($conn, $sql);
        
        if($success){
            echo "data entered: " . $accusername . " & " . $accpwd;
        }
        else{
            echo "hello";
            echo "<br>";
            echo "data counted be entered. error: " . mysqli_error();
        }
    }
}
?>