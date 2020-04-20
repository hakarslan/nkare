<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>nKare</title>

    <link rel="stylesheet" href="style.css">


</head>
<body>


<?php

$kareler = array();


$n = 3;

$toplam = $n * $n;

$ilk = $_POST['ilk']; if (!isset($ilk)) { $ilk =  1; }
$ilkx = $_POST['ilkx']; if (!isset($ilkx)) { $ilkx =  2; }
$ilky = $_POST['ilky']; if (!isset($ilky)) { $ilky =  3; }

$xi = $ilkx;
$yi = $ilky;

$kare = "X"."$ilkx"."Y"."$ilky";
array_push($kareler,$kare);

$ilkx++;
$ilky++;

for ($s = 2;  $s <= $toplam ;) {

    if ($ilkx > $n && $ilky <= $n ) { $ilkx = $ilkx%$n; }
    if ($ilky > $n && $ilkx <= $n ) { $ilky = $ilky%$n; }
    if ($ilkx > $n && $ilky > $n ) { $ilkx = $n; $ilky = $n -1; }



    $kare = "X"."$ilkx"."Y"."$ilky";

    if ( !in_array($kare,$kareler) ) {

            array_push($kareler, $kare);
            $s++;

            $ilkx++;  $ilky++;
    } elseif ($ilkx > 1 && $ilky > 2) {

        $ilkx--; $ilky--; $ilky--;

        $kare = "X"."$ilkx"."Y"."$ilky";

            if ( !in_array($kare,$kareler) ) {
            array_push($kareler, $kare);
            $s++;
            }

        $ilkx++;  $ilky++;
    } elseif ($ilkx > 0 && $ilky > 1) {

        $ilky--;
        $kare = "X"."$ilkx"."Y"."$ilky";

            if ( !in_array($kare,$kareler) ) {
            array_push($kareler, $kare);
            $s++;
             }

        $ilkx++;  $ilky++;

    } else {

        $ilkx = 1; $ilky = 1;

        $kare = "X"."$ilkx"."Y"."$ilky";

            if ( !in_array($kare,$kareler) ) {
            array_push($kareler, $kare);
            $s++;
            }

        $ilkx++;  $ilky++;

    }


}


    echo "<table>";

        for ($y = $n; $y > 0; $y--) {
            echo "<tr>";

                for ($x = 1; $x <= $n; $x++) {
                    echo "<td>";


                        ?>

                            <form action="index.php" method="post">
                                <input type="text" size="1" id="ilk" name="ilk" value="<?php

                                $karexy = "X".$x."Y".$y;
                                $deger = array_search ($karexy, $kareler);
                                echo $deger+$ilk;

                                ?>">
                                <input type="hidden" id="ilkx" name="ilkx" value="<?php echo $x; ?>">
                                <input type="hidden" id="ilky" name="ilky" value="<?php echo $y; ?>">
                            </form>


                    <?php

                    echo "</td>";
                }

            echo "</tr>";
        }

    echo "</table>";

?>


</body>
</html>
