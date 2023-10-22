<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <h2>Registration Page</h2>
    <form action="registration.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="submit" value="Register">
    </form>
</body>

</html>

<?php
require_once('db_connection.php');
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username,  password)
                VALUES ('$username',  '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<br>" . "You are registered!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn_error;
    }

    $conn->close();
}
