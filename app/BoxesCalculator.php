<?php

class BoxesCalculator
{
    function getNumberOfBoxesAndSizes($numberOfBoxesOrdered, $sizesOfBoxesAvailable) {
        $boxesToSend = array();
        rsort($sizesOfBoxesAvailable);
        //array_push($sizesOfBoxesAvailable, 1);
        print_r($sizesOfBoxesAvailable);
        $shirtsLeft = $numberOfShirtsOrdered;
        $lastBoxSize = end($sizesOfBoxesAvailable);
        $previousBoxSize = prev($sizesOfBoxesAvailable);
        print "lastBoxSize - $lastBoxSize \n previousBoxSize - $previousBoxSize \n";

        foreach ($sizesOfBoxesAvailable as $i => $boxSize) {
            //print " $i => $boxSize \n";
            if ($shirtsLeft <= 0) {
                break;
            }
            $numberOfBoxesOfSize = floor($shirtsLeft / $boxSize);
            $shirtsLeft = $shirtsLeft % $boxSize;

            print "shirtsLeft  $shirtsLeft \n";

            if ($shirtsLeft <= $previousBoxSize and $shirtsLeft > $lastBoxSize) {
                $boxesToSend[$previousBoxSize] = 1;
                $shirtsLeft = $shirtsLeft - $previousBoxSize;
            } elseif ($shirtsLeft < $lastBoxSize) {
                $boxesToSend[$lastBoxSize] = $numberOfBoxesOfSize;
                $shirtsLeft = $shirtsLeft - $lastBoxSize;
            }
            $boxesToSend[$boxSize] = $numberOfBoxesOfSize;


        }
        if($numberOfBoxesOrdered > 0) {
            $smallestSize = $sizesOfBoxesAvailable[count($sizesOfBoxesAvailable) - 1];
            $boxesToSend[$smallestSize] = $boxesToSend[$smallestSize] + 1;
        }
        foreach ($sizesOfBoxesAvailable as $boxSize) {
            if($boxesToSend[$boxSize] == 0) {
                unset($boxesToSend[$boxSize]);
            }
        }

        return $boxesToSend ;
    }
}