<?php

include 'connect.php';


$id = $_GET['up_task'];

$selec = "SELECT * FROM `text` WHERE id = $id";
$select = $pdo->prepare($selec);
$select->execute();
$task = $select->fetch(PDO::FETCH_ASSOC);
//print_r($task['id']);die();

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $title= $_POST['title'];
    $comment = $_POST['comment'];

    $sqlUpdate  ="UPDATE `text` SET `title`='$title',`comment`='$comment' WHERE `id`='$id'";
    $query = $pdo->prepare($sqlUpdate);
    $query->execute();
    header('location: index.php');
}




?>

<!DOCTYPE   html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!--    <link rel="stylesheet" type="text/css" href="style.css">-->
</head>
<body>
<table>
    <thead>
        <h2>Updating now</h2>
        <tr>
            <th>title</th>
            <th>text</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <form method="POST" action="update.php">
                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                <td><input type="text" name="title" value="<?=$task['title']?>"></td>
                <td><input type="text" name=" comment" value="<?=$task['comment']?>"></td>
                <td>
                    <button type="submit" name="submit" class="submit_btn" style="cursor: pointer ">
                        Send
                    </button>
                </td>
            </form>
        </tr>
    </tbody>

</table>


</body>
</html>
