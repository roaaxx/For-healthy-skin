<?php
require('dbconnect.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $articleId = $_POST['article_id'];
    delete($conn, 'article', "id=$articleId");
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
    $articles = read($conn, 'article');

    if (mysqli_num_rows($articles) > 0) {
        echo '<table>';
        echo '<tr><th>Name</th><th>Doctor</th><th>Actions</th></tr>';

        while ($article = mysqli_fetch_assoc($articles)) {
            echo '<tr>';
            echo '<td>' . $article['name'] . '</td>';
            echo '<td>' . getDoctorName($conn, $article['doctorId']) . '</td>';
            echo '<td>';
            echo '<form action="" method="POST">';
            echo '<input type="hidden" name="article_id" value="' . $article['id'] . '">';
            echo '<button type="submit" class="delete-btn">Delete</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>No articles found.</p>';
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