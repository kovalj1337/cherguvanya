<!DOCTYPE html>
<html lang="en">
    
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<form action="index.php" method="POST">
    <input type="text" name="uchni" id="">
    <input type="text" name="grupa" id="">
    <input type="submit">
</form>

<body>
    <?php
    if ($_POST) {
        session_start();
        // session_destroy();
        $times = [
            "11-ЕУ" => ["9.00", "10.00", "11.00", "12.00", "13.00"],
            "БО-11" => ["12.00", "11.00", "13.00", "18.00", "8.00"],
            "ПЦБ-11-07" => ["18.00", "17.00", "16.00", "15.00", "14.00"]
        ];
        if (isset($_SESSION["list"])) {
            $list = $_SESSION["list"];
        } else {
            $list = [];
        }
        if (isset($_POST["grupa"])) {
            $l = $_POST["grupa"];
            $k = $_POST["uchni"];
            // var_dump($_SESSION["list"]);
            array_push($list, [$k, $l]);
            $_SESSION["list"] = $list;
        }
        if (isset($_SESSION["deleteName"]) && isset($_SESSION["deleteGroup"])) {
            unset($_SESSION["deleteGroup"]);
            unset($_SESSION["deleteName"]);
        }
    }
    ?>
    <table>
        <tbody>
            <tr>
                <th rowspan="2">Ім'я</th>
                <th rowspan="2">Група</th>
                <th colspan="5">Графік</th>
            </tr>
            <tr>
                <th>Понеділок</th>
                <th>Вівторок</th>
                <th>Середа</th>
                <th>Четвер</th>
                <th>П'ятниця</th>
            </tr>
            <tr>

            </tr>
            <?php
            // echo(count($list));
            if (isset($list)) {
                for ($i = 0; $i < count($list) - 1; $i++) {
                    echo "<tr><th>" . $list[$i][0] . "</th><th>" . $list[$i][1] . "</th>";
                    for ($j = 0; $j < count($times[$list[$i][1]]); $j++) {
                        echo "<th>" . $times[$list[$i][1]][$j] . "</th>";
                    }
                    var_dump(count($times[$list[$i][1]]));
                    // var_dump($list[$i][1]);
                    echo "<th><form action='index.php' method='POST'>
                    <input type='hidden' name='deleteName' value='" . $list[$i][0] . "'>
                    <input type='hidden' name='deleteGroup' value='" . $list[$i][1] . "'>
                    <button type='submit' >-</button>
                    </form></th>";
                    echo "</tr>";
                }
                if(isset($_POST["deleteName"]) && isset($_POST["deleteGroup"])){
                    $_SESSION["deleteName"] = $_POST["deleteName"];
                    $_SESSION["deleteGroup"] = $_POST["deleteGroup"];
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>