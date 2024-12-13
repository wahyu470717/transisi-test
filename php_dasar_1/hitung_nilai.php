<?php

function konversiNilai($nilai)
{
 $array_nilai = explode(" ", $nilai);
 return array_map('intval', $array_nilai);
}

function hitungRataRata($array_nilai)
{
 return array_sum($array_nilai) / count($array_nilai);
}

function cariNilaiTertinggi($array_nilai, $jumlah = 7)
{
 $tertinggi = $array_nilai;
 rsort($tertinggi);
 return array_slice($tertinggi, 0, $jumlah);
}

function cariNilaiTerendah($array_nilai, $jumlah = 7)
{
 $terendah = $array_nilai;
 sort($terendah);
 return array_slice($terendah, 0, $jumlah);
}

// input nilai
$nilai = "72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86";

// Konversi nilai menjadi array
$array_nilai = konversiNilai($nilai);

// Proses perhitungan
$rata_rata = hitungRataRata($array_nilai);
$tujuh_tertinggi = cariNilaiTertinggi($array_nilai);
$tujuh_terendah = cariNilaiTerendah($array_nilai);


// echo "7 Nilai Tertinggi: ";
// print_r($tujuh_tertinggi);

// echo "7 Nilai Terendah: ";
// print_r($tujuh_terendah);

// Tampilkan Hasil
echo "Rata-rata Nilai: " . number_format($rata_rata, 2) . "\n";

echo "7 Nilai Tertinggi:\n" . implode(",", $tujuh_tertinggi) . "\n";

echo "7 Nilai Terendah:\n" . implode(",", $tujuh_terendah) . "\n";

?>