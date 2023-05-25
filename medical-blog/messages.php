<?php
require('dbconnect.php');
session_start();

$error = '';
// check if user is logged in
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_SESSION['loggedIn'])) {
        header("Location: auth.php");
    }
    if ($_SESSION['user']['role'] == 'user') {
        $id = $_SESSION['user']['id'];
        $messages = read($conn, 'message', "patientId=$id ORDER BY id DESC");
    }
    if ($_SESSION['user']['role'] == 'doctor') {
        $id = $_SESSION['user']['id'];
        $messages = read($conn, 'message', "doctorId=$id ORDER BY id DESC");
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صندوق الرسائل</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/add.css">
    <link rel="stylesheet" href="css/inbox.css">

</head>

<body>
    <?php require('partials/nav.php') ?>

    <div class="container" dir="rtl">
        <div class="inbox">
            <h3 style="text-align: center; margin-bottom: 30px;">صندوق الرسائل</h3>
            <?php
            if (mysqli_num_rows($messages) > 0) {
                while ($message = mysqli_fetch_assoc($messages)) {
            ?>
                    <div class="card">
                        <div class="content">
                            <h3><?php echo $message['header'] ?></h3>
                            <p class="from"><?php if ($_SESSION['user']['role'] == 'doctor') : echo 'من: ' . getPatientName($conn, $message['patientId']);
                                            endif; ?></p>
                        </div>

                        <button class="card-btn" onclick="window.location.href = 'message-details.php?message=<?php echo $message['id']; ?>'">الانتقال الى الرسالة</button>
                    </div>
                <?php
                }
            } else { ?>
                <h1 style="color: red;">لا يوجد رسائل</h1>
            <?php } ?>

        </div>
    </div>
</body>

</html>