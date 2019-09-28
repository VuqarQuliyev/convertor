<?php
/**
 * Created by PhpStorm.
 * User: Vuqar
 * Date: 02.05.2019
 * Time: 21:41
 */


require_once 'connect.php';


//$title = "";
//$comment = "";
$error = false;
$e = 0;


if ($_POST) {
    $title = $_POST['title'];
    $comment = $_POST['comment'];

    if (!empty($title) && !empty($comment)) {
        $sql = "INSERT INTO text (title, comment) VALUES ('$title', '$comment')";
        $query = $pdo->prepare($sql);
        $query->execute();
        header('location:index.php');

    } else {

        $error = true;

    }
}
// Delete

if (isset($_GET['del_task'])) {
    $id = $_GET['del_task'];
    $query = "DELETE FROM `text` WHERE id=$id";
    $del = $pdo->prepare($query);
    $del->execute();
    header('location:index.php');

}


///SELECT


$sqlFind = "SELECT * FROM text";
$tasks = $pdo->prepare($sqlFind);
$tasks->execute();
$tasks = $tasks->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome to my list</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="headering">
            <h2>Suggestion list</h2>
        </div>
        <?php if ($error): ?>
            <div class="alert alert-danger">
                Fields can not be empty !
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php">
            <input type="text" name="title">
            <input type="text" name=" comment">
            <button type="submit" name="submit" class="submit_btn" style="cursor: pointer">Send</button>
        </form>

        <table>
            <thead>
            <tr>
                <th>№</th>
                <th>Name</th>
                <th>Text</th>
                <th>Delete</th>
                <th>Update</th>
                <th>View</th>
            </tr>
            </thead>

            <tbody>

            <div class="title">
                <h2>List</h2>
            </div>

            <?php foreach ($tasks as $key => $val) {
                $e++; ?>
                <tr>
                    <td><?= $e ?></
                    td>
                    <td class="name_td"><?= $val["title"] ?></td>
                    <td class="text_td"><?= $val["comment"] ?></td>
                    <td>
                        <a class="delet_td" name="delete" href="index.php?del_task=<?= $val['id']; ?>">
                            x
                        </a>
                    </td>
                    <td>
                        <a class="update_td" href="update.php?up_task=<?= $val['id']; ?>">
                            ✎
                        </a>
                    </td>
                    <td>
                        <a class="view_td" href="view.php?view=<?= $val['id'] ?>">
                            v
                        </a>
                    </td>
                </tr>
            <?php } ?>


            </tbody>

        </table>
    </div>

</div>
</body>
</html>