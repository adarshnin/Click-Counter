<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "CREATE DATABASE myDB";
if ($conn ->query($sql) == TRUE){
        echo("DataBase created successfully");
}

//Selecting the database
mysqli_select_db($conn, 'myDB');

$query1 = "CREATE TABLE PERSONS(
        Pid int NOT NULL,
        Views int,
        Website VARCHAR(100) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY(Pid, Website)
);";

if ($conn ->query($query1) == TRUE)
        echo("Table created");
else
        echo("Error creating table".$conn->error);

//Getting the redirected link
$link = $_GET['redirect'];
settype($link, "string");

//Insert if not exist else ignore
//Initializing Pid to 1 -- Can be changed later when user logins
$query2 = "INSERT IGNORE INTO PERSONS(Pid, Views, Website)
        VALUES(1, 0, '$link');
";
//Starting viewcount with 1

if ($conn ->query($query2) == TRUE)
        echo("Record created successfully");
else
        echo("Error ".$conn->error);

//Updating the count by 1
$query3 = "UPDATE PERSONS SET Views = Views + 1 WHERE Pid = 1 AND Website = '$link';";

if ($conn ->query($query3) == TRUE)
        echo("View Count updated successfully");
else
        echo("Error ".$conn->error);

//Redirect link
header("Location: ".$_GET['redirect']);
$conn->close()
?>