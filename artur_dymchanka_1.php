<?php 

// 1.

$name = 'Arthur';
$surename = 'Dymchanka';
$birthDate = 1992;
$date = 2020;

$age = $date - $birthDate;

echo "Aš esu $name $surename. Man yra $age metai(ų).";
echo '<br>';
echo '<br>';

// 2.

$randomNr1 = rand(0, 4);
$randomNr2 = rand(0, 4);

echo "Gauti tokie skaiciai: $randomNr1, $randomNr2";
echo '<br>';

if($randomNr1 === 0 || $randomNr2 === 0){
    echo 'vienas is atsitiktiniu skaiciu yra 0. Dalini is 0 negalima.';
}else{
    if($randomNr1 > $randomNr2){
        $dividedNumer = $randomNr1 / $randomNr2;
        echo round($dividedNumer, 2);
    } elseif ($randomNr2 > $randomNr1){
        $dividedNumer = $randomNr2 / $randomNr1;
        echo round($dividedNumer, 2);
    } else {
        echo 'Skaiciai gavosi lygus. Rezultatas: 1';
    }
}
echo '<br>';
echo '<br>';
// 3.

$randomNr3 = rand(0, 25);
$randomNr4 = rand(0, 25);
$randomNr5 = rand(0, 25);

echo "Gauti tokie skaiciai: $randomNr3, $randomNr4, $randomNr5";
echo '<br>';

if($randomNr3 === $randomNr4 || $randomNr3 === $randomNr5 || $randomNr4 === $randomNr5){
    echo 'Yra pasikartojanciu skaiciu, vidurines reiksmes nesigaus pavaizduoti';
}else{
    if($randomNr3 > $randomNr4 && $randomNr3 > $randomNr5){
        if($randomNr4 > $randomNr5){
            echo $randomNr4;
        }else{
            echo $randomNr5;
        }
    }

    if($randomNr4 > $randomNr3 && $randomNr4 > $randomNr5){
        if($randomNr3 > $randomNr5){
            echo $randomNr3;
        }else{
            echo $randomNr5;
        }
    }

    if($randomNr5 > $randomNr3 && $randomNr5 > $randomNr4){
        if($randomNr3 > $randomNr4){
            echo $randomNr3;
        }else{
            echo $randomNr4;
        }
    }
}

echo '<br>';
echo '<br>';

// 4.

$a = rand(1, 10);
$b = rand(1, 10);
$c = rand(1, 10);

echo "Gauti tokie skaiciai: $a, $b, $c";
echo '<br>';

if($a > $b && $a > $c){
    if(($b + $c) > $a){
        echo 'Is tokiu krastiniu imanoma sudaryta trikampi';
    }else{
        echo 'Is tokiu krastiniu neimanoma sudaryta trikampi';
    }
}elseif($b > $a && $b > $c){
    if(($a + $c) > $b){
        echo 'Is tokiu krastiniu imanoma sudaryta trikampi';
    }else{
        echo 'Is tokiu krastiniu neimanoma sudaryta trikampi';
    }
}if($c > $b && $c > $a){
    if(($b + $a) > $c){
        echo 'Is tokiu krastiniu imanoma sudaryta trikampi';
    }else{
        echo 'Is tokiu krastiniu neimanoma sudaryta trikampi';
    }
}
echo '<br>';
echo '<br>';

// 5.

$randomNr6 = rand(0, 2);
$randomNr7 = rand(0, 2);
$randomNr8 = rand(0, 2);
$randomNr9 = rand(0, 2);

echo "Gauti tokie skaiciai: $randomNr6, $randomNr7, $randomNr8, $randomNr9";
echo '<br>';

$zeno = 0;
$one = 0;
$two = 0;

if($randomNr6 === 0){
    $zeno++;
}elseif($randomNr6 === 1){
    $one++;
}elseif ($randomNr6 === 2) {
    $two++;
}

if($randomNr7 === 0){
    $zeno++;
}elseif($randomNr7 === 1){
    $one++;
}elseif ($randomNr7 === 2) {
    $two++;
}

if($randomNr8 === 0){
    $zeno++;
}elseif($randomNr8 === 1){
    $one++;
}elseif ($randomNr8 === 2) {
    $two++;
}

