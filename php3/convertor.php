<html>
<head>

</head>

<body>

<?php

require_once 'db.php';


//    $query = 'SELECT * FROM `currencies`';
//
//    $currencies = $db->prepare($query);
//
//    $currencies->execute();
//
//    $currencies = $currencies->fetchAll(PDO::FETCH_ASSOC);


$select = "SELECT * FROM `currencies`";
$selectCurren = $db->prepare($select);
$selectCurren->execute();
$currencies = $selectCurren->fetchAll(PDO::FETCH_ASSOC);





?>

<h2 style="text-align: center">Valyuta Konvertoru</h2>


<form action="convertor.php" method="post">
    <input type="text" name="number">



    <select name="dropdown1">

        <?php foreach ($currencies as $k => $v): ?>

            <option value="<?= $v['id'] ?>"> <?= $v['currency'] ?> </option>

        <?php endforeach; ?>

    </select>

    <select name="dropdown2">

        <?php foreach ($currencies as $k => $v): ?>

            <option value="<?= $v['id'] ?>"> <?= $v['currency'] ?> </option>

        <?php endforeach; ?>

    </select>

    <button type="submit" name="submit">hesabla</button>

</form>


</body>
</html>




<?php

if (isset($_POST['submit'])) {

    $money1 = $_POST['dropdown1'];
    $money2 = $_POST['dropdown2'];


    $number = $_POST['number'];

    $query = 'SELECT value
              FROM exchange e
              where e.from_currency_id = ' . $money1 . ' and
                    e.to_currency_id = ' . $money2 . '
          ';

    $exchange = $db->prepare($query);

    $exchange->execute();

    $exchange = $exchange->fetch(PDO::FETCH_ASSOC);


    echo $number * $exchange['value'];
}
/*    if ($money1 == "USD" AND $money2 == "TRY") {
        echo $number * 5.589 .  " Try ";

    }
    if ($money1 == "TRY" AND $money2 == "USD") {
        echo $number * 0.1787 . " USD ";

    }
    if ($money1 == "AZN" AND $money2 == "USD") {
        echo $number * 0.5882 . " USD ";

    }
    if ($money1 == "AZN" AND $money2 == "TRY") {
        echo $number * 3.3014 .  " TRY";

    }
    if ($money1 == "TRY" AND $money2 == "AZN") {
        echo $number * 0.3029.  " AZN ";

    }
    if ($money1 == "USD" AND $money2 == "AZN") {
        echo $number * 1.70 .   " AZN ";

    }*/


?>