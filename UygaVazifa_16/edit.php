<?php
session_start();
include "Actions.php";
include "database.php";

$db = new Database();
$student = new Actions($db->connect());

$student->id = $_SESSION['id'];

$students = $student->getOne();

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
                        <input type="text" name="fio" class="form-control" id="FIO" value="<?= $student['fio'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Telefon" class="form-label">Telefon</label>
                        <input type="text" name="tel" class="form-control" id="Telefon" value="<?=$student['tel']?>">
                    </div>
                    <div class="mb-3">
                        <label for="Manzil" class="form-label">Manzil</label>
                        <input type="text" name="manzil" class="form-control" id="Manzil" value="<?=$student['manzil']?>">
                    </div>
                    <div class="mb-3">
                        <label for="Rasm" class="form-label">Rasm</label>
                        <img src="<?= $student['rasm'] ?>" alt="">
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