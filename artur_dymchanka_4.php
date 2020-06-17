<?php
// 1.
echo '1 Uzduotis';
echo '<br>';

$randomNumberArray = [];
for($i = 0; $i <30; $i++){
    array_push($randomNumberArray, rand(5, 25));
}

print_r($randomNumberArray);
echo '<br>';
echo '<br>';

// 2.
echo '2 Uzduotis';
echo '<br>';

$biggerThanTen = 0;
$biggest = 0;
$summ = 0;
$numberMinusIndex = [];


foreach($randomNumberArray as $key => $number){
    if($number > 10){
        $biggerThanTen++;   
    }
    if($number > $biggest){
        $biggest = $number;
    }
    $summ += $number;
    array_push($numberMinusIndex, $number - $key);
}

echo "Daugiau nei 10 rasta: $biggerThanTen. Didziausias skaicius: $biggest. Visu skaiciu suma $summ. Masyvas su skaiciais atemus index: ";
echo '<br>';
print_r($numberMinusIndex);
echo '<br>';

for($i = 0; $i <10; $i++){
    array_push($randomNumberArray, rand(5, 25));
}
echo "Padidintas masyvas: ";
echo '<br>';
print_r($randomNumberArray);
echo '<br>';

$evenArray = [];
$oddArray = [];
$indexOfBiggerThanTen = 0;
$indexFound = false;

foreach($randomNumberArray as $key => $number){
    if($key%2 === 0){
        $evenArray[$key] = $number;
    }else{
        $oddArray[$key] = $number;
    }
    if(!$indexFound && $number > 10){
        $indexFound= true;
        $indexOfBiggerThanTen = $key;
    }
    if($key%2 == 0){
        unset($randomNumberArray[$key]);
    }
}

echo "Masyvas is poriniu reiksmiu:";
echo '<br>';
print_r($evenArray);
echo '<br>';
echo "Masyvas is neporiniu reiksmiu:";
echo '<br>';
print_r($oddArray);
echo '<br>';

foreach($evenArray as $key => &$number){
    if($number > 15){
        $number = 0;
    }
}

echo "Is porinio masyvo verciam didesnius nei 15 i 0: ";
echo '<br>';
print_r($evenArray);
echo '<br>';
echo "Pirmas index kurio verte yra didesne uz 10: $indexOfBiggerThanTen";
echo '<br>';

echo "Masyvas istrinus visus porinius index";
echo '<br>';
print_r($randomNumberArray);
echo '<br>';
echo '<br>';
// 3.
echo '3 Uzduotis';
echo '<br>';

$charArray = [];
$aCount = 0;
$bCount = 0;
$cCount = 0;
$dCount = 0;

for($i = 0; $i <200; $i++){
    $randomNumber = rand(1,4);
    if($randomNumber == 1){
        array_push($charArray, 'A');
        $aCount++;
    }elseif($randomNumber == 2){
        array_push($charArray, 'B');
        $bCount++;
    }elseif($randomNumber == 3){
        array_push($charArray, 'C');
        $cCount++;
    }else{
        array_push($charArray, 'D');
        $dCount++;
    }
}

echo "ABCD masyvas: ";
echo '<br>';
print_r($charArray);
echo '<br>';
echo "A raidziu: $aCount, B raidziu: $bCount, C raidziu: $cCount, D raidziu: $dCount.";
echo '<br>';
echo '<br>';

// 4.
echo '4 Uzduotis';
echo '<br>';

sort($charArray);
echo "ABCD masyvas surusiuotas: ";
echo '<br>';
print_r($charArray);
echo '<br>';
echo '<br>';

// 5.
echo '5 Uzduotis';
echo '<br>';

$charArray1 = [];
$charArray2 = [];
$charArray3 = [];

// Generuojam 3 Masyvus

for($i = 0; $i <200; $i++){
    for($j = 0; $j <3; $j++){
        $randomNumber = rand(1,4);
        $arreyToPush;
        if($j === 0){
            $arreyToPush = &$charArray1;
        }elseif($j === 1){
            $arreyToPush = &$charArray2;
        }else{
            $arreyToPush = &$charArray3;
        }

        if($randomNumber == 1){
            array_push($arreyToPush, 'A');
        }elseif($randomNumber == 2){
            array_push($arreyToPush, 'B');
        }elseif($randomNumber == 3){
            array_push($arreyToPush, 'C');
        }else{
            array_push($arreyToPush, 'D');
        }
    }
}

// Sudedam 3 masyvus i viena ir sudedam reiksmes

$joinedArray = [];
$uniqueCombinations = 0;

foreach($charArray1 as $key => $value){
    $newValue = $charArray1[$key].$charArray2[$key].$charArray3[$key];
    
    if(in_array($newValue, $joinedArray)){
        //Darom nieko.
    }else{
        $uniqueCombinations++;
    }

    $joinedArray[$key] = $newValue;
}
echo "Sujungtas masyvas: ";
echo '<br>';
print_r($joinedArray);
echo '<br>';
echo "Unikaliu reiksmiu rasta: $uniqueCombinations";
echo '<br>';
echo '<br>';

