<?php
// 1.
echo '1 Uzduotis';
echo '<br>';

$doubleArray = [];

for($i = 0; $i< 10; $i++){
    $doubleArray[$i] = [];
    for($j = 0; $j< 5; $j++){
        $randomNumber = rand(5, 25);
        array_push($doubleArray[$i], $randomNumber);
    }
}


echo json_encode($doubleArray);
echo '<br>';
echo '<br>';

// 2.
echo '2 Uzduotis';
echo '<br>';

$biggerThanTen = 0;
$largestNumber = 0;
$index0Summ = 0;
$index1Summ = 0;
$index2Summ = 0;
$index3Summ = 0;
$index4Summ = 0;

for($i = 0; $i< 10; $i++){
    for($j = 0; $j< 5; $j++){
        if($doubleArray[$i][$j] > 10){
            $biggerThanTen++;
        }
        if($doubleArray[$i][$j] > $largestNumber){
            $largestNumber = $doubleArray[$i][$j];
        }

        if($j === 0){
            $index0Summ += $doubleArray[$i][$j];
        }elseif($j === 1){
            $index1Summ += $doubleArray[$i][$j];
        }elseif($j === 2){
            $index2Summ += $doubleArray[$i][$j];
        }elseif($j === 3){
            $index3Summ += $doubleArray[$i][$j];
        }elseif($j === 4){
            $index4Summ += $doubleArray[$i][$j];
        }
    }
}

echo "Didesniu nei 10 masyve yra: $biggerThanTen";
echo '<br>';
echo "Didziausias skaicius yra: $largestNumber";
echo '<br>';

echo "Suma. Index 0: $index0Summ, Index 1: $index1Summ, Index 2: $index2Summ, Index 3: $index3Summ, Index 4: $index4Summ.";
echo '<br>';

for($i = 0; $i< 10; $i++){
    for($j = 0; $j< 2; $j++){
        $randomNumber = rand(5, 25);
        array_push($doubleArray[$i], $randomNumber);
    }
}

echo "Prailginti iki 7:";
echo '<br>';
echo json_encode($doubleArray);
echo '<br>';

$innerSummArray = [];

for($i = 0; $i< 10; $i++){
    $accumulator = 0;

    for($j = 0; $j< 7; $j++){
        $accumulator += $doubleArray[$i][$j];
    }
    array_push($innerSummArray, $accumulator);
}

echo "Antro lygio masyvu sumos: ";
echo '<br>';
echo json_encode($innerSummArray);
echo '<br>';
echo '<br>';

// 3.
echo '3 Uzduotis';
echo '<br>';

$wordArray = [];


for($i = 0; $i< 10; $i++){

    $elements = rand(2, 20);

    $wordArray[$i] = [];

    for($j = 0; $j< $elements; $j++){
        $randomWordArray = range("A", "Z");
        shuffle($randomWordArray);
        array_push($wordArray[$i], $randomWordArray[0]);
    }
}

echo "Masyvas su random raidem: ";
echo '<br>';
echo json_encode($wordArray);
echo '<br>';

for($i = 0; $i< 10; $i++){
    for($j = 0; $j< count($wordArray[$i]); $j++){
        sort($wordArray[$i]);
    }
}
echo "Masyvas su random raidem (Surusiuotas): ";
echo '<br>';
echo json_encode($wordArray);
echo '<br>';
echo '<br>';

// 4.
echo '4 Uzduotis';
echo '<br>';

$arreyLengthSort = [];

function bubleSortCount($array){
    $swapped;
    do{
        $swapped = false;
        for($i = 0; $i < count($array) - 1; $i++){

            //------------------------------------------
            // Irasyti kokias arejaus reiksmes lyginti
            //------------------------------------------

            $firstElementLength = count($array[$i]);
            $secondElementLength = count($array[$i+1]);
            // -----------------------------------------


            if($firstElementLength > $secondElementLength){ // '>' Didejimo tvarka, '<' Mazejimo tvarka.
                $temp = $array[$i];
                $array[$i] = $array[$i + 1];
                $array[$i + 1] = $temp;
                $swapped = true;
            }
        }
    }while($swapped);
    return $array;
}