if($randomNr9 === 0){
    $zeno++;
}elseif($randomNr9 === 1){
    $one++;
}elseif ($randomNr9 === 2) {
    $two++;
}

echo "nuliu: $zeno, vienetu: $one, dvejetu: $two.";

echo '<br>';
echo '<br>';

// 6.

$randomHTMLTag = rand(1, 6);
echo "<h$randomHTMLTag>$randomHTMLTag</h$randomHTMLTag>";

echo '<br>';
echo '<br>';

// 7.

$randomNr10 = rand(-10, 10);
$randomNr11 = rand(-10, 10);
$randomNr12 = rand(-10, 10);

$redColor = '#FF2D00';
$greenColor = '#30FF00';
$blueColor = '#000EFF';


if($randomNr10 < 0){
    echo "<span style=\"color:$greenColor;\">$randomNr10, </span>";
}elseif ($randomNr10 === 0) {
    echo "<span style=\"color:$redColor;\">$randomNr10, </span>";
}else{
    echo "<span style=\"color:$blueColor;\">$randomNr10, </span>";
}

if($randomNr11 < 0){
    echo "<span style=\"color:$greenColor;\">$randomNr11, </span>";
}elseif ($randomNr11 === 0) {
    echo "<span style=\"color:$redColor;\">$randomNr11, </span>";
}else{
    echo "<span style=\"color:$blueColor;\">$randomNr11, </span>";
}

if($randomNr12 < 0){
    echo "<span style=\"color:$greenColor;\">$randomNr12</span>";
}elseif ($randomNr12 === 0) {
    echo "<span style=\"color:$redColor;\">$randomNr12</span>";
}else{
    echo "<span style=\"color:$blueColor;\">$randomNr12</span>";
}

echo '<br>';
echo '<br>';

// 8.

$candleCount = rand(5, 3000);

if($candleCount < 1000){
    echo "Perkama $candleCount zvakiu. Bendra ju suma bus $candleCount EUR.";
}elseif ($candleCount >= 1000 && $candleCount < 2000) {
    $discountPrice = $candleCount * 0.97;
    echo "Perkama $candleCount zvakiu. Bendra ju suma bus $discountPrice EUR.";
}elseif ($candleCount >= 2000) {
    $discountPrice = $candleCount * 0.96;
    echo "Perkama $candleCount zvakiu. Bendra ju suma bus $discountPrice EUR.";
}

echo '<br>';
echo '<br>';

// 9.

$randomNr13 = rand(0, 100);
$randomNr14 = rand(0, 100);
$randomNr15 = rand(0, 100);

echo "Gauti tokie skaiciai: $randomNr13, $randomNr14, $randomNr15";
echo '<br>';

$average = ($randomNr13 + $randomNr14 + $randomNr15) / 3;
$averageRounded = intval($average);

echo "Aritmetinis vidurkis: $averageRounded";
echo '<br>';

$filterCounter = 0;

if($randomNr13<10 || $randomNr13>90){
    $randomNr13 = 0;
    $filterCounter++;
}
if($randomNr14<10 || $randomNr14>90){
    $randomNr14 = 0;
    $filterCounter++;
}
if($randomNr15<10 || $randomNr15>90){
    $randomNr15 = 0;
    $filterCounter++;
}

if($filterCounter == 3){
    echo "Nera nei vieno tinkamo skaiciaus";
}else{
    $averageFiltered = ($randomNr13 + $randomNr14 + $randomNr15) / (3 - $filterCounter);
    $averageFilteredRounded = intval($averageFiltered);
    echo "Filtruotas aritmetinis vidurkis: $averageFilteredRounded";

}

echo '<br>';
echo '<br>';

// 10.

$hour = rand(0, 23);
$minute = rand(0, 59);
$second = rand(0, 59);

$addSeconds = rand(0, 300);

echo "Laikrodis be pridejimo $hour: $minute: $second";
echo '<br>';

echo "Secundes prideti: $addSeconds";
echo '<br>';

