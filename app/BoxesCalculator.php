<?php

class BoxesCalculator
{
    function getNumberOfBoxesAndSizes($numberOfShirtsOrdered, $sizesOfBoxesAvailable) {
        $boxesToSend = array();
        rsort($sizesOfBoxesAvailable);
        $shirtsLeft = $numberOfShirtsOrdered;
        $lastBoxSize = end($sizesOfBoxesAvailable);
        $previousBoxSize = prev($sizesOfBoxesAvailable);
        $nextBoxSize = $sizesOfBoxesAvailable[count($sizesOfBoxesAvailable) - 3];
        foreach ($sizesOfBoxesAvailable as $i => $boxSize) {

            $numberOfBoxesOfSize = floor($shirtsLeft / $boxSize);
            $shirtsLeft = $shirtsLeft % $boxSize;
            $boxesToSend[$boxSize] = $numberOfBoxesOfSize;

            if ($shirtsLeft < $previousBoxSize and $shirtsLeft > $lastBoxSize) {
                $shirtsLeft = $shirtsLeft - $previousBoxSize;
                $boxesToSend[$previousBoxSize] = $numberOfBoxesOfSize + 1;
            }
            if ($shirtsLeft < $lastBoxSize and $shirtsLeft > 0) {
                $boxesToSend[$lastBoxSize] = $numberOfBoxesOfSize + 1;
            }

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