echo "Surusiuotas pagal count ilgi: ";
echo '<br>';
echo json_encode(bubleSortCount($wordArray));
echo '<br>';
echo '<br>';


// 5.
echo '5 Uzduotis';
echo '<br>';

$userArray = [];

for($i = 0; $i < 30; $i++){
   $userId = rand(1, 1000000);
   $placeInRow = rand(0, 100);
   $userArray[$i] = [
                    "user_id" => $userId, 
                    "place_in_row" => $placeInRow
                    ];
}

echo '<br>';
echo json_encode($userArray);
echo '<br>';
echo '<br>';

// 6.
echo '6 Uzduotis';
echo '<br>';

function bubleSortKeys($array){
    $swapped;
    do{
        $swapped = false;
        for($i = 0; $i < count($array) - 1; $i++){

            $firstElementKey = $array[$i]['user_id'];
            $secondElementKey = $array[$i+1]['user_id'];

            if($firstElementKey > $secondElementKey){
                $temp = $array[$i];
                $array[$i] = $array[$i + 1];
                $array[$i + 1] = $temp;
                $swapped = true;
            }
        }
    }while($swapped);
    return $array;
}
echo "ID didejimo tvarka: ";
echo '<br>';
echo json_encode(bubleSortKeys($userArray));
echo '<br>';

function bubleSortKeysReverse($array){
    $swapped;
    do{
        $swapped = false;
        for($i = 0; $i < count($array) - 1; $i++){

            $firstElementKey = $array[$i]['place_in_row'];
            $secondElementKey = $array[$i+1]['place_in_row'];

            if($firstElementKey < $secondElementKey){
                $temp = $array[$i];
                $array[$i] = $array[$i + 1];
                $array[$i + 1] = $temp;
                $swapped = true;
            }
        }
    }while($swapped);
    return $array;
}
echo "Vietos eileje mazejimo tvarka: ";
echo '<br>';
echo json_encode(bubleSortKeysReverse($userArray));
echo '<br>';
echo '<br>';

// 7.
echo '7 Uzduotis';
echo '<br>';

function generateName($from, $to){
    $length = rand($from, $to);
    $name = '';
    for($i = 0; $i < $length; $i++){
        if($i === 0){
            $randomWord = range('A', 'Z');
            shuffle($randomWord);
            $name .= $randomWord[0];
        }else{
            $randomWord = range('a', 'z');
            shuffle($randomWord);
            $name .= $randomWord[0];
        }
    }
    return $name;
}


foreach($userArray as $key => &$value){


    $value['name'] = generateName(5, 15);
    $value['surename'] = generateName(5, 15);

}

echo "Pridetas surename ir name: ";
echo '<br>';
echo json_encode($userArray);
echo '<br>';
echo '<br>';


// 8.
echo '8 Uzduotis';
echo '<br>';

$array8 = [];

for($i = 0; $i < 10; $i++){
    $randomNr = rand(0,5);
    $newArray = [];
    if($randomNr > 0){
        for($j = 0; $j <$randomNr; $j++){
            $raandomNumber = rand(0,10);
            array_push($newArray, $raandomNumber);
        }
        array_push($array8, $newArray);
    }else{
        $array8[$i] = $i;
    }   
}

echo json_encode($array8);
echo '<br>';
echo '<br>';

// 9.
echo '9 Uzduotis';
echo '<br>';

$valueSumm = 0;

foreach($array8 as $key => $value){
    if(is_integer($value)){
        $valueSumm += $value;
    }else{
        foreach($value as $key => $prop){
            $valueSumm += $prop;
        }
    } 
}

echo "Bendra masyvo skaiciu suma: $valueSumm";
echo '<br>';

