<?php

class BoxesCalculator
{
    function getNumberOfBoxesAndSizes($numberOfShirtsOrdered, $sizesOfBoxesAvailable)
    {
        $boxesToSend = array();
        rsort($sizesOfBoxesAvailable);
        $shirtsLeft = $numberOfShirtsOrdered;
        $lastBoxSize = end($sizesOfBoxesAvailable);
        $previousBoxSize = prev($sizesOfBoxesAvailable);
        $nextBoxSize = $sizesOfBoxesAvailable[count($sizesOfBoxesAvailable) - 3];
        foreach ($sizesOfBoxesAvailable as $i => $boxSize) {
            if ($shirtsLeft <= 0) {
                break;
            }
            $numberOfBoxesOfSize = floor($shirtsLeft / $boxSize);
            $shirtsLeft = $shirtsLeft % $boxSize;
            $boxesToSend[$boxSize] = $numberOfBoxesOfSize;

            if ($shirtsLeft < $nextBoxSize and $shirtsLeft > $previousBoxSize*1.5) {
                if (!isset($boxesToSend[$nextBoxSize])){$boxesToSend[$nextBoxSize]=0;}
                $boxesToSend[$nextBoxSize] = $boxesToSend[$nextBoxSize] + 1;
                //$shirtsLeft = 0;
            }

            if ($shirtsLeft < $previousBoxSize and $shirtsLeft > $lastBoxSize) {
                if (!isset($boxesToSend[$previousBoxSize])){$boxesToSend[$previousBoxSize]=0;}
                $boxesToSend[$previousBoxSize] =$boxesToSend[$previousBoxSize] + 1;
                //$shirtsLeft = 0;
            }
            if ($shirtsLeft < $lastBoxSize and $shirtsLeft > 0) {
                if (!isset($boxesToSend[$lastBoxSize])){$boxesToSend[$lastBoxSize]=0;}
                $boxesToSend[$lastBoxSize] = $boxesToSend[$lastBoxSize] + 1;
                //$shirtsLeft = 0;
            }


        }
        $boxesToSend = array_filter($boxesToSend);
        return $boxesToSend;
    }
}

//$g = new BoxesCalculator();
//print_r($g->getNumberOfBoxesAndSizes(499, [250, 500, 1000, 2000, 5000]));
