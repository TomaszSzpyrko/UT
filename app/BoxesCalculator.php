<?php

class BoxesCalculator
{
    function getNumberOfBoxesAndSizes($numberOfShirtsOrdered, $sizesOfBoxesAvailable) {
        $boxesToSend = array();
        rsort($sizesOfBoxesAvailable);
        //print_r($sizesOfBoxesAvailable);
        $shirtsLeft = $numberOfShirtsOrdered;
        $lastBoxSize = end($sizesOfBoxesAvailable);
        $previousBoxSize = prev($sizesOfBoxesAvailable);
        $nextBoxSize = $sizesOfBoxesAvailable[count($sizesOfBoxesAvailable) - 3];
//        print " lastBoxSize - $lastBoxSize \n previousBoxSize - $previousBoxSize \n nextBoxSize $nextBoxSize \n";
        foreach ($sizesOfBoxesAvailable as $i => $boxSize) {

            $numberOfBoxesOfSize = floor($shirtsLeft / $boxSize);
            $shirtsLeft = $shirtsLeft % $boxSize;
            $boxesToSend[$boxSize] = $numberOfBoxesOfSize;
            //print "shirtsLeft  $shirtsLeft \n";


//            if ($shirtsLeft > $previousBoxSize and $shirtsLeft > $lastBoxSize and $shirtsLeft < $nextBoxSize) {
//                print "for 1000 shirtsLefts  $shirtsLeft \n";
//                $shirtsLeft = $shirtsLeft - $nextBoxSize;
//                $boxesToSend[$nextBoxSize] = $numberOfBoxesOfSiz + 1;
//            }

            if ($shirtsLeft < $previousBoxSize and $shirtsLeft > $lastBoxSize) {
                //print "for 500 shirtsLefts  $shirtsLeft \n";
                $shirtsLeft = $shirtsLeft - $previousBoxSize;
                $boxesToSend[$previousBoxSize] = $numberOfBoxesOfSize + 1;
            }
            if ($shirtsLeft < $lastBoxSize and $shirtsLeft > 0) {
                //print "for 250 shirtsLefts  $shirtsLeft \n";
                //$shirtsLeft = $shirtsLeft - $lastBoxSize;
                $boxesToSend[$lastBoxSize] = $numberOfBoxesOfSize + 1;
            }

            //print "for 0 shirtsLefts  $shirtsLeft \n";
            if ($shirtsLeft <= 0) {
                break;
            }

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
