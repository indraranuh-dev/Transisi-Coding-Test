<?php

    /**
     * Fungsi ini dijalankan menggunakan PHP debug pada code editor VSCode.
    **/
    
    tampilkanTabel(64);
    
    function tampilkanTabel($num){
        // Looping sebanyak jumlah yang di inputkan
        for($i = 1; $i <= $num; $i++){
            // Jika nilai i dibagi akar dari angka yang di inputkan tidak sama dengan bilangan bulat 
            if($i / sqrt($num) != round($i / sqrt($num))){
                // mengambalikan niilai i
                echo " $i ";
            }else{
                // mengambalikan niilai i dan ganti baris
                echo " $i ", PHP_EOL;
            }
        }
    }
