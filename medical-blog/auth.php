<?php
require('dbconnect.php');
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] === TRUE) {
        header("Location: index.php");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['signup'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        if ($name === '' or $email === '' or $password === '' or $role === '') {
            $error = "يرجى ملئ جميء الحقول";
        } else {
            $data = array(
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'role' => $role
            );
            // Insert user data with the location ID
            if (create($conn, 'user', $data) === TRUE) {
                $sql = "SELECT * FROM user WHERE email='$email'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $_SESSION['loggedIn'] = true;
                        $_SESSION['user'] = $row;
                    }
                }
                header("Location: index.php");
                exit;
            } else {
                $error = 'المستخدم موجود مسبقاً';
            }
        }
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($email === '' or $password === '') {
            $error = "يرجى ملئ جميع العناصر";
        } else {
            $sql = "SELECT * FROM user WHERE email='$email' and password='$password'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['user'] = $row;
                    header("Location: index.php");
                }
            } else {
                $error = 'يرجى التأكد من صحة المعلومات';
            }
        }
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>انشاء حساب</title>
    <link rel="stylesheet" href="css/auth.css">

</head>

<html>

<body>
    <?php if ($error) { ?>
        <div class="error">
            <?php echo '<h4 style="color: red;">' . $error . '</h4>';  ?>
        </div>
    <?php } ?>
    <div class="container" id="container">

        <div class="form-container sign-up-container">
            <form action="" method="post">
                <h1>انشاء حساب</h1>
                <input name="name" type="text" placeholder="الاسم" required />
                <input name="email" type="email" placeholder="البريد الالكتروني" required />
                <input name="password" type="password" placeholder="كلمة السر" required />
                <h3>اختر دورك</h3>
                <div style="display: flex; justify-content: space-between; gap: 20px; margin-bottom: 20px;">
                    <div class="radio-input">
                        <label for="role">طبيب</label>
                        <input type="radio" name="role" value="doctor" id="role" />
                    </div>

                    <div class="radio-input">
                        <label for="role">زائر</label>
                        <input checked type="radio" name="role" value="user" id="role" />
                    </div>
                </div>
                <button name="signup" type="submit">انشاء حساب</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="" method="post">
                <h1>تسجيل دخول</h1></br>
                <input name="email" type="email" placeholder="الايميل" required />
                <input name="password" type="password" placeholder="كلمة السر" required />
                <button name="login" type="submit">تسجيل دخول</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>مرحباً بعودتك</h1>
                    <p>لتبقى متصلاً بنا الرجاء تسجيل الدخول!</p>
                    <button class="ghost" id="signIn">تسجيل الدخول</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>مرحباً، صديقي</h1>
                    <p>ادخل معلوماتك الشخصية وابدأ الرحلة معنا</p>
                    <button class="ghost" id="signUp">انشاء حساب</button>
                </div>
            </div>
        </div>
    </div>


</body>
<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
</script>

</html>