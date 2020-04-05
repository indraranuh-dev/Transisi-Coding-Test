<?php

    /**
     * Fungsi ini dijalankan menggunakan PHP debug pada code editor VSCode.
    **/
    $arr = [
        ['f', 'g', 'h', 'i'],
        ['j', 'k', 'p', 'q'],
        ['r', 's', 't', 'u'],
    ];
    cari($arr, 'fghi');

    function cari($array, $text){
        // Mengubah string menjadi array per karakter
        $split = str_split($text);
        $array1 = $array[0];
        $array2 = $array[1];
        $array3 = $array[2];
        // Menggabungkan Array collection menjadi satu array
        $merge = array_merge($array1, $array2, $array3);
        // membari default nilai untuk menentukan nilai TRUE / FALSE
        $count = 0 ;
        // Looping untuk setiap karakter yang dicari
        for($i = 0; $i <= count($split); $i++){
            // Mencari nilai yang di inputkan terhadap Array yang telah di gabungkan
            if(array_search($split[$i], $merge) == TRUE){
                // Menambahkan nilai untuk setiap kata yang ditemukan kedalam variabel count
                $count += 1;
            }
        };
        // Menentukan apakah data yang dicari ada atau tidak
        // Jika ada maka akan menampilkan TRUE namun jika tidak ditemukan maka akan menampilkan FALSE
        if($count > 0){
            echo "TRUE";
        }else{
            echo "FALSE";
        }
    }