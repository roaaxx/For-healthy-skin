<?php
require('dbconnect.php');
session_start();

$error = '';
// check if user is logged in
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_SESSION['loggedIn'])) {
        header("Location: auth.php");
    }
    if ($_SESSION['user']['role'] != 'user') {
        header("Location: index.php");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $description = $_POST['description'];
    $doctorId = $_POST['doctorId'];
    $header = $_POST['header'];

    $file = $_FILES["fileToUpload"]["name"];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $error = "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $error = "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $error =  "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 1000000) {
        $error =  "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        // $error =  "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // $error =  "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            if ($description == '' or $file == '' or $header == '') {
                $error = 'جميع الحقول مطلوبة';
            } else {
                $data = array(
                    'description' => $description,
                    'header' => $header,
                    'image' => $file,
                    'doctorId' => $doctorId,
                    'patientId' => $_SESSION['user']['id'],
                );
                create($conn, 'message', $data);
                header("Location: messages.php");
            }
        } else {
            $error =  "Sorry, there was an error uploading your file.";
        }
    }
}

$doctors = read($conn, 'user', "role='doctor'");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ارسال استشارة</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/add.css">
</head>

<body>
    <?php require('partials/nav.php') ?>

    <div class="container" dir="rtl">
        <?php if ($error) { ?>
            <div class="error">
                <?php echo '<h4 style="color: red;">' . $error . '</h4>';  ?>
            </div>
        <?php } ?>

        <form id="contact" action="" method="post" enctype="multipart/form-data">
            <h3>ادخل أعراض المرض الذي تعاني منه بالتفصيل</h3>
            <fieldset>
                <label>ادخل عنوان للرسالة</label>
                <textarea name="header" placeholder="ادخل أعراض المرض...." required></textarea>
            </fieldset>
            <fieldset>
                <label>ادخل وصف المرض</label>
                <textarea name="description" placeholder="ادخل أعراض المرض...." required></textarea>
            </fieldset>
            <fieldset>
                <label>اختر الدكتور الذي تريد مراسلته</label><br />
                <select name='doctorId' id='doctorId'>
                    <?php while ($doctor = mysqli_fetch_assoc($doctors)) { ?>
                        <option value="<?php echo $doctor['id'] ?>"><?php echo $doctor['name'] ?></option>
                    <?php } ?>
                </select>
            </fieldset>
            <fieldset>
                <label>ادخل صورة المرض</label><br />
                <input type="file" name="fileToUpload" id="file">
            </fieldset>
            <fieldset>
                <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">ادخل</button>
            </fieldset>
        </form>
    </div>
</body>

</html>