<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Click Counter</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
                body {
                        background-image: url('img.jpg');
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: cover;
                }
                h1 { color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 50px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center; }
                
        </style>
</head>
        <div class="bg">
                <center>
                        <h1>Click Counter</h1>
                </center>
                <font size=5>
                        <ul>
                        <li><a href="goto.php?redirect=https://google.com" target="_blank">Google Link</a><br></li>
                        <li><a href="goto.php?redirect=https://www.wikipedia.org/" target="_blank">Wikipedia Link</a></li>
                        <li><a href="goto.php?redirect=https://drive.google.com/" target="_blank">Drive Link</a></li>
                        <li><a href="goto.php?redirect=https://www.facebook.com/" target="_blank">Facebook Link</a></li>
                        <li><a href="goto.php?redirect=https://twitter.com/" target="_blank">Twitter Link</a></li>
                        </ul>
                        <br><br><br><br>
                        <div class="container" style="background-color: darkgray">
                                <table class="table">
                                        <tr>
                                                <th>Person ID</th>
                                                <th>Views</th>
                                                <th>Website</th>
                                                <th>Date(of first click)</th>
                                        </tr>
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
                                        mysqli_select_db($conn, 'myDB');

                                        $sql = "SELECT * FROM PERSONS";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                        echo ("<tr class='success'><td>" . $row['Pid'] . "</td><td>" . $row['Views'] . "</td><td>" . $row['Website'] . "</td><td>" . $row['reg_date'] . "</td></tr>");
                                                }
                                        } else {
                                                echo ("No records availaible");
                                        }

                                        ?>
                                </table>
                        </div>
                </font>
</body>

</html>