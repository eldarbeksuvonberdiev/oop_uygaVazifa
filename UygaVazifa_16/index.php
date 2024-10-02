<?php
include "Actions.php";
include "database.php";

$db = new Database();
$student = new Actions($db->connect());
$students = $student->getAll();

if (isset($_POST['del_id'])) {
    $student->id = $_POST['del_id'];
    if($student->delete()){
        echo "O'chirildi!";
    }else{
        echo "Xatolik yuz berdi!";
    }
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
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg bg-body-secondary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="addNew.php">Add new Student</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-10 offset-1">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">FIO</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Image</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($students as $student) { ?>
                            <tr>
                                <th scope="row"><?= $student['id'] ?></th>
                                <td><?= $student['fio'] ?></td>
                                <td><?= $student['tel'] ?></td>
                                <td><?= $student['manzil'] ?></td>
                                <td>
                                    <img src="<?= $student['img'] ?>" width="100" alt="">
                                </td>
                                <td>
                                    <form action="" method="POST">
                                        <a href="">Edit</a>
                                        <a href="?del_id=<?= $student['id'] ?>">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>