<?php
require('dbconnect.php');
session_start();

$articleId = $_GET['article'];

$article = read($conn, 'article', "id='$articleId'");
$article = mysqli_fetch_assoc($article);
$name = explode(" - ", $article['name'])[0];


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
</head>

<body>
    <?php require('partials/nav.php') ?>

    <div class="container">

        <div class="left">
            <img src="uploads/<?php echo $article['image']; ?>" alt="">
            <div class="main-head"><?php echo $article['name']; ?></div>
            <div class="detailes">
                <div>
                    <h1>ما هو <?php echo $name ?></h1>
                    <p><?php echo $article['description']; ?></p>
                </div>
                <div>
                    <h1>أعراض <?php echo $name ?></h1>
                    <p><?php echo $article['symptoms']; ?></p>
                </div>
                <div>
                    <h1>أسباب وعوامل خطر <?php echo $name ?></h1>
                    <p><?php echo $article['reasons']; ?></p>
                </div>
                <div>
                    <h1>تشخيص <?php echo $name ?></h1>
                    <p><?php echo $article['diagnosis']; ?></p>
                </div>
                <div>
                    <h1>علاج <?php echo $name ?></h1>
                    <p><?php echo $article['medicine']; ?></p>
                </div>
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