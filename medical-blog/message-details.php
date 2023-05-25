<?php
require('dbconnect.php');
session_start();

$messageId = $_GET['message'];

$message = read($conn, 'message', "id='$messageId'");
$message = mysqli_fetch_assoc($message);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = $_POST['comment'];
    $from = $_SESSION['user']['id'];

    $data = array(
        'comment' => $comment,
        'fromId' => $from,
        'toId' => $message['patientId'],
        'date' => date("Y-m-d H:i:s"),
        'messageId' => $messageId
    );
    create($conn, 'comment', $data);
}

$comments = read($conn, 'comment', "messageId='$messageId' AND toId='$message[patientId]' ORDER BY date DESC");

$articles = read($conn, 'article');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفاصيل المرض</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/post.css">
    <link rel="stylesheet" href="css/comments.css">
</head>

<body>
    <?php require('partials/nav.php') ?>

    <div class="container">

        <div class="left">
            <img src="uploads/<?php echo $message['image']; ?>" alt="">
            <div class="main-head"><?php echo $message['header']; ?></div>
            <div class="detailes">
                <div>
                    <h1><?php echo $message['description']; ?></h1>
                </div>
            </div>
            <!--  -->
            <hr></br>
            <div class="comments-section">
                <h2>التعليقات</h2>
                <?php
                if (mysqli_num_rows($comments) > 0) {
                    while ($comment = mysqli_fetch_assoc($comments)) { ?>
                        <div class="comment">
                            <div class="comment-header">
                                <span class="comment-author"><?php echo getDoctorName($conn, $comment['fromId']) ?></span>
                                <span class="comment-date"><?php echo date("F d, Y", strtotime($comment['date'])) ?></span>
                            </div>
                            <p class="comment-text"><?php echo $comment['comment'] ?></p>
                        </div>
                    <?php
                    }
                } else { ?>
                    <h1 style="color: red;">لا يوجد تعليقات</h1>
                <?php } ?>

                <?php if ($_SESSION['user']['role'] == 'doctor') { ?>
                    <!-- New comment form -->
                    <form id="new-comment-form" action="" method="post">
                        <h3>اضف تعليقاً</h3>
                        <div class="form-group">
                            <label for="comment-text">التعليق:</label>
                            <textarea id="comment-text" name="comment" required></textarea>
                        </div>
                        <button type="submit">ارسال</button>
                    </form>
                    <!--  -->
                <?php } ?>
            </div>

        </div>

        <div class="side">
            <div class="list">
                <?php
                while ($article = mysqli_fetch_assoc($articles)) { ?>
                    <div class="card">
                        <img src="uploads/<?php echo $article['image'] ?>" alt="">
                        <div class="content">
                            <h3><?php echo $article['name'] ?></h3>
                            <p><?php echo $article['description'] ?></p>
                            <button class="card-btn" onclick="window.location.href = 'disease-post.php?article=<?php echo $article['id']; ?>'">متابعة القرآءة</button>
                        </div>
                    </div>
                <?php }  ?>
            </div>
        </div>

    </div>

    <script>
        const maxLength = 200; // maximum length of truncated text
        const paragraphs = document.querySelectorAll(".content p"); // get the text content of the paragraph element
        for (let i = 0; i < paragraphs.length; i++) {
            const text = paragraphs[i].textContent;
            if (text.length > maxLength) { // check if the text needs to be truncated
                const truncatedText = text.slice(0, maxLength) + "..."; // truncate the text and add ellipsis
                const readMoreLink = `<a style="color: #163563; font-weight: bold;" href='disease-post.php'>...متابعة القرآءة</a>`; // create the "Read more" link
                paragraphs[i].innerHTML = truncatedText + readMoreLink; // replace the original text with the truncated text and the "Read more" link
            }
        }
    </script>

</body>

</html>