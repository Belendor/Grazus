<?php
// 1.
$firstActor = 'Bob Thornton';
$secondActor = 'Danny Masterson';

if(strlen($firstActor) > strlen($firstActor)){
    echo $firstActor;
}else{
    echo $secondActor;
}
echo '<br>';
echo '<br>';

// 2.
$actorName = 'Billy';
$actorSurename = 'Thornton';

$nameLower = strtolower($actorName);
$surenameUpper = strtoupper($actorSurename);

echo "$nameLower $surenameUpper";

echo '<br>';
echo '<br>';

// 3.

$actorInitials = $actorName[0] . $surenameUpper[0];

echo $actorInitials;

echo '<br>';
echo '<br>';

// 4.

$nameLastThree = '';
$surenameLastThree = '';

if(strlen($actorName)<=3){
    $nameLastThree = $actorName;
}else{
    $nameLastThree = substr($actorName, strlen($actorName)-3, 3);
}

if(strlen($actorSurename)<=3){
    $surenameLastThree = $actorSurename;
}else{
    $surenameLastThree = substr($actorSurename, strlen($actorSurename)-3, 3);
}

$actorLastThree = $nameLastThree . $surenameLastThree;
echo $actorLastThree;

echo '<br>';
echo '<br>';

// 5.

$string = 'An American in Paris';
$newStringLower = str_replace('a', '*',$string);
$newStringFull = str_replace('A', '*',$newStringLower);

echo $newStringFull;

echo '<br>';
echo '<br>';

// 6.

$aCounter = 0;

$aCounter += substr_count($string, 'a');
$aCounter += substr_count($string, 'A');

echo $aCounter;

echo '<br>';
echo '<br>';

// 7.

$string1 = "Breakfast at Tiffany's";
$string2 = '2001: A Space Odyssey';
$string3 = "It's a Wonderful Life";
$pattern = '/[aeiouy]/i';

$result = preg_replace($pattern, '', $string);
$result1 = preg_replace($pattern, '', $string1);
$result2 = preg_replace($pattern, '', $string2);
$result3 = preg_replace($pattern, '', $string3);

echo $result;
echo '<br>';
echo $result1;
echo '<br>';
echo $result2;
echo '<br>';
echo $result3;

echo '<br>';
echo '<br>';

// 8.

$generatedString = 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope';
echo $generatedString;
echo '<br>';

$numberPattern = '/\D/';

$numberFound = preg_replace($numberPattern , '', $generatedString);
echo $numberFound;

echo '<br>';
echo '<br>';

// 9.

$text = "Don't Be a Menace to South Central While Drinking Your Juice in the Hood";
$text2 = 'Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale';

echo $text;
echo '<br>';

$toArray =  explode(" ", $text);
$shortWordCounter = 0;

foreach ($toArray as $key) {
    if(strlen($key) <=5){
        $shortWordCounter++;
    }
}

$toArray2 =  explode(" ", $text2);
$shortWordCounter2 = 0;

foreach ($toArray2 as $key) {
    if(mb_strlen($key, 'utf8') <=5){
        $shortWordCounter2++;
    }
}

echo $shortWordCounter;
echo '<br>';
echo $text2;
echo '<br>';
echo $shortWordCounter2;

echo '<br>';
echo '<br>';

// 10.

$randomCharNumber1 = rand(97, 122);
$randomCharNumber2 = rand(97, 122);
$randomCharNumber3 = rand(97, 122);

echo chr($randomCharNumber1).chr($randomCharNumber2).chr($randomCharNumber3);

echo '<br>';
echo '<br>';

// 11.

$wordDump = array_merge($toArray2, $toArray);

$randomWords = [];

echo print_r($wordDump);
echo '<br>';

while(count($randomWords) < 10){
    $randomWord = rand(0, count($wordDump)-1);
    array_push($randomWords,$wordDump[$randomWord]);
    array_splice($wordDump, $randomWord, 1);
}

echo print_r($randomWords);

// Reiketu parasyti validacija kad nebutu po zodziu kablelio ir kad filtruotu identiskus zodzius kurie galejo buti panaudoti sakinyje ne viena karta.
