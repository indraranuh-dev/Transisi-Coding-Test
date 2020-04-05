<?php

    /**
     * Fungsi ini dijalankan menggunakan PHP debug pada code editor VSCode.
    **/

    cariHurufKecil('TranSISI');

    function cariHurufKecil($text){
        // Mengubah kata menjadi array
        $toArr = str_split($text);
        // Membuat array baru
        $newArr = [];
        
        // Looping menggunakan foreach
        foreach($toArr as $data){
            // Memvalidasi jika index pada array tersebut adalah huruf kecil maka akan mengembalikan nilai true
            if(ctype_lower($data)){
                // Memasukkan array ke array pada variabel newArr dengan nilai true / 1
                array_push($newArr, true);
            }
        }
        // Menghitund jumlah true yang terdapat pada variabel newArr
        $count = count($newArr);
        // Meenampilkan hasil dari pencarian huruf kecil
        echo '"'.$text.'" Mengandung '.$count.' huruf kecil';
    }