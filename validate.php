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
        echo "Error 500";
    }
    else{        
        $sql = "SELECT * FROM `user credentials` WHERE `username`='$accusername'"; 
       
        $success = mysqli_query($conn, $sql);
        if($success){
            $num = mysqli_num_rows($success);
            

            if($num>0){
                $row = mysqli_fetch_assoc($success);
                if($row['password'] == $accpwd){
                    setcookie("active", $accusername, time() + 86400, "/");
                    header("Location: /language_learning/");
                    exit;
                }
                else{
                    echo '<!DOCTYPE html>
                    <html lang="en">
                    <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Acknowledgement</title>
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
                            margin-right: 10px;
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
                        .button-secondary {
                            background-color: #f44336;
                        }
                        .button-secondary:hover {
                            background-color: #d32f2f;
                        }
                    </style>
                    </head>
                    <body>
                    <div class="container">
                        <h1>Wrong Password!!</h1>
                        <p>Enter the correct password.</p>
                        <a href="/language_learning/login.html" class="button">Try Again</a>
                        <a href="/language_learning/" class="button button-secondary">Return to Home Page</a>
                    </div>
                    </body>
                    </html>
                    ';
                }
            }
            
            else{
                echo '<!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Acknowledgement</title>
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
                    margin-right: 10px;
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
                .button-secondary {
                    background-color: #f44336;
                }
                .button-secondary:hover {
                    background-color: #d32f2f;
                }
            </style>
            </head>
            <body>
            <div class="container">
                <h1>No such user exist!</h1>
                <p>Enter a valid username.</p>
                <a href="/language_learning/login.html" class="button">Try Again</a>
                <a href="/language_learning/" class="button button-secondary">Return to Home Page</a>
            </div>
            </body>
            </html>
            ';
        }
    }
}  
}      
?>