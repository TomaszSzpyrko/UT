<?php

class BoxesCalculator
{
    function getNumberOfBoxesAndSizes($numberOfBoxesOrdered, $sizesOfBoxesAvailable) {
        $boxesToSend = array();
        rsort($sizesOfBoxesAvailable);
        foreach ($sizesOfBoxesAvailable as $boxSize) {
            $numberOfBoxesOfSize = 0;
            while($numberOfBoxesOrdered >= $boxSize) {
                $numberOfBoxesOfSize++;
                $numberOfBoxesOrdered -= $boxSize;
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