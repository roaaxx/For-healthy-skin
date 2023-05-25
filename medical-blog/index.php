<?php
require('dbconnect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحة الرئيسية</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">

</head>

<body>
    <?php require('partials/nav.php') ?>

    <section>
        <div class="main-section">
            <div class="main-text">
                <h1>For Healthy Skin</h1>
                <p>
                    هو موقع متخصص في الرعاية الصحية للجلد ويوفر مقالات مفيدة ومتنوعة حول الأمراض الجلدية وطرق الوقاية
                    والعلاج. يتم تحديث المحتوى بشكل منتظم ليتناسب مع أحدث التطورات في مجال الطب الجلدي.
                    يعمل الموقع كذلك على توفير خدمة استشارات طبية عبر الإنترنت، حيث يتمكن المستخدمين من إرسال صور
                    للحالات الجلدية التي يعانون منها، والتحدث مع طبيب متخصص في الأمراض الجلدية للحصول على التشخيص
                    والعلاج اللازم.
                </p>
                <input type="submit" onclick="window.location.href = 'disease.php'" value="انتقل الى صفحة الأمراض" />
            </div>
            <img src="img/image-index.png" alt="" />
        </div>
    </section>
    <!-- Site footer -->
</body>

</html>