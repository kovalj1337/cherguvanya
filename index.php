<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    session_start();
    // session_destroy();
    if (isset($_POST["uchni"]) && isset($_POST["groups"])) {
        array_push($_SESSION["list"][$_POST["groups"]], $_POST["uchni"]);
    }
    $timeEY = ["9.00", "10.00", "11.00", "12.00", "13.00"];
    $timeBO = ["12.00", "11.00", "13.00", "18.00", "8.00"];
    $timePCB = ["18.00", "17.00", "16.00", "15.00", "14.00"];
    if (!isset($_SESSION["list"])) {
        $_SESSION["list"] = $list = [
            "11-ЕУ" => ["Петро", "Діана", "Валентина"],
            "БО-11" => ["Назар", "Андрій", "Олексій", "Людмила"],
            "ПЦБ-11-07" => ["Данііл", "Оксана"]
        ];
    } else {
        $list = $_SESSION["list"];
    }
    if (isset($_POST["delete"])) {
        $item = $_POST['delete'];
        $group = $_POST['group'];
        array_splice($_SESSION["list"][$group], $item, 1);
    }
    ?>
    <table>
        <thead>
            <tr>
                <th rowspan="2">Ім'я</th>
                <th rowspan="2">Група</th>
                <th colspan="5">Графік</th>
                <th rowspan="2">Видалення</th>
            </tr>
            <tr>
                <th>Понеділок</th>
                <th>Вівторок</th>
                <th>Середа</th>
                <th>Четвер</th>
                <th>П'ятниця</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($_SESSION["list"] as $key => $value) {
                foreach ($value as $item => $name) {
                    echo "<tr>";
                    echo "<td>" . $name . "</td><td>" . $key . '</td>';
                    foreach ($timeEY as $groupEY => $timesEY) {
                        if ($key == "11-ЕУ") {
                            echo "<td>";
                            echo $timesEY . "\n";
                            echo "</td>";
                        }
                    }
                    foreach ($timeBO as $groupBO => $timesBO) {
                        if ($key == "БО-11") {
                            echo "<td>";
                            echo $timesBO . "\n";
                            echo "</td>";
                        }
                    }
                    foreach ($timePCB as $groupPCB => $timesPCB) {
                        if ($key == "ПЦБ-11-07") {
                            echo "<td>";
                            echo $timesPCB . "\n";
                            echo "</td>";
                        }
                    }
                    echo "<td><form action='index.php' method='post'>
                        <input type='hidden' name='group' value = '$key'>
                        <button type='submit' name='delete' value = '$item'>-</button>
                        </form></td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <form action="index.php" method="POST" class="form">
        <input type="text" name="uchni" id="" placeholder="Введіть ім’я студента">
        <select name="groups">
            <option value="11-ЕУ">11-ЕУ</option>
            <option value="БО-11">БО-11</option>
            <option value="ПЦБ-11-07">ПЦБ-11-07</option>
        </select>
        <input type="submit">
    </form>
</body>

</html>