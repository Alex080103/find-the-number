<?php 

$number = 2;

$number2 = 5;

function AddTwoNumbers (int $numberOne, int $numberToAdd) :int 
{
    return $numberOne + $numberToAdd;
};

$result = AddTwoNumbers($number, $number2);
// echo($result);

echo('<br>');


function IsDivisableByTwo (int $number) :bool
{
    $numberDivisedByTwo = $number / 2;
    $boolean = is_int($numberDivisedByTwo);
    return $boolean;
    // if ($boolean == true) {
    //     echo "ce nombre est divisable par 2";
    // } else {
    //     echo "ce nombre n'est pas divisable par 2";
    // };
}

// if (IsDivisableByTwo(5) == true) {
//     echo "ce nombre est divisable par 2";
//     } else {
//         echo "ce nombre n'est pas divisable par 2";
//     };


if (IsDivisableByTwo(4) == true) {
    $resultAdd = AddTwoNumbers(5, 6);
    echo($resultAdd);
}