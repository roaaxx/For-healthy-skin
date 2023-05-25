<?php
require('dbconnect.php');
session_start();


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/admin-users.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php require('partials/nav.php') ?>

    <h1>User Dashboard</h1>

    <?php
    $users = read($conn, 'user');

    if (mysqli_num_rows($users) > 0) {
        echo '<table>';
        echo '<tr><th>Name</th><th>Email</th><th>Role</th></tr>';

        while ($user = mysqli_fetch_assoc($users)) {
            echo '<tr>';
            echo '<td>' . $user['name'] . '</td>';
            echo '<td>' . $user['email'] . '</td>';
            echo '<td>' . $user['role'] . '</td>';
            echo '<td>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>No users found.</p>';
    }
    ?>

</body>

</html>