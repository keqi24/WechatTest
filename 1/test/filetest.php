<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$file_array = parse_ini_file($filename);


function write_php_ini($array, $file){
    $res = array();
    foreach($array as $key => $val){
        if(is_array($val)){
            $res[] = "[$key]";
            foreach($val as $skey => $sval) {
                $res[] = "$skey = ".(is_numeric($sval) ? $sval : '"'.$sval.'"');
            }
        }else {
            $res[] = "$key = ".(is_numeric($val) ? $val : '"'.$val.'"');
        }
    }
    safefilerewrite($file, implode("\r\n", $res));
} 

function safefilerewrite($fileName, $dataToSave){ 
    if ($fp = fopen($fileName, 'w')){
        $startTime = microtime();
        do{ 
            $canWrite = flock($fp, LOCK_EX);
                // If lock not obtained sleep for 0 - 100 milliseconds, to avoid collision and CPU load
                if(!$canWrite) usleep(round(rand(0, 100)*1000));
         } while ((!$canWrite)and((microtime()-$startTime) < 1000));

        //file was locked so now we can store information
        if ($canWrite){ 
            fwrite($fp, $dataToSave);
            flock($fp, LOCK_UN);
        }
        fclose($fp);
    }
}

function checkFileExist($filename) {
    if(!file_exists($filename)) {
        $fh = fopen($filename, "w");
        fclose($fh);
    }
}

$configFileName = "test_config.ini";
function testIni() {
    global $configFileName;
    checkFileExist($configFileName);
    $array = parse_ini_file($configFileName, true);
//    $array['access_token'] = 'token';
//     var_dump($array);
//    write_php_ini($array, $configFileName);
    var_dump($array);
    $array['test'] = 'new_test';
    write_php_ini($array, $configFileName);
    $array2 = parse_ini_file($configFileName);
    var_dump($array2);
}

testIni();

        

