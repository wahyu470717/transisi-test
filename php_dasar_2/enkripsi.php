<?php 
function enkripsi($input) {
 $output = "";
 $shift = 1;
 $isPositive = true;

 // Loop untuk setiap karakter di dalam input
 foreach (str_split($input) as $char) {
     $ascii = ord($char);
     
     if ($isPositive) {
         $ascii += $shift;
     } else {
         $ascii -= $shift;
     }

     $shift++;
     $isPositive = !$isPositive;

     $output .= chr($ascii);
 }

 return $output;
}

$input = "DFHKNQ";
echo enkripsi($input);  // Output: EDKGSK

?>