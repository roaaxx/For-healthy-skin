<nav>
    <div class="nav-logo">For Healthy Skin
    </div>
    <ul>
        <li class="active"><a href="index.php">الرئيسية</a></li>
        <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) : ?>
            <?php if ($_SESSION['user']['role'] == 'doctor') : ?>
                <li><a href="add-disease.php">اضافة الأمراض</a></li>
                <li><a href="messages.php">صندوق الرسائل</a></li>
                <li><a href="disease.php">الأمراض</a></li>
            <?php endif; ?>

            <?php if ($_SESSION['user']['role'] == 'user') : ?>
                <li><a href="sendToDoctor.php">تواصل مع مُختص</a></li>
                <li><a href="messages.php">صندوق الرسائل</a></li>
                <li><a href="disease.php">الأمراض</a></li>
            <?php endif; ?>

            <?php if ($_SESSION['user']['role'] == 'admin') : ?>
                <li><a href="admin-users.php">المستخدمين</a></li>
                <li><a href="admin-article.php">الأمراض</a></li>
                <li><a href="admin-message.php">الرسائل</a></li>
            <?php endif; ?>
            <li><a href="logout.php">تسجيل خروج</a></li>
        <?php else : ?>
            <li><a href="auth.php">انضم لنا</a></li>
        <?php endif; ?>

    </ul>
</nav>