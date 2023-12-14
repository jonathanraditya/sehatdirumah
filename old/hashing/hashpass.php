<?php
    function stringToBinary($string)
    {
        $characters = str_split($string);
        $binary = [];
        foreach ($characters as $character) {
            $data = unpack('H*', $character);
            $binary[] = base_convert($data[1], 16, 2);
        }
        return implode(' ', $binary);    
    }
     
    function binaryToString($binary)
    {
        $binaries = explode(" ", $binary);
        $string = null;
        foreach ($binaries as $binary) {
            $string .= pack('H*', dechex(bindec($binary)));
        }
        return $string;    
    }
    $dbc = "Vm0wd2VFNUdWWGhVV0dST1ZsZFNhRlV3Vm5kVlJscDBUVlpPV0ZadGVGWlZNbmhQVmpGYWRHVkliRmhoTVhCUVZtcEdZV1JIVmtsaVJtaG9UVmhDVVZadGNFZFRNazE1Vkd0V1VtSlZXbFJXYWtwdlpWWmtWMVp0UmxwV01EVjVWR3hhYzJGR1NuTmpSbWhWVmtWd2RsWldXbUZrUlRGVlZXeFNUbUY2VmpaV2Fra3hVakZhZEZOcmFGWmlhMHBZVkZWYVYwNUdVbkpYYlVacVRWWmFlVmRyV25kV01rcEpVV3hzVjJGcmEzaFdSRVpyVTBaT2NtRkhhRk5pUlhCWVYxZDBZV1F3TUhoWGEyUllZbFZhY1ZSV1duZE5SbFowWlVkR2FGWnNjSHBaTUZaelZqSktWVkpVUWxwaGExcFRXbFZhYTJSV1ZuUmxSazVwVm10d1dsWXhXbE5TTVUxNFVsaG9WbUpyTlZSV2EyUTBWV3hhVjFWWVpGQlZWREE1";
    $scdb = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($dbc))))))))));
    $pth = "Vm0wd2QyVkZNVWRYV0doWFYwZG9WbFl3Wkc5V01WbDNXa1JTVjAxWGVEQmFWVll3VmpGYWRHVkVRbUZXVmxsM1ZtMTRTMk15VGtsaFJtUlRaV3RGZUZacVNqUlpWMDE0Vkc1T1dHSkdjSEJXTUZwSFRURmtWMWt6YUZSTlZUVklWbTAxVDJGV1NuVlJiR3hXVFVaYVRGVXhXbXRXTVZaeVUyMTRVMDFFVmpaV01uUnZVekpHYzFOdVRtcFNiV2hoV1ZSR1lWbFdjRmhsUjBaWFlrZFNlVll5ZUVOV01rVjNZMFpTVjFaV2NGTmFSRVpEVld4Q1ZVMUVNRDA9";
    $scpth = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($pth))))))))));
    //echo $scdb . $scpth;
    include($_SERVER['DOCUMENT ROOT'].'/connectdb.php');
    
    mysqli_query($con , "insert into admin (no,nama) values ('10' , 'noob')");
    
   /* $password = "inipassnya";
    $hash = password_hash($password, PASSWORD_BCRYPT);
    echo $hash . "<br>";
    
    echo "base 64 : " . base64_encode($password) . "<br>";
    
    $key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
    $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
    $ciphertext = sodium_crypto_secretbox('This is a secret!', $nonce, $key);
    $encoded = base64_encode($nonce . $ciphertext);
    var_dump($encoded);
    echo "$encoded <br>";
    
    

    if($decrypted = password_verify($password, "$2y$10$1TpuMUpXmFUvlIwDjuTMZ".".cZAY0DhsNNKxpau6l8TM5FLM2.4XkAa")){
        echo $decrypted . "<br>";
    }
    
    echo phpversion() . "<br>\n";
    if(function_exists('sodium_bin2hex')) {
        echo "sodium_bin2hex() exists!<br>\n";
    } else {
        echo "sodium_bin2hex() function does not exist<br>\n";
    }*/
    
    $pass = 'Ini Password Nya = : => 12345678901324354657687980';
    
    //echo $pass;
    $hashed = base64_encode
                (base64_encode
                    (password_hash
                        ("Ini Password Nya => : => 12345678901324354657687980", PASSWORD_ARGON2I)
                    )
                );
    echo $hashed . "<br>";
    
    if($decodedhash = password_verify($pass , base64_decode
                                        (base64_decode
                                            ($hashed)
                                        )
                                    )
        ){
        //$decodedhash =  password_verify($decoded, PASSWORD_ARGON2I);
        echo "decoded : " . $decodedhash;
    } else {
        echo "decoded : 0";
    }
?>