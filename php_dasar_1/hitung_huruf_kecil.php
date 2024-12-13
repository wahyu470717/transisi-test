<?php

function hitungHururfKecil($input)
{
 preg_match_all('/[a-z]/', $input, $matches);
 $jumlahHurufKecil = count($matches[0]);
 return "\"$input\" mengandung $jumlahHurufKecil buah huruf kecil.";
}
// input nilai
$input = "TranSISI";
$output = hitungHururfKecil($input);
echo ($output);

?>