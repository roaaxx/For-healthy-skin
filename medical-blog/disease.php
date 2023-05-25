<?php
require('dbconnect.php');
session_start();

$articles = read($conn, 'article');

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search']; // Replace with the word or sentence you want to search for

    // Escape the search term to prevent SQL injection
    $searchTerm = '%' . mysqli_real_escape_string($conn, $searchTerm) . '%';

    $sql = "SELECT * FROM article
        WHERE name LIKE '$searchTerm'
           OR description LIKE '$searchTerm'
           OR symptoms LIKE '$searchTerm'
           OR reasons LIKE '$searchTerm'
           OR diagnosis LIKE '$searchTerm'
           OR medicine LIKE '$searchTerm'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Fetch and process the search results
        $articles = $result;
    } else {
        // Handle the error case
        echo "Error: " . mysqli_error($conn);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الأمراض</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/blog.css">
</head>

<body>
    <?php require('partials/nav.php') ?>

    <div class="container">

        <div class="search">
            <h1>اكتب الأعراض وابحث عن المرض</h1>
            <form action="" method="get">
                <div class="search-input">
                    <button style="border: none;" type="submit"><img class="search-icon" src="img/search.png" alt=""></button>
                    <input name="search" type="text" placeholder="ادخل الأعراض التي تعاني منها">
                </div>
            </form>
        </div>

        <div class="main-head">الأمراض</div>
        <div class="list">
            <?php
            if (mysqli_num_rows($articles) > 0) {
                while ($article = mysqli_fetch_assoc($articles)) { ?>
                    <div class="card">
                        <img src="uploads/<?php echo $article['image'] ?>" alt="">
                        <div class="content">
                            <h3><?php echo $article['name'] ?></h3>
                            <button class="card-btn" onclick="window.location.href = 'disease-post.php?article=<?php echo $article['id']; ?>'">متابعة القرآءة</button>
                        </div>
                    </div>
                <?php
                }
            } else { ?>
                <h1 style="color: red;">لا يوجد أمراض</h1>
            <?php } ?>

        </div>
    </div>
    <script>
        const maxLength = 300; // maximum length of truncated text
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