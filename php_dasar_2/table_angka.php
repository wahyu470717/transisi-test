<?php
function tampilkanTabel()
{
 $angka = 1;
 echo "<table border='1' cellpadding='5' cellspacing='0'>";

 // Buat 8 baris
 for ($i = 1; $i <= 8; $i++) {
  echo "<tr>";

  // Buat 8 kolom dalam setiap baris
  for ($j = 1; $j <= 8; $j++) {

   $kolomKe = ($i - 1) * 8 + $j; // Hitung nomor kolom berdasarkan baris dan kolom

   // Menentukan apakah kolom ini harus diwarnai hitam
   if (in_array($kolomKe, [1, 2, 5, 7, 10, 11, 13, 14, 17, 19, 22, 23, 25, 26, 29, 31, 34, 35, 37, 38, 41, 43, 46, 47, 49, 50, 53, 55, 58, 59, 61, 62])) {

    echo "<td style='background-color: black; color: white;'>$angka</td>";
   } else {
    echo "<td>$angka</td>";
   }
   $angka++;
  }

  echo "</tr>";
 }

 echo "</table>";
}

tampilkanTabel();

?>