// 6.
echo '6 Uzduotis';
echo '<br>';

$numberArray1 = [];
$numberArray2 = [];

for($i = 0; $i <100; $i++){
    for($j = 0; $j <2; $j++){
        $randomNumber = rand(100, 999);

        $arreyToPush;

        if($j === 0){
            $arreyToPush = &$numberArray1;
        }else{
            $arreyToPush = &$numberArray2;
        }

        if(in_array($randomNumber, $arreyToPush)){
            $j--;
        }else{
            array_push($arreyToPush, $randomNumber);
        }
    }
}

echo "Unikalus skaiciu masyvas 1 : ";
echo '<br>';
print_r($numberArray1);
echo '<br>';
echo "Unikalus skaiciu masyvas 2 : ";
echo '<br>';
print_r($numberArray2);
echo '<br>';
echo '<br>';

// 7.
echo '7 Uzduotis';
echo '<br>';

$uniqueArrayValues = [];

foreach($numberArray1 as $key => $value){
   if(in_array($value, $numberArray2)){
    //  Darom nieko
   }else{
    array_push($uniqueArrayValues, $value);
   }
}

echo "Skaiciai kurie yra tik pirmame masyve: ";
echo '<br>';
print_r($uniqueArrayValues);
echo '<br>';
echo '<br>';
// 8.
echo '8 Uzduotis';
echo '<br>';

$sameArrayValues = [];

foreach($numberArray1 as $key => $value){
   if(in_array($value, $numberArray2)){
    array_push($sameArrayValues, $value);
   }else{
    //  Darom nieko
   }
}


echo "Skaiciai kurie yra abiejuose masyvuose: ";
echo '<br>';
print_r($sameArrayValues);
echo '<br>';
echo '<br>';

// 9.
echo '9 Uzduotis';
echo '<br>';

$indexSwap = [];

foreach($numberArray1 as $key => $value){
    $indexSwap[$value] = $numberArray2[$key];
}

echo "Index => Pirmo value. Value => antro value: ";
echo '<br>';
print_r($indexSwap);
echo '<br>';
echo '<br>';

// 10.
echo '10 Uzduotis';
echo '<br>';

function generateArray ($size){
    if($size < 3){
        return 'Number must be greater than 3';
    }

    $generatedArray = [];

    $firstNumber = rand(5,25);
    $secondNumber = rand(5,25);
    array_push($generatedArray, $firstNumber, $secondNumber);
    array_push($generatedArray, $firstNumber + $secondNumber);

    for($i = 2 ; $i < $size-1; $i++){
        $nextNumber = $generatedArray[count($generatedArray) -2] + $generatedArray[count($generatedArray) -1];
        array_push($generatedArray, $nextNumber);
    }

    return $generatedArray;
}

print_r(generateArray(10));
echo '<br>';
echo '<br>';

// 11.
echo '11 Uzduotis';
echo '<br>';

$taskFinished = false;

while(!$taskFinished){

    $randomArray = [];
    $resultArray = [];
    $firstSideSumm = 0;
    $secondSideSumm = 0;
    $firstSideCounter = 0;
    $secondSideCounter = 0;
    $centerValue = 0;
    
    for($i = 0; $i < 101; $i++){
        $randomNumber = rand(0,300);
    
        if(in_array($randomNumber, $randomArray)){
            $i--;
        }else{
            array_push($randomArray, $randomNumber);
        }
    
    }
    rsort($randomArray);
    
    $firstSwitch = false;
    $sideSwitch = false;
    
    foreach($randomArray as $key => $number){
        if(!$firstSwitch){
            $centerValue = $number;
            array_push($resultArray, $number);
            $firstSwitch = true;
        }elseif(!$sideSwitch){
    
            if($firstSideSumm > $secondSideSumm && $secondSideCounter < 50){
                array_push($resultArray, $number);
                $secondSideSumm += $number;
                $sideSwitch = false;
                $secondSideCounter++;
            }else{
                array_unshift($resultArray, $number);
                $sideSwitch = true;
                $firstSideSumm += $number;
                $firstSideCounter++;
            }
    
        }else{
    
            if($firstSideSumm < $secondSideSumm && $firstSideCounter < 50){
                array_unshift($resultArray, $number);
                $sideSwitch = true;
                $firstSideSumm += $number;
                $firstSideCounter++;
            }else{
                array_push($resultArray, $number);
                $secondSideSumm += $number;
                $secondSideCounter++;
                $sideSwitch = false;
            }
        }
    }

    if(abs($firstSideSumm - $secondSideSumm) < 30){
        $taskFinished = true;
    }
    
    print_r($resultArray);
    echo '<br>';
    echo "Pirmos Puses suma: $firstSideSumm";
    echo '<br>';
    echo "Antros puses suma: $secondSideSumm";
    echo '<br>';
    echo "Didziausias Skaicius: $centerValue";
    echo '<br>';
    echo "I pirma puse deta tiek kartu: $firstSideCounter";
    echo '<br>';
    echo "I antra puse deta tiek kartu: $secondSideCounter";
    echo '<br>';
}