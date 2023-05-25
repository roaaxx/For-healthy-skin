<?php
require('dbconnect.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message_id = $_POST['message_id'];
    delete($conn, 'comment', "messageId=$message_id");
    delete($conn, 'message', "id=$message_id");
}

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

    <h1>article Dashboard</h1>

    <?php
    $messages = read($conn, 'message');

    if (mysqli_num_rows($messages) > 0) {
        echo '<table>';
        echo '<tr><th>Header</th><th>Description</th><th>Patient ID</th><th>Doctor ID</th><th>Actions</th></tr>';

        while ($message = mysqli_fetch_assoc($messages)) {
            echo '<tr>';
            echo '<td>' . $message['header'] . '</td>';
            echo '<td>' . $message['description'] . '</td>';
            echo '<td>' .  getPatientName($conn, $message['patientId']) . '</td>';
            echo '<td>' . getDoctorName($conn, $message['doctorId']) . '</td>';
            echo '<td>';
            echo '<form action="" method="POST">';
            echo '<input type="hidden" name="message_id" value="' . $message['id'] . '">';
            echo '<button type="submit" class="delete-btn">Delete</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>No messages found.</p>';
    }
    ?>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Delete account button click event
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach((button) => {
                button.addEventListener('click', async () => {
                    const userId = button.dataset.userId;
                    const confirmDelete = confirm("Are you sure you want to delete this account?");

                    if (confirmDelete) {}
                });
            });
        });
    </script>
</body>

</html>