<?php

function generateGrams($input)
{
 $input = strtolower(trim($input));
 $input = preg_replace('/[^\w\s]/', '', $input);

 $words = explode(' ', $input);


 $unigrams = [];
 $bigrams = [];
 $trigrams = [];

 // Generate Unigram
 $unigrams = $words;

 // Generate Bigram
 for ($i = 0; $i < count($words) - 1; $i++) {
  $bigrams[] = $words[$i] . ' ' . $words[$i + 1];
 }

 // Generate Trigram
 for ($i = 0; $i < count($words) - 2; $i++) {
  $trigrams[] = $words[$i] . ' ' . $words[$i + 1] . ' ' . $words[$i + 2];
 }

 // Format output
 $output = [
  'Unigram' => implode(', ', $unigrams),
  'Bigram' => implode(', ', $bigrams),
  'Trigram' => implode(', ', $trigrams)
 ];

 return $output;
}


$input = "Jakarta adalah ibukota negara Republik Indonesia";
$output = generateGrams($input);

// hasil output
echo "Unigram : " . $output['Unigram'] . "\n";
echo "Bigram : " . $output['Bigram'] . "\n";
echo "Trigram : " . $output['Trigram'] . "\n";

?>