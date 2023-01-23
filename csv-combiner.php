#! /opt/homebrew/opt/php@8.0/bin/php
<?php

/**************************************
 * This PHP script takes one or more CSV files, 
 *   adds&populate an additional column to each, 
 *      then combines all and writes this result to stdout.
 * 
 *     PMG Programming Challenge - CSV Combiner 
 *   Submitted by Joshua Buhain (JB) 
 * https://github.com/jbuhain/PMGProgrammingChallenge
***************************************/

if ($argc < 3) {
    echo "Not enough arguments!\nExample command:'$ ./csv-combiner.php ./path/to/file1.csv ./path/to/file2.csv'\n";
    exit;
}

for ($i = 1; $i < $argc; $i++) {
    $file = $argv[$i];

    /* JB: Could implement exception handling in the future like 
    throw exception if file is not found. */
    $fileData = array_map('str_getcsv', file($file));

    foreach ($fileData as $j => $data) {
        if ($j == 0) {
            array_push($fileData[$j],"filename");
        } else {
            array_push($fileData[$j], basename($file));
        }
    }  

    if ($i != 1) {
        array_shift($fileData);
    }

    foreach ($fileData as $line) {
        fputcsv(STDOUT, $line);
    }
}

?>