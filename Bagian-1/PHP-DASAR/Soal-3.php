<?php

    /**
     * Fungsi ini dijalankan menggunakan PHP debug pada code editor VSCode.
    **/

    beriKoma("Jakarta adalah ibukota negara Republik Indonesia");

    function beriKoma($text){

        /*====== Unigram ====== */
        // Mengubah kalimat menjadi array
        $unigram = explode(" ", $text);
        // Mengubah array menjadi string dan menambahkan koma disetiap kata dan menampilkan data
        echo "Unigram : ".implode(", ", $unigram), PHP_EOL;
        

        /*====== Bigram ====== */
        // ?Mengubah kalimat manjadi array
        $bigram = explode(" ", $text);
        // Membuat array baru
        $newArr = [];
        // Looping untuk memisahkan setiap dua kata akan dimasukkan ke avariabel newArr
        for($i = 0;$i <= count($bigram); $i++){
            // Jika sisa bagi $i dengan 2 = 0, maka...
            if($i%2 == 0) {
                // Memotong array menjadi 2 kata pada index i dan memasukkan kedalam newArr
                $sliced = array_slice($bigram,$i, 2);
                // Memasukkan array ke variabel newArr
                array_push($newArr, $sliced);
            }
        }
        // Membuat string baru
        $newStr = '';
        // Looping untk memasukkan array collection ke dalam svariabel newStr
        for($i = 0; $i <= count($newArr); $i++){
            // Memastikan bahwa nilai array tidak samadengan nol
            if(! empty($newArr[$i])){
                // Menambahkan semua data pada Array dengan index i
                $newStr .= $newArr[$i][0];
                $newStr .= " ";
                $newStr .= $newArr[$i][1];
                $newStr .= ", ";
            }
        }
        //  Menampilkan data Bigram 
        echo "Bigram : ".substr($newStr, 0, -2), PHP_EOL;
        
        
        /*====== Trigram ====== */
        $trigram = explode(" ", $text);
        $newArr = [];
        for($i = 0;$i <= count($trigram); $i++){
            if($i%3 == 0) {
                $sliced = array_slice($trigram,$i, 3);
                array_push($newArr, $sliced);
            }
        }
        $newStr = '';
        for($i = 0; $i <= count($newArr); $i++){
            if(! empty($newArr[$i])){
                $newStr .= $newArr[$i][0];
                $newStr .= " ";
                $newStr .= $newArr[$i][1];
                $newStr .= " ";
                $newStr .= $newArr[$i][2];
                $newStr .= ", ";
            }
        }
        echo "Trigram : ".substr($newStr, 0, -2), PHP_EOL;
    }