if(($second + $addSeconds) < 60){
    $newSecond = $second + $addSeconds;
    echo "Laikrodis po pridejimo $hour: $minute: $newSecond";
}else{
    $minutesToAdd = floor(($second + $addSeconds) / 60);
    $newMinute = $minute + $minutesToAdd;
    $newSecond = ($second + $addSeconds) - ($minutesToAdd *60);

    if($newMinute < 60){
        echo "Laikrodis po pridejimo $hour: $newMinute: $newSecond";
    }else{
        $newHour = $hour++;
        $newMinute = ($minute + $minutesToAdd) - 60;

        if($newHour < 24){
            echo "Laikrodis po pridejimo $newHour: $newMinute: $newSecond";
        }else{
            echo "Laikrodis po pridejimo 00: $newMinute: $newSecond";
        }
    }
}

echo '<br>';
echo '<br>';

// 11.

$r1 = rand(1000, 9999);
$r2 = rand(1000, 9999);
$r3 = rand(1000, 9999);
$r4 = rand(1000, 9999);
$r5 = rand(1000, 9999);
$r6 = rand(1000, 9999);

$n1 = 0;
$n2 = 0;
$n3 = 0;
$n4 = 0;
$n5 = 0;
$n6 = 0;

echo "Gauti skaiciai: $r1, $r2, $r3, $r4, $r5, $r6";
echo '<br>';

// Ieskom pirmos vietos

if($r1 >= $r2 && $r1 >= $r3 && $r1 >= $r4 && $r1 >= $r5 && $r1 >= $r6){
    $n1 = $r1;
    $r1 = 0;
}elseif($r2 >= $r1 && $r2 >= $r3 && $r2 >= $r4 && $r2 >= $r5 && $r2 >= $r6){
    $n1 = $r2;
    $r2 = 0;
}elseif($r3 >= $r2 && $r3 >= $r1 && $r3 >= $r4 && $r3 >= $r5 && $r3 >= $r6){
    $n1 = $r3;
    $r3 = 0;
}elseif($r4 >= $r2 && $r4 >= $r3 && $r4 >= $r1 && $r4 >= $r5 && $r4 >= $r6){
    $n1 = $r4;
    $r4 = 0;
}elseif($r5 >= $r2 && $r5 >= $r3 && $r5 >= $r4 && $r5 >= $r1 && $r5 >= $r6){
    $n1 = $r5;
    $r5 = 0;
}elseif($r6 >= $r2 && $r6 >= $r3 && $r6 >= $r4 && $r6 >= $r5 && $r6 >= $r1){
    $n1 = $r6;
    $r6 = 0;
}

// Ieskom antros vietos

if($r1 >= $r2 && $r1 >= $r3 && $r1 >= $r4 && $r1 >= $r5 && $r1 >= $r6){
    $n2 = $r1;
    $r1 = 0;
}elseif($r2 >= $r1 && $r2 >= $r3 && $r2 >= $r4 && $r2 >= $r5 && $r2 >= $r6){
    $n2 = $r2;
    $r2 = 0;
}elseif($r3 >= $r2 && $r3 >= $r1 && $r3 >= $r4 && $r3 >= $r5 && $r3 >= $r6){
    $n2 = $r3;
    $r3 = 0;
}elseif($r4 >= $r2 && $r4 >= $r3 && $r4 >= $r1 && $r4 >= $r5 && $r4 >= $r6){
    $n2 = $r4;
    $r4 = 0;
}elseif($r5 >= $r2 && $r5 >= $r3 && $r5 >= $r4 && $r5 >= $r1 && $r5 >= $r6){
    $n2 = $r5;
    $r5 = 0;
}elseif($r6 >= $r2 && $r6 >= $r3 && $r6 >= $r4 && $r6 >= $r5 && $r6 >= $r1){
    $n2 = $r6;
    $r6 = 0;
}

// Ieskom trecios vietos

if($r1 >= $r2 && $r1 >= $r3 && $r1 >= $r4 && $r1 >= $r5 && $r1 >= $r6){
    $n3 = $r1;
    $r1 = 0;
}elseif($r2 >= $r1 && $r2 >= $r3 && $r2 >= $r4 && $r2 >= $r5 && $r2 >= $r6){
    $n3 = $r2;
    $r2 = 0;
}elseif($r3 >= $r2 && $r3 >= $r1 && $r3 >= $r4 && $r3 >= $r5 && $r3 >= $r6){
    $n3 = $r3;
    $r3 = 0;
}elseif($r4 >= $r2 && $r4 >= $r3 && $r4 >= $r1 && $r4 >= $r5 && $r4 >= $r6){
    $n3 = $r4;
    $r4 = 0;
}elseif($r5 >= $r2 && $r5 >= $r3 && $r5 >= $r4 && $r5 >= $r1 && $r5 >= $r6){
    $n3 = $r5;
    $r5 = 0;
}elseif($r6 >= $r2 && $r6 >= $r3 && $r6 >= $r4 && $r6 >= $r5 && $r6 >= $r1){
    $n3 = $r6;
    $r6 = 0;
}

