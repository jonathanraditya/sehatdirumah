<?php
    $user = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(binaryToString("01010110 01101010 01001010 00110000 01011001 01010110 01010101 01111000 01010111 01101110 01010010 01010111 01100010 01000110 01110000 01010000 01010110 01101101 01111000 01100001 01010111 01010110 01011001 01110111 01011010 01000110 01001110 01010101 01001101 01010110 01011010 01111001 01010110 01101101 00110001 01000111 01100001 01010110 01011010 01110100 01010101 01101100 01101000 01011000 01100001 00110001 01110000 01010000 01011001 01010100 01000110 01001010 01100100 00110001 01100100 01110011 01100010 01000110 01010110 01101000 01001101 01010101 01011001 01111010 01010110 01010101 01011010 01000110 01001111 01010110 01000010 01010010 01010000 01010100 00110000 00111101 "))))));
    $password = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(binaryToString("01010110 01101101 01110100 01100001 01011001 01010110 01010101 01111000 01010100 01101110 01010010 01010111 01100010 01101011 01110000 01010000 01010110 01101100 01011010 01100001 01010111 01000110 01011010 01110010 01010110 01101110 01100100 01010110 01010010 01101110 01000010 01011001 01010100 01010110 01100100 01110111 01010100 01101100 01011010 01110011 01010011 01101100 01100100 01010111 01010110 00110011 01010010 01101000 01011001 01101011 01100100 01000111 01001110 01101100 01001010 01110101 01100001 01000110 01100100 01010111 01100010 01010111 01100111 01111010 01010110 01101011 01010010 01000111 01011001 01010110 01001001 01111000 01010011 01101100 01101100 01101001 01010010 01101100 01011010 01110000 01010101 01101101 01110100 01110111 01100101 01000110 01011010 01000111 01011010 01001000 01110000 01001111 01010110 01101011 01110000 01011000 01011001 01101011 01010010 01100001 01010110 00110010 01001010 01000110 01010011 01101100 01010010 01010110 01100010 01000110 01011010 01010111 01010100 01101100 01000101 00111001 01010000 01010001 00111101 00111101 "))))));
    $database = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(binaryToString("01010110 01101010 01001010 00110000 01011001 01010110 01010101 01111000 01010111 01101110 01010010 01010111 01100010 01000110 01110000 01010000 01010110 01101101 01111000 01100001 01010111 01010110 01011001 01110111 01011010 01000110 01001110 01010101 01001101 01010110 01011010 01111001 01010110 01101101 00110001 01000111 01100001 01010110 01011010 01110100 01100100 01111010 01001010 01010110 01001101 01101110 01101000 01110010 01011001 01010110 01010101 01111000 01010111 01000111 01010110 01000111 01100011 01000110 01100100 01010111 01100101 01101011 01011010 01101111 01010110 00110001 01011010 01100001 01010011 01101101 01010110 01011000 01010110 01101011 01010110 01010111 01100010 01010101 01011010 01010100 01011001 01101100 01010101 00110000 01001101 01000110 01100100 01010111 01010110 01101101 01110100 01010011 01001101 01010101 01011010 01111010 01010101 01010111 01111000 01010111 01010100 01101100 01001010 01000101 01010001 01010100 01101011 00111101 "))))));
    $connectto = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(binaryToString("01010110 01101010 01000110 01101011 01001101 01000111 01000110 01110010 01001110 01010110 01101000 01010011 01100010 01101011 00110101 01110000 01010101 01101101 00110001 01101111 01100011 00110001 01010110 01110101 01100011 01001000 01001110 01101010 01010010 01101100 01001010 01010110 01010101 01010110 01010010 01000011 01100001 00110010 01010010 00110110 01001101 01000100 01101011 00111101 "))))));
    $con = mysqli_connect($connectto, $user, $password);
    
     if(!$con){
         echo 'gak berhasil konek ke server :(';
     }
     
     
    if(!mysqli_select_db($con,$database)){
        echo 'Database Tidak Ada';
    }
    
    mysqli_query($con , "insert into admin (no,nama) values ('10' , 'noob')");
?>