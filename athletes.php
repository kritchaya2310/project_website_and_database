<?php include('connect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายชื่อ</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body style="margin: 50px;">
    <div class="tablebody">
        <h1>นักกีฬา ตรวจสอบตารางการแข่งขันของตนเอง</h1>
        <br>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Name</th>
                    <th>LastName</th>
                    <th>Department</th>
                    <th>ColorGroup</th>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Place</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbName = "final_project_v2";

                //create connection
                $conn = new mysqli($servername, $username, $password, $dbName);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                //read information all row in mydatabase
                $sql = "SELECT * FROM `athlete`;";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid query; " . $conn->connect_error);
                }

                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["Time"], " AM" . "</td>
                        <td>" . $row["ID"] . "</td>
                        <td>" . $row["Title"] . "</td>
                        <td>" . $row["Name"] . "</td>
                        <td>" . $row["LastName"] . "</td>
                        <td>" . $row["Department"] . "</td>
                        <td>" . $row["ColorGroup"] . "</td>
                        <td>" . $row["Event"] . "</td>
                        <td>" . $row["Date"] . "</td>
                        <td>" . $row["Place"] . "</td>
                    </tr>";
                }

                $conn->close();

                ?>
            </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
            let table = new DataTable('#myTable');
        </script>
    </div>

</body>

</html>