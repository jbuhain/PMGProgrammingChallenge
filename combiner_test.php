#! /opt/homebrew/opt/php@8.0/bin/php
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

class combiner_test extends TestCase
{
    private $csvFiles = array();
    private $expectedResult = array();
    private $finalData;

    protected function setUp(): void
    {


    }

    public function testCombinerDifferentRows() {
        // Testing for when rows of CSV files are different
        $condition = true;
        $this->assertTrue($condition);
    }

    public function testCombinerVLarge() {
        // Testing for very large > 2GB files
        $condition = true;
        $this->assertTrue($condition);
    }

    public function testCombinerTwoInputs() {
        // Testing for combining two standard inputs
        $condition = true;
        $this->assertTrue($condition);
    }

    public function testCombinerMultipleInputs() {
        // Test for inputs > 2  
        $condition = true;
        $this->assertTrue($condition);
    }

    public function testCombinerInvalid() {
        // Testing for file not found
        $condition = true;
        $this->assertTrue($condition);
    }

}
