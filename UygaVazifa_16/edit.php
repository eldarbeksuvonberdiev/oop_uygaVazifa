<?php
session_start();
include "Actions.php";
include "database.php";

$db = new Database();
$student = new Actions($db->connect());

$student->id = (int)$_SESSION['id'];
$students = $student->getOne();

if (isset($_POST['edit']) && !empty($_POST['fio']) && !empty($_POST['tel']) && !empty($_POST['manzil']) && !empty($_FILES['rasm'])) {
    $student->id = (int)$_SESSION['id'];
    $student->fname = $_POST['fio'];
    $student->tel = $_POST['tel'];
    $student->manzil = $_POST['manzil'];
    print_r($student);
    // if (isset($_FILES['rasm'])) {
    //     $data = explode('.', $_FILES['rasm']['name']);
    //     $name = 'images/' . date('Y-m-d-H-i-s') . '.' . $data[1];
    //     move_uploaded_file($_FILES['rasm']['tmp_name'], $name);

    //     $student->rasm = $name;
    // }
    // if ($student->edit())
    //     header("location:index.php");
    // else
    //     echo "Xatolik yuz berdi";
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color: #c4c1b7">
    <div class="container mt-5 bg-secondary" style="border-radius: 10px;">
        <div class="row">
            <div class="col-8 offset-2 mt-5 mb-5">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="FIO" class="form-label">FIO</label>
                        <input type="text" name="fio" class="form-control" id="FIO" value="<?= $students['fio'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Telefon" class="form-label">Telefon</label>
                        <input type="text" name="tel" class="form-control" id="Telefon" value="<?= $students['tel'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Manzil" class="form-label">Manzil</label>
                        <input type="text" name="manzil" class="form-control" id="Manzil" value="<?= $students['manzil'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Rasm" class="form-label">Rasm</label>
                        <img src="<?= $students['img'] ?>" width="200" alt=""><br><br>
                        <input type="file" name="rasm" class="form-control" id="Rasm" placeholder="Rasm">
                    </div>
                    <button type="submit" name="edit" class="btn btn-primary">Primary</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>