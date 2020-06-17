<?php
// 1.a

$starRow = "";

for($i = 1; $i <= 400; $i++){
    $starRow.= '*';
}

echo '<div style="width: 100%; word-break: break-all;">'.$starRow.'</div>';

echo '<br>';
// 1.b

$fiftyRow = "";

for($i = 1; $i <= strlen($starRow); $i++){
    $fiftyRow.= '*';
    if(strlen($fiftyRow) == 50){
        echo $fiftyRow;
        echo '<br>';
        $fiftyRow = "";
    }
}

echo $fiftyRow; //Cia jei lieka po ciklo dalis kuri yra maziau nei 50.
echo '<br>';
echo '<br>';

// 2.

$dideliSkaiciai = 0;

for ($i = 0; $i <= 300; $i++){
    $randomNumber = rand(0, 300);

    if($randomNumber > 150){
        $dideliSkaiciai++;
    }
    if($randomNumber > 275){
        echo "<span style=\"color:red;\"> $randomNumber</span>";
    }else{
        echo ' ' . $randomNumber;
    }
}

echo '<br>';
echo 'Virs 150 gauta tiek skaiciu: '. $dideliSkaiciai;

echo '<br>';
echo '<br>';

// 3.

$switch = true;

for ($i = 1; $i <= 3000; $i++){
    if($switch){
        echo $i;
        $switch = false;
    }else{
        if($i%77 == 0){
            echo ', ' . $i;
        }
    }
}

echo '<br>';
echo '<br>';

// 4.

$squereStar = "";

for($i = 0; $i < 100; $i++){
    $squereStar.= str_repeat('*', 100) . '<br>';
}

echo '<div style="line-height: 8px;">'.$squereStar.'</div>';
echo '<br>';
echo '<br>';


// 5.

$squereStar2 = "";
$firstColor = 0;
$lastColor = 99;


for($i = 0; $i < 100; $i++){
    $leftSideColored = false;
    $rightSideColored = false;

    for($j = 0; $j < 100; $j++){

        if($firstColor == $j &&  $lastColor == $j && !$leftSideColored && !$rightSideColored){
            $squereStar2 .= "<span style=\"color:red;\">*</span>";
            $firstColor++;
            $lastColor--;
            $leftSideColored = true;
            $rightSideColored = true;
        }else{
            if($j == $lastColor && !$rightSideColored){
                $squereStar2 .= "<span style=\"color:red;\">*</span>";
                $lastColor--;
                $rightSideColored = true;
            }elseif($j == $firstColor && !$leftSideColored ){
                $squereStar2 .= "<span style=\"color:red;\">*</span>";
                $firstColor++;
                $leftSideColored = true;
            }else{
                $squereStar2 .= '*';
            }
        }
    }
    $squereStar2.= "<br>";
}

echo '<div style="line-height: 8px;">'.$squereStar2.'</div>';


echo '<br>';
echo '<br>';

// 6.

// a. Stabdomas iskritus vienam H
$switch = true;
while($switch){
    $flip = rand(0,1);
    if($flip == 0){
        echo 'H';
        echo '<br>';
        $switch = false;
    }else{
        echo 'S';
        echo '<br>';
    }
}
echo '----------------------------------';
echo '<br>';

// b. Stabdomas iskritus trim H
$switch = true;
$counter = 0;
while($switch){
    $flip = rand(0,1);
    if($flip == 0){
        echo 'H';
        echo '<br>';
        $counter++;
        if($counter == 3){
            $switch = false;
        }
    }else{
        echo 'S';
        echo '<br>';
    }
}

echo '----------------------------------';
echo '<br>';

// c. Stabdomas iskritus trim H is eiles
$switch = true;
$counter = 0;
while($switch){
    $flip = rand(0,1);
    if($flip == 0){
        echo 'H';
        echo '<br>';
        $counter++;
        if($counter == 3){
            $switch = false;
        }
    }else{
        echo 'S';
        echo '<br>';
        $counter = 0;
    }
}
echo '<br>';
echo '<br>';

// 7.

$kazioTaskai = 0;
$petroTaskai = 0;

while($kazioTaskai < 222 && $petroTaskai < 222){
    $kazioRoll = rand(5, 25);
    $petroRoll = rand(10, 20);

    $kazioTaskai += $kazioRoll;
    $petroTaskai += $petroRoll;

    echo 'Petras isrollino '. $petroRoll. ' bendra jo suma: '. $petroTaskai. ' ';
    echo '.Kazys isrollino '. $kazioRoll. ' bendra jo suma: '. $kazioTaskai;
    echo '<br>';
}

