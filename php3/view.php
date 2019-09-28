<?php

include 'connect.php';
//require_once 'index.php';





if(($_GET['view'])) {

    $id = $_GET['view'];

    $selec_view = "SELECT * FROM `text` WHERE id =$id";
    $selec = $pdo->prepare($selec_view);
    $selec->execute();
    $select= $selec->fetch(PDO::FETCH_ASSOC);
}

?>





<!DOCTYPE   html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div class="container form-view">
        <div class="row">
            <table >
                <thead>
                <div class="view-h2">
                    <h2>VIEW</h2>
                </div>

                <div class="title-view">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Text</th>
                    </tr>
                </div>

                </thead>
                <tbody>

                <div class="view">
                    <form method="POST" action="view.php">
                        <tr>
                            <td><?= $select['id'] ?></td>
                            <td ><?=$select['title']?></td>
                            <td><?=$select['comment']?></td>
                        </tr>


                    </form>
                </div>

                <a href="index.php">Ana sehife</a>
                </tbody>

            </table>
        </div>
    </div>



</body>
</html>

