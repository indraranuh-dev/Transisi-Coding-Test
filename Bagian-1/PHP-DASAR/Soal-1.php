<?php

    /**
     * Fungsi ini dijalankan menggunakan PHP debug pada code editor VSCode.
    **/

    ubah("72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86");

    function ubah($nilai){

        // Memisahkan whitespace menjadi array 
        $toArr  =   explode (" ",$nilai);

        // Memfilter array
        $toArr = array_filter($toArr);
        // Proses mencari rata rata
        $average = array_sum($toArr)/count($toArr);
        // Menampilkan hasil
        echo "Rata-ratanya : $average", PHP_EOL;

        // Mengurutkan array dari nilai terkecil ke yang terbesar
        asort($toArr);
        // Membalik urutan menjadi terbesar ke terkecil
        $toArr = array_reverse($toArr);
        // Mengambil 3 array teratas, mulai index 0 sampai 2
        $result = array_slice($toArr, 0, 3);
        // Menampilkan 3 array tertinggi
        echo "3 Nilai tertinggi : ", PHP_EOL;
        print_r($result);
        
        // Membalik urutan menjadi terkecil ke terbesar
        $toArr = array_reverse($toArr);
        // Mengambil 7 array teratas, mulai index 0 sampai 6
        $result = array_slice($toArr, 0, 7);
        // Menampilkan 7 array terndah
        echo "7 Nilai terendah : ", PHP_EOL;
        print_r($result);
        
    }