if($kazioTaskai > $petroTaskai){
    echo 'Partiją laimėjo: Kazys';
}else{
    echo 'Partiją laimėjo: Petras';
}
echo '<br>';
echo '<br>';

// 8.

function diamond ($size){

    function colorfulStar(){
        $r = rand(0, 255);
        $g = rand(0, 255);
        $b  = rand(0, 255);
        $color = "rgb($r, $g, $b)";
        return  "<span style='color:$color;'>*</span>";
    }

    $diamond = "";
    if($size <=0){
        return "Negali buti toks mazas";
    }
    if($size%2 == 0){
        return "Kad sukurti romba reikia nelyginio zvaigzduciu kiekio";
    }

    $puseAukscio = ceil($size / 2);

    $nextLength = 1;

    for($i = 1; $i <= $puseAukscio; $i++){
        for($j=0; $j < $nextLength; $j++){
            if($i === $puseAukscio){
                $diamond .= colorfulStar();
            }elseif($j == 0){
                for($x = 0; $x < $puseAukscio - $i; $x++){
                    $diamond .= " ";
                }
                $diamond .=  colorfulStar();
            }else{
                $diamond .= colorfulStar();
            }
        }
        $diamond .= "<br>";
        $nextLength  += 2;
    }
    $nextLength -= 2;
    for($i = 1; $i <= $puseAukscio-1; $i++){

        for($j=0; $j < $nextLength - 2; $j++){
                if($j == 0){
                for($x = 0; $x < $i; $x++){
                    $diamond .= " ";
                }
                $diamond .=  colorfulStar();
            }else{
                $diamond .= colorfulStar();
            }
        }
        $diamond .= "<br>";
        $nextLength  -= 2;
    }
    return $diamond;
}

echo '<code style="line-height: 8px; white-space: pre;">'.diamond(21).'</code>';


echo '<br>';
echo '<br>';

// 9.
$timeStartDvigubos = microtime(true);
$timeEndDvigubos = 0;

for($i = 0; $i < 1000000; $i++){
    $c = "10 bezdzioniu suvalge 20 bananu.";
}
$timeEndDvigubos = microtime(true);

$timeStartviengubos = microtime(true);
$timeEndViengubos = 0;

for($i = 0; $i < 1000000; $i++){
    $c = '10 bezdzioniu suvalge 20 bananu.';
}
$timeEndViengubos = microtime(true);


$dvigubuLaikas = $timeEndDvigubos - $timeStartDvigubos;
$viengubosLaikas = $timeEndViengubos - $timeStartviengubos;

$skirtumas = $dvigubuLaikas - $viengubosLaikas;

echo "Dvigubu laikas: $dvigubuLaikas, viengubu laikas: $viengubosLaikas. Skirtumas: $skirtumas.";

echo '<br>';
echo '<br>';


// 10.

//  Kalam su mazais smugiais

$vieniesIlgis = 85;
$viniuIkalta = 0;
$silpniSmugiai = 0;

while($viniuIkalta < 5){
    $viniesGylis = 0;
    
    while($viniesGylis < $vieniesIlgis){
        $ikalimas = rand(5, 20);
        $silpniSmugiai++;
        $viniesGylis+=  $ikalimas;
    }

    $viniuIkalta++;
}

echo "Musant silpnai $viniuIkalta vinis ikalti reikejo  $silpniSmugiai smugiu";
echo '<br>';

//  Kalam su stipriais smugiais

$viniuIkalta = 0;
$stiprusSmugiai = 0;

while($viniuIkalta < 5){
    $viniesGylis = 0;
    
    while($viniesGylis < $vieniesIlgis){
        $ikalimas = rand(20, 30);
        $fail = rand(0,1);
            if($fail){
                $ikalimas = 0;
            }
        $stiprusSmugiai++;
        $viniesGylis+=  $ikalimas;
    }

    $viniuIkalta++;
}

echo "Musant stipriai $viniuIkalta vinis ikalti reikejo  $stiprusSmugiai smugiu";

echo '<br>';
echo '<br>';

// 11.

$numberArr = range(1, 200);

shuffle($numberArr);

$firstFifty = array_splice($numberArr, 0, 50);

$numberString = implode(" ", $firstFifty);

echo $numberString;
echo '<br>';

// -------------------------------------
function primeCheck($number){ 
    if ($number == 1){
        return false; 
    }
    for ($i = 2; $i <= $number/2; $i++){ 
        if ($number % $i == 0) 
            return false; 
    } 
    return true; 
} 
// -------------------------------------

foreach ($firstFifty as $key => &$val) {

    if(primeCheck($val)){
        // Darom nieko
    }else{
        unset($firstFifty[$key]);
    }
}

sort($firstFifty);

echo implode(" ", $firstFifty);



