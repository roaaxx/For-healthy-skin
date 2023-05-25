<?php
require('dbconnect.php');
session_start();

$error = '';
// check if user is logged in
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_SESSION['loggedIn'])) {
        header("Location: auth.php");
    }
    if ($_SESSION['user']['role'] != 'doctor') {
        header("Location: index.php");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $symptoms = $_POST['symptoms'];
    $reasons = $_POST['reasons'];
    $diagnosis = $_POST['diagnosis'];
    $medicine = $_POST['medicine'];
    // $file = $_POST['file'];
    $doctorId = $_POST['doctorId'];
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
    if ($_FILES["fileToUpload"]["size"] > 500000) {
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
            if ($name == '' or $description == '' or $symptoms == '' or $reasons == '' or $diagnosis == '' or $medicine == '' or $file == '') {
                $error = 'جميع الحقول مطلوبة';
            } else {
                $data = array(
                    'name' => $name,
                    'description' => $description,
                    'symptoms' => $symptoms,
                    'reasons' => $reasons,
                    'diagnosis' => $diagnosis,
                    'medicine' => $medicine,
                    'image' => $file,
                    'doctorId' => $doctorId
                );
                create($conn, 'article', $data);
                header("Location: disease.php");
            }
        } else {
            // $error =  "Sorry, there was an error uploading your file.";
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
    <title>اضافة مرض</title>
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
            <h3>ادخل المقالة</h3>
            <fieldset>
                <label>ادخل اسم المرض</label>
                <textarea name="name" placeholder="ادخل اسم المرض..." required></textarea>
            </fieldset>
            <fieldset>
                <label>ادخل وصف المرض</label>
                <textarea name="description" placeholder="ادخل أعراض المرض...." required></textarea>
            </fieldset>
            <fieldset>
                <label>ادخل أعراض المرض</label>
                <textarea name="symptoms" placeholder="ادخل أعراض المرض...." required></textarea>
            </fieldset>
            <fieldset>
                <label>ادخل أسباب وعوامل المرض</label>
                <textarea name="reasons" placeholder="ادخل أسباب وعوامل المرض...." required></textarea>
            </fieldset>
            <fieldset>
                <label>ادخل تشخيص المرض</label>
                <textarea name="diagnosis" placeholder="ادخل تشخيص المرض...." required></textarea>
            </fieldset>
            <fieldset>
                <label>ادخل علاج المرض</label>
                <textarea name="medicine" placeholder="ادخل علاج المرض...." required></textarea>
            </fieldset>
            <fieldset>
                <label>ادخل صورة المرض</label><br />
                <input type="file" name="fileToUpload" id="file">
            </fieldset>
            <input type="hidden" name="doctorId" value="<?php echo $_SESSION['user']['id'] ?>" required>
            <fieldset>
                <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">ادخل</button>
            </fieldset>
        </form>
    </div>
</body>

</html>