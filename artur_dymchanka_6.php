<?php
// 1.
echo '1 Uzduotis';
echo '<br>';

function number1 ($string){

    if(!is_string($string)){
        return 'Parameter is not a string';
    }

    return '<h1>'.$string.'</h1>';
}

echo number1("tekstas");
echo '<br>';
echo '<br>';


// 2.
echo '2 Uzduotis';
echo '<br>';


function number2 ($string, $tagNr){

    if(!is_string($string)){
        return 'Parameter is not a string';
    }
    if(!is_numeric($tagNr)){
        return "Tag number must be numeric";
    }

    return '<h'.$tagNr.'>'.$string.'</h'.$tagNr.'>';
}

echo number2("tekstas", 7);
echo '<br>';
echo '<br>';

// 3.
echo '3 Uzduotis';
echo '<br>';

$string =  md5(time());

echo '<br>';
echo $string;
echo '<br>';

function number3 ($string){

    $numberArray = preg_split("/[a-z]+/i", $string);

    $outputString = "";

    foreach($numberArray as $value){
        if(is_numeric($value)){

            $outputString .= $value. '<br>';

        }
    }

    return $outputString;
}

echo '<br>';
echo number1(number3($string));
echo '<br>';
echo '<br>';

// 4.
echo '4 Uzduotis';
echo '<br>';

function number4($number){
    if(!is_integer($number)){
        return 'Paduotas skaicius yra ne sveikas';
    }

    $counter = 0;

    for($i= 2; $i<$number; $i++){
        if($number != $i){
            if($number%$i == 0){
                $counter++;
            }
        }
    }
    return $counter;
}

echo "41 turi tiek dalikliu: ".number4(41);
echo '<br>';
echo '<br>';


// 5.
echo '5 Uzduotis';
echo '<br>';


$numArray = [];

for($i = 0; $i<100; $i++){
    array_push($numArray, rand(33, 77));
}

function bubleSortDivision($array){
    $swapped;
    do{
        $swapped = false;
        for($i = 0; $i < count($array) - 1; $i++){

            $firstElement = number4($array[$i]);
            $secondElement = number4($array[$i+1]);

            if($firstElement < $secondElement){
                $temp = $array[$i];
                $array[$i] = $array[$i + 1];
                $array[$i + 1] = $temp;
                $swapped = true;
            }
        }
    }while($swapped);
    return $array;
}

echo "Pries rusiavima:";
echo '<br>';
echo json_encode($numArray);
echo '<br>';
echo "Po rusiavima pagal dalikliu kieki:";
echo json_encode(bubleSortDivision($numArray));
echo '<br>';
echo '<br>';


// 6.
echo '6 Uzduotis';
echo '<br>';

$numArray6 = [];

for($i = 0; $i<100; $i++){
    array_push($numArray6, rand(333, 777));
}


echo "Masyvas is atsitiktiniu skaiciu:";
echo '<br>';
echo print_r($numArray6);
echo '<br>';

foreach($numArray6 as $key => &$number){
    if(number4($number) == 0){
        unset($numArray6[$key]);
    }
}

echo "Masyvas istrynus visu pirminius skaicius:";
echo '<br>';
print_r($numArray6);
echo '<br>';
echo '<br>';


// 7.
echo '7 Uzduotis';
echo '<br>';


$functionRepeatCount = rand(10, 30);

function generateArr($functionRepeatCount){

    static $callCount = 0;
    $callCount++;

    $array = [];

    $randomNumber = rand(10, 20);

    for($i = 0; $i < $randomNumber; $i++){

        if( ($i+1) == $randomNumber){

            if($callCount >= $functionRepeatCount){
                array_push($array, 0);
            }else{
                $newArr = generateArr($functionRepeatCount);
                array_push($array, $newArr);
            }

        }else{
            array_push($array, rand(0, 10));
        }
    }
    return  $array;
}

$generatedArr = generateArr($functionRepeatCount);


echo "Rekursijos gylis: $functionRepeatCount";
echo '<br>';
_dc($generatedArr);
echo '<br>';
echo '<br>';


// 8.
echo '8 Uzduotis';
echo '<br>';

function arrCount($arr){

    static $counter = 0;

    foreach($arr as $values){
        if(is_array($values)){

            $sumArr  = arrCount($values);

        }else{
            $counter++;
        }
    }

    return $counter;
}

echo "tiek reiksmiu turi masyvas: ".arrCount($generatedArr);
echo '<br>';echo '<br>';

// 9.
echo '9 Uzduotis';
echo '<br>';

$numArray2 = [];

for($i = 0; $i<3; $i++){
    array_push($numArray2, rand(1, 33));
}

function checkPrimes($numArray2){
    if(number4($numArray2[count($numArray2)-1]) != 0){
        return false;
    }
    if(number4($numArray2[count($numArray2)-2]) != 0){
        return false;
    }
    if(number4($numArray2[count($numArray2)-3]) != 0){
        return false;
    }
    return true;
}

while(!checkPrimes($numArray2)){
    array_push($numArray2, rand(1, 33));
}

echo '<br>';
_dc($numArray2);
echo '<br>';echo '<br>';

// 10.
echo '10 Uzduotis';
echo '<br>';

$Arr10 = [];

for($i = 0; $i<10; $i++){
    for($j = 0; $j<10; $j++){
        $Arr10[$i][$j] = rand(1, 100);
    }
}

function primeAverage ($Arr10){
    $primeSum = 0;
    $primeCount = 0;

    foreach($Arr10 as $arr){
        foreach($arr as $number){
            if(number4($number) == 0){
                $primeSum += $number;
                $primeCount++;
            }
        }
    }
    return $primeSum / $primeCount;
}

function findLowNumber($Arr10){
    $lowestNumber = 999;

    foreach($Arr10 as &$arr){
        foreach($arr as &$number){
            if($number < $lowestNumber){
                $lowestNumber = $number;
            }
        }
    }
    return $lowestNumber;
}

$sumCounter = 0;

while(primeAverage($Arr10) < 70){
    $sumCounter++;
    $lowNumber = findLowNumber($Arr10);

    foreach($Arr10 as $key => &$arr){
        foreach($arr as $key2 => &$number){

            if($lowNumber == $number){
                $number += 3;
                break;
            }

        }
    }
}

echo '<br>';
echo 'Po tiek kartu +3: '.$sumCounter.' .Pirminiu skaiciu vidurkis yra: '.primeAverage($Arr10);
echo '<br>';echo '<br>';



// 11.
echo '11 Uzduotis';
echo '<br>';


function generateSmaller(){
    static $rec = 0;
    $rec++;

    $arrayLength = rand(1, 5);

    $taskArray = [];

    $probability = rand(70, 100)/100;
    $numbers = round($arrayLength *  $probability);
    $arrays = $arrayLength - $numbers;

    for($j=0; $j< $numbers; $j++){
        array_push( $taskArray, rand(0, 100) );
    }

    if($rec < 100){
        for($j=0; $j< $arrays; $j++){
            $newArray = generateSmaller();
            array_push( $taskArray, $newArray );
        }
    }

    return $taskArray;
}



function generateArray(){

    $arrayLength = rand(10, 100);

    $taskArray = [];

    $probability = rand(70, 100)/100;
    $numbers = round($arrayLength *  $probability);
    $arrays = $arrayLength - $numbers;

    for($j=0; $j< $numbers; $j++){
        array_push( $taskArray, rand(0, 100) );
    }

    for($j=0; $j< $arrays; $j++){
        $newArray = generateSmaller();
        array_push( $taskArray, $newArray );
    }


    return $taskArray;
}

$awsomeArrey = generateArray();

function arrCount2($arr){

    static $counter = 0;

    foreach($arr as $values){
        if(is_array($values)){

            $sumArr  = arrCount2($values);
            $counter++;

        }else{
            $counter++;
        }
    }

    return $counter;
}

function arrCountSum($arr){

    static $counterSum = 0;

    foreach($arr as $values){
        if(is_array($values)){

            $sumArr  = arrCountSum($values);

        }else{
            $counterSum+=$values;
        }
    }

    return $counterSum;
}

function arrayDepth($array) {
    $maxDepth = 1;

    foreach ($array as $value) {
        if (is_array($value)) {
            $depth = arrayDepth($value) + 1;

            if ($depth > $maxDepth) {
                $maxDepth = $depth;
            }
        }
    }

    return $maxDepth;
}

function colors(){
    $r = rand(0, 255);
    $g = rand(0, 255);
    $b  = rand(0, 255);
    return  "rgb($r, $g, $b)";
}

function makeDiv($arr){
    static $id = 0;
    $nr = $id;
    $id++;
    $string = '';
   
    foreach($arr as $key => $values){
        if(is_array($values)){

            $string .= makeDiv($values);

        }else{

            if($key == 0){
                $string .= $values. ', ';
            }else{

                $string .= $values. ', ';
            }

        }
    }

    $randomHex = '#'.rand(0x00000, 0xFFfff);

    return "<div id=\"M$nr\" style=\"background-color:".colors()."\">->[$nr] $string</div>";
}

echo '<br>';
echo 'Stai tiek yra tenai verciu iskaitant masyvus: '.arrCount2($awsomeArrey);
echo '<br>';
echo 'Stai tokia visu skaiciu suma: '.arrCountSum($awsomeArrey);
echo '<br>';
echo 'Giliausiai gavosi nueiti iki tokio lygio: '.arrayDepth($awsomeArrey);
echo '<br>';
echo '<br>';
_dc($awsomeArrey);
echo '<br>';
echo 'Div: ';
echo '<br>';
echo makeDiv($awsomeArrey);