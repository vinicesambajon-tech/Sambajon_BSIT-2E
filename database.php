<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sambajon_db";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}


$sql = "SELECT id, name, email, password, contact FROM usertbl";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Users Table</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Contact</th>
    </tr>

    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['password']}</td>
                    <td>{$row['contact']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No records found</td></tr>";
    }
    ?>

</table>

</body>
</html>

<?php
mysqli_close($conn);
?>