// Ieskom ketvirtos vietos

if($r1 >= $r2 && $r1 >= $r3 && $r1 >= $r4 && $r1 >= $r5 && $r1 >= $r6){
    $n4 = $r1;
    $r1 = 0;
}elseif($r2 >= $r1 && $r2 >= $r3 && $r2 >= $r4 && $r2 >= $r5 && $r2 >= $r6){
    $n4 = $r2;
    $r2 = 0;
}elseif($r3 >= $r2 && $r3 >= $r1 && $r3 >= $r4 && $r3 >= $r5 && $r3 >= $r6){
    $n4 = $r3;
    $r3 = 0;
}elseif($r4 >= $r2 && $r4 >= $r3 && $r4 >= $r1 && $r4 >= $r5 && $r4 >= $r6){
    $n4 = $r4;
    $r4 = 0;
}elseif($r5 >= $r2 && $r5 >= $r3 && $r5 >= $r4 && $r5 >= $r1 && $r5 >= $r6){
    $n4 = $r5;
    $r5 = 0;
}elseif($r6 >= $r2 && $r6 >= $r3 && $r6 >= $r4 && $r6 >= $r5 && $r6 >= $r1){
    $n4 = $r6;
    $r6 = 0;
}

// Ieskom penktos vietos

if($r1 >= $r2 && $r1 >= $r3 && $r1 >= $r4 && $r1 >= $r5 && $r1 >= $r6){
    $n5 = $r1;
    $r1 = 0;
}elseif($r2 >= $r1 && $r2 >= $r3 && $r2 >= $r4 && $r2 >= $r5 && $r2 >= $r6){
    $n5 = $r2;
    $r2 = 0;
}elseif($r3 >= $r2 && $r3 >= $r1 && $r3 >= $r4 && $r3 >= $r5 && $r3 >= $r6){
    $n5 = $r3;
    $r3 = 0;
}elseif($r4 >= $r2 && $r4 >= $r3 && $r4 >= $r1 && $r4 >= $r5 && $r4 >= $r6){
    $n5 = $r4;
    $r4 = 0;
}elseif($r5 >= $r2 && $r5 >= $r3 && $r5 >= $r4 && $r5 >= $r1 && $r5 >= $r6){
    $n5 = $r5;
    $r5 = 0;
}elseif($r6 >= $r2 && $r6 >= $r3 && $r6 >= $r4 && $r6 >= $r5 && $r6 >= $r1){
    $n5 = $r6;
    $r6 = 0;
}

// Ieskom sestos vietos

if($r1 >= $r2 && $r1 >= $r3 && $r1 >= $r4 && $r1 >= $r5 && $r1 >= $r6){
    $n6 = $r1;
    $r1 = 0;
}elseif($r2 >= $r1 && $r2 >= $r3 && $r2 >= $r4 && $r2 >= $r5 && $r2 >= $r6){
    $n6 = $r2;
    $r2 = 0;
}elseif($r3 >= $r2 && $r3 >= $r1 && $r3 >= $r4 && $r3 >= $r5 && $r3 >= $r6){
    $n6 = $r3;
    $r3 = 0;
}elseif($r4 >= $r2 && $r4 >= $r3 && $r4 >= $r1 && $r4 >= $r5 && $r4 >= $r6){
    $n6 = $r4;
    $r4 = 0;
}elseif($r5 >= $r2 && $r5 >= $r3 && $r5 >= $r4 && $r5 >= $r1 && $r5 >= $r6){
    $n6 = $r5;
    $r5 = 0;
}elseif($r6 >= $r2 && $r6 >= $r3 && $r6 >= $r4 && $r6 >= $r5 && $r6 >= $r1){
    $n6 = $r6;
    $r6 = 0;
}

echo "Surykiuoti skaiciai: $n1 $n2 $n3 $n4 $n5 $n6";