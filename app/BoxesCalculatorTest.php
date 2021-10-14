<?php
include "BoxesCalculator.php";

class BoxesCalculatorTest
{
    function test()
    {

        $boxesCalculator = new BoxesCalculator();
        $boxesAvailable = [250, 500, 1000, 2000, 5000];

        $boxesToSend = $boxesCalculator->getNumberOfBoxesAndSizes(1, $boxesAvailable);
        $type = gettype($boxesToSend);
        if ($type != 'array') {
            $this->error('Type test failed');
        }
        if ($boxesToSend !== array(250 => 1)) {
            $this->error('1st test failed');
        }

        $boxesToSend = $boxesCalculator->getNumberOfBoxesAndSizes(250, $boxesAvailable);
        if ($boxesToSend !== array(250 => 1)) {
            $this->error('2nd test failed');
        }

        $boxesToSend = $boxesCalculator->getNumberOfBoxesAndSizes(260, $boxesAvailable);
        if ($boxesToSend != array(500 => 1)) {
            print_r($boxesToSend);
            $this->error('3rd test failed');
        }

        print "================================\n";
        print "test 4rd given case\n";
        $boxesToSend = $boxesCalculator->getNumberOfBoxesAndSizes(510, $boxesAvailable);
        if ($boxesToSend != array(500 => 1, 250 => 1)) {
            print_r($boxesToSend);
            $this->error('4th test failed');
        }

    }

    private function error($msg) {
        fwrite(STDERR, $msg);
        exit(1);
    }
}

$test = new BoxesCalculatorTest();
$test->test();

