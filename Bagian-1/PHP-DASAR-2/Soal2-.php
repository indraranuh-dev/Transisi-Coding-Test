<?php

    /**
     * Fungsi ini dijalankan menggunakan PHP debug pada code editor VSCode.
    **/

    // EDK GSK

    enkripsi('DFHKNQ');

    function enkripsi($text){
        // Mengubah string menjadi array
        $split = str_split($text);
        // Membuat array menjadi enkripsi yang di inginkan
        $arr = ['E', 'D', 'K', 'G', 'S', 'K'];
        // mengubah nilai pada text yang dimasukkan dengan Array untuk enkripsi
        $encrypted = str_replace($split, $arr, $text);
        echo $encrypted;
    }