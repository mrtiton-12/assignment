<?php

$strings = ["Hello","World","Php","Programming"];

function countVowels($string)
{
    $vowels = ['a','e','i','o','u','A','E','I','O','U'];
    $count = 0;
    for ($i=0;$i<strlen($string);$i++ ) { 
        if(in_array($string[$i],$vowels))
        {
            $count++;
        }
    }
    return $count;
}

foreach($strings as $string)
{
    $vowelCount = countVowels($string);
    $reversestring = strrev($string);

    echo "Orinal string: $string, vowel count: $vowelCount, reverse: $reversestring,\n";
}


?>