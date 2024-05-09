<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "hhlearning";

$conn = mysqli_connect($servername, $username, $password, $db);
if($conn){
    $active = $_COOKIE["active"];
    $sql = "SELECT * FROM `user credentials` WHERE `username` = '$active'"; 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num>0){
        $row = mysqli_fetch_assoc($result);
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Page</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #1e1e1e;
                color: #fff;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 800px;
                margin: 50px auto;
                padding: 20px;
                background-color: #333;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            }
            h1 {
                text-align: center;
                margin-bottom: 20px;
            }
            p {
                margin-bottom: 10px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            th, td {
                padding: 10px;
                text-align: left;
                border-bottom: 1px solid #666;
            }
            th {
                background-color: #4CAF50;
                color: white;
            }
            tr:nth-child(even) {
                background-color: #444;
            }
            tr:hover {
                background-color: #555;
            }
            .logout-btn {
                display: block;
                margin: 20px auto;
                padding: 10px 20px;
                background-color: #f44336;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                text-decoration: none;
                text-align: center;
                transition: background-color 0.3s ease;
            }
            .logout-btn:hover {
                background-color: #d32f2f;
            }
        </style>
        </head>
        <body>
        <div class="container">
            <h1>User Profile</h1>
            <p><strong>Username:</strong> '.$row['username'].'</p>
            <p><strong>Gender:</strong> Male</p>
            <table>
                <tr>
                    <th>Quiz</th>
                    <th>Score</th>
                </tr>
                <tr>
                    <td>C++ Input/Output</td>
                    <td>'.$row['cppio'].'</td>
                </tr>

                <tr>
                    <td>C++ Datatypes</td>
                    <td>'.$row['cppdata'].'</td>
                </tr>
                
                <tr>
                    <td>C++ Operators</td>
                    <td>'.$row['cppoper'].'</td>
                </tr>

                <tr>
                    <td>C++ Functions</td>
                    <td>'.$row['cppfun'].'</td>
                </tr>

                <tr>
                    <td>C++ Arrays</td>
                    <td>'.$row['cpparr'].'</td>
                </tr>

                <tr>
                    <td>C++ Strings</td>
                    <td>'.$row['cppstr'].'</td>
                </tr>

                <tr>
                    <td>Java Input/Output</td>
                    <td>'.$row['javaio'].'</td>
                </tr>

                <tr>
                    <td>Java Datatypes</td>
                    <td>'.$row['javadata'].'</td>
                </tr>
                
                <tr>
                    <td>Java Operators</td>
                    <td>'.$row['javaoper'].'</td>
                </tr>

                <tr>
                    <td>Java Functions</td>
                    <td>'.$row['javafun'].'</td>
                </tr>

                <tr>
                    <td>Java Arrays</td>
                    <td>'.$row['javaarr'].'</td>
                </tr>

                <tr>
                    <td>Java Strings</td>
                    <td>'.$row['javastr'].'</td>
                </tr>
                
            </table>
            <button class="logout-btn" onclick="logout()">Logout</button>
        </div>
        <script>
            function logout(){
                console.log("logout called");
                let allcookies = document.cookie;
                let cookielist = allcookies.split(";");
            
                cookielist.forEach(cookie => {
                    let name = cookie.split("=")[0];
                    if(name == "active"){
                        document.cookie = "active=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/"
                        window.location.replace("/language_learning")
                    }
                })
            }
        </script>
        </body>
        </html>
        ';
    }
}
?>