function bubleSortDefault($array){
    $swapped;
    do{
        $swapped = false;
        for($i = 0; $i < count($array) - 1; $i++){

            $firstElement = 0;
            $secondElement = 0;

            if(is_integer($array[$i])){
                $firstElement = $array[$i];
            }else{
                foreach($array[$i] as $key => $value){
                    $firstElement += $value;
                }
            }

            if(is_integer($array[$i + 1])){
                $secondElement = $array[$i + 1];
            }else{
                foreach($array[$i + 1] as $key => $value){
                    $secondElement += $value;
                }
            }

            if($firstElement > $secondElement){
                $temp = $array[$i];
                $array[$i] = $array[$i + 1];
                $array[$i + 1] = $temp;
                $swapped = true;
            }
        }
    }while($swapped);
    return $array;
}

echo json_encode(bubleSortDefault($array8));
echo '<br>';
echo '<br>';

// 10.
echo '10 Uzduotis';
echo '<br>';

$array10 = [];
$square = '';

for($i = 0; $i< 10; $i++){
    for($j = 0; $j< 10; $j++){
        $symbols = ['#' ,'%' ,'+' ,'*' ,'@' , '%'];
        shuffle($symbols);
        $randomSymbol = $symbols[0];
        $randomHex = '#'.rand(0x00000, 0xFFFFF);

        $array10[$i][$j] = [
            "value" => $randomSymbol, 
            "color" => $randomHex
            ];
        
        $square .= "<span style='color:$randomHex;'>$randomSymbol</span>";
    }
    $square .= '<br>';
}

echo json_encode($array10);
echo '<br>';
echo '<br>';
echo '<br>';
echo '<code style="line-height: 11px; letter-spacing: 3px">' .$square. '</code>';
echo '<br>';
echo '<br>';

// 11.
echo '11 Uzduotis';
echo '<br>';

do {
    $a = rand(0, 1000);
    $b = rand(0, 1000);
} while ($a == $b);

$long = rand(1,5);


echo '<h3>Skaičiai '.$a.' ir '.$b.'</h3>';


$c = [];
for ($i=0; $i<$long; $i++) {
    $c[] = array_rand(array_flip([$a, $b]));
}


echo '<h4>Masyvas:</h4>';
echo '<pre>';
print_r($c);
echo '</pre>';


$bendraSuma = array_sum($c);
echo '<br>';
echo 'Arejaus bendra suma: '.$bendraSuma;
echo '<br>';
$aPilnas = $a * $long;
echo '<br>';
echo 'Jei sarase butu vien pirmi skaiciai: '.$aPilnas;
echo '<br>';
$aPilnasDivision = $aPilnas / $bendraSuma;
echo '<br>';
echo 'Sio skaiciaus dalyba is esamos bendros sumos: '.$aPilnasDivision;
echo '<br>';
$aPilnasMinus = $a *( $long-1) + $b;
echo '<br>';
echo 'Jei sarasas turetu visus pirmus ir viena antra skaiciu suma: '.$aPilnasMinus;
echo '<br>';
$aPilnasMinusDivision =  $aPilnasMinus / $bendraSuma;
echo '<br>';
echo 'Sio skaiciaus dalyba is esamos bendros sumos: '.$aPilnasMinusDivision;
echo '<br>';
$divisionSkirtumas = $aPilnasDivision  - $aPilnasMinusDivision;
echo '<br>';
echo 'Skirtumas tarp dalybu: '.$divisionSkirtumas;
echo '<br>';
$findingNumber = ($aPilnasDivision - 1) / $divisionSkirtumas;
echo '<br>';
echo 'Pirma dalyba - 1 padalinta is dalybu skirtumo duoda antro skaiciaus pasikartojima: '.$findingNumber;
echo '<br>';
$other = $long - $findingNumber;

echo '<h3>Skaičius '. $a .' yra pakartotas '.$other.' kartų, o skaičius '. $b .' - '.$findingNumber.' kartų.</h3>';

_dc($c );