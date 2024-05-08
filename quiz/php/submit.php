<?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $score = $_COOKIE['result'];
    echo $score;
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password);
    if(!$conn){
        echo "connection not successful";
        $sql = ""; 
        mysqli_query($conn, $sql);
    }
    else{        
        echo "connection successful";
    }
}
?>