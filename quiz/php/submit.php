<?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $score = $_COOKIE['result'];
    $quiz = $_COOKIE['quiz'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "hhlearning";

    $conn = mysqli_connect($servername, $username, $password, $db);
    if($conn){
        $active = $_COOKIE["active"];
        $sql = "UPDATE `user credentials` SET `$quiz` = '$score' WHERE `username` = '$active'"; 
        $result = mysqli_query($conn, $sql);
        if($result){
            echo '<!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Score Noted</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #1e1e1e;
                    color: #fff;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
                .container {
                    text-align: center;
                }
                h1 {
                    font-size: 36px;
                    margin-bottom: 20px;
                }
                p {
                    font-size: 18px;
                    margin-bottom: 30px;
                }
                .button {
                    padding: 15px 30px;
                    background-color: #4CAF50;
                    color: white;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    font-size: 16px;
                    text-decoration: none;
                    transition: background-color 0.3s ease;
                }
                .button:hover {
                    background-color: #45a049;
                }
            </style>
            </head>
            <body>
            <div class="container">
                <h1>You scored '.$score.' in '. $quiz.'</h1>
                <p>Thanks your response.</p>
                <a href="/language_learning" class="button">Return to Home Page</a>
            </div>
            </body>
            </html>
            ';
        }
    }
}
?>