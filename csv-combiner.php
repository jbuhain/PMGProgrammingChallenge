#! /opt/homebrew/opt/php@8.0/bin/php
<?php

/**************************************
 * This PHP script takes one or more CSV files, combines them, 
 * adds/populate an additional column, then write them to stdout.
 * 
 * PMG Programming Challenge - CSV Combiner 
 * Submitted by Joshua Buhain (JB) 
 * https://github.com/jbuhain/PMGProgrammingChallenge
***************************************/

// Check if at least 2 files are provided as arguments
// JB: Could implement exception handling in the future like when file is not found
if ($argc < 3) {
    echo "Not enough arguments!\nExample command:'$ ./csv-combiner.php ./path/to/file1.csv ./path/to/file2.csv'\n";
    exit;
}

// Iterate through argv arguments
for ($i = 1; $i < $argc; $i++) {
    $file = $argv[$i];

    // Parse CSV file into array
    $fileData = array_map('str_getcsv', file($file));

    // Iterate through each line of this CSV file 
    foreach ($fileData as $j => $data) {
        if ($j == 0) {
            // If first line of file, add additional column 'filename'
            array_push($fileData[$j],"filename");
        } else {
            // For non-header rows, insert value for 'filename' which is this file's basename
            array_push($fileData[$j], basename($file));
        }
    }  

    // Remove the header row if not first file
    if ($i != 1) {
        array_shift($fileData);
    }

    // Write file data to STDOUT
    foreach ($fileData as $line) {
        fputcsv(STDOUT, $line);
    }
}

?>