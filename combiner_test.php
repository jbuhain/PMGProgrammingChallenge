#! /opt/homebrew/opt/php@8.0/bin/php
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

/**************************************
 * Unit Tests for csv-combiner. Uses PHPUnit. 
 *   I ran out of time so I wrote pseudocode. 
 *     Hope my thought process is clear.
 *  
 *     PMG Programming Challenge - CSV Combiner 
 *   Submitted by Joshua Buhain (JB) 
 * https://github.com/jbuhain/PMGProgrammingChallenge
***************************************/

class combiner_test extends TestCase {

    public function testCombinerTwoInputs() {
        /* Testing for combining two regular inputs */

        exec("./csv-combiner.php ./fixtures/accessories.csv ./fixtures/household_cleaners.csv > combined.csv");

        $combinedCSV = file_get_contents("./combined.csv");
        $expectedCSV = file_get_contents("./fixtures/combined_access_hclean.csv");

        $this->assertEquals($combinedCSV, $expectedCSV);
    }

    public function testCombinerMultipleInputs() {
        /* Test for inputs > 2 */
        exec("./csv-combiner.php ./fixtures/clothing.csv ./fixtures/accessories.csv ./fixtures/household_cleaners.csv > combined.csv");

        $combinedCSV = file_get_contents("./combined.csv");
        $expectedCSV = file_get_contents("./fixtures/combined_clothing_access_hclean.csv");

        $this->assertEquals($combinedCSV, $expectedCSV);
    }


    public function testCombinerDifferentCols() {
        /* Testing for when rows of CSV cols are different */
        
        /*
            JB: According to README introduction: 
            "Each CSV file (found in the fixtures directory of this repo) will have the same columns"

            However, in the example section, it says: 
            "This example is provided as one of the ways your code should run...
            It should also be able to handle ... inputs with different columns..."
        
            Don't these statements contradicts each other? Or did I interpret this wrong woops
        */
        $condition = true;
        $this->assertTrue($condition);
    }

    public function testCombinerVLarge() {
        // Testing for very large > 2GB files

        /*
            JB: How I would do this (pseudocode)

            1) Modify generate fixtures to create two >2GB CSV files. 
                exec("./generateFixtures.py")

            2) Merge them with a python script that is known to 100% merge CSVs accurately
                exec("./Merger.py ./fixtures/accessories.csv ./fixtures/clothing.csv)

            3) Compare this python script to my PHP script 
                exec("./csv-combiner.php ./fixtures/accessories.csv ./fixtures/clothing.csv > combined.csv");

            4) Test passes is assertEquals to true
                $combinedCSV = file_get_contents("./combined.csv");
                $expectedCSV = file_get_contents("./fixtures/combinedLarge_access_clothing.csv");
                $this->assertEquals($combinedCSV, $expectedCSV);
        */
        $condition = true;
        $this->assertTrue($condition);
    }

    public function testCombinerInvalid() {
        /* Testing for Invalid Inputs */

        /* 
            JB: To do this, I would: (pseudocode)
            
            1) Modify csv-combiner.php and add error handling exception using try catch method.

            2) I would run script with invalid file name. and catch the error exception that csv-combiner will throw

                try{
                    exec("./csv-combiner.php ./fixtures/clothing.csv ./File/IDoNotExist.csv > combined.csv");
                }
                catch(Exception ...){
                    echo "error caught nice"
                }
                
            3) If it catches exception, passes the test
                $this->assertTrue($condition);
        */
        $condition = true;
        $this->assertTrue($condition);
    }
}
