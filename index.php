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
        session_start();
        // session_destroy();
        $timeEY = ["9.00", "10.00", "11.00", "12.00", "13.00"];
        $timeBO = ["12.00", "11.00", "13.00", "18.00", "8.00"];
        $timePCB = ["18.00", "17.00", "16.00", "15.00", "14.00"];
        if (isset($_SESSION["list"])) {
            $list = $_SESSION["list"];
        } else {
            $list = [
                "11-ЕУ" => ["Петро", "Діана", "Валентина"],
                "БО-11" => ["Назар", "Андрій", "Олексій", "Людмила"],
                "ПЦБ-11-07" => ["Данііл", "Оксана"]
            ];
        }
        if (isset($_POST["delete"])) {
            $item = $_POST['delete'];
            array_splice($list,$item, 1);
            $_SESSION["list"] = $list;
        }
        // if (isset($_SESSION["list"])) {
        //     $list = $_SESSION["list"];
        // } else {
        // }
        // if (isset($_POST["grupa"])) {
        //     $k = $_POST["uchni"];
        //     $l = $_POST["grupa"];
        //     // var_dump($_SESSION["list"]);
        //     array_push($list, [$k, $l]);
        //     $_SESSION["list"] = $list;
        // }
        // if (isset($_SESSION["deleteName"]) && isset($_SESSION["deleteGroup"])) {
        //     unset($_SESSION["deleteGroup"]);
        //     unset($_SESSION["deleteName"]);
        // }
        // foreach($list as $key){
        //     if(is_array($key)){
        //         foreach($key as $item){
        //             echo $item ."<br>";
        //         }
        //     }else{
        //         echo $key . '<br>';     
        //     }
        // }
        foreach ($list as $key => $value) {
            foreach ($value as $item) {
                echo $key . ":" . $item . ':';
                foreach ($timeEY as $groupEY => $timesEY) {
                    if ($key == "11-ЕУ") {
                        echo $timesEY . "\n";
                    }
                }
                foreach ($timeBO as $groupBO => $timesBO) {
                    if ($key == "БО-11") {
                        echo $timesBO . "\n";
                    }
                }
                foreach ($timePCB as $groupPCB => $timesPCB) {
                    if ($key == "ПЦБ-11-07") {
                        echo $timesPCB . "\n";
                    }
                }
                echo "<br>";
                echo "<form action='index.php' method='post'><button type='submit' name='delete' value = '$item'>-</button></form>";
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
            // if (isset($list)) {
            //     for ($i = 0; $i < count($list) - 1; $i++) {
            //         echo "<tr><th>" . $list[$i][0] . "</th><th>" . $list[$i][1] . "</th>";
            //         for ($j = 0; $j < count($times[$list[$i][1]]); $j++) {
            //             echo "<th>" . $times[$list[$i][1]][$j] . "</th>";
            //         }
            //         var_dump(count($times[$list[$i][1]]));
            //         // var_dump($list[$i][1]);
            //         echo "<th><form action='index.php' method='POST'>
            //         <input type='hidden' name='deleteName' value='" . $list[$i][0] . "'>
            //         <input type='hidden' name='deleteGroup' value='" . $list[$i][1] . "'>
            //         <button type='submit' >-</button>
            //         </form></th>";
            //         echo "</tr>";
            //     }
            //     if(isset($_POST["deleteName"]) && isset($_POST["deleteGroup"])){
            //         $_SESSION["deleteName"] = $_POST["deleteName"];
            //         $_SESSION["deleteGroup"] = $_POST["deleteGroup"];
            //     }
            // }
            ?>
        </tbody>
    </table>
</body>

</html>