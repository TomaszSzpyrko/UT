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
                $shirtsLeft = 0;
                break;
            }
            $numberOfBoxesOfSize = floor($shirtsLeft / $boxSize);
            $shirtsLeft = $shirtsLeft % $boxSize;
            $boxesToSend[$boxSize] = $numberOfBoxesOfSize;
            print_r(" \n  $shirtsLeft \n");
            if ($shirtsLeft < $previousBoxSize and $shirtsLeft > $lastBoxSize) {
                $boxesToSend[$previousBoxSize] = $numberOfBoxesOfSize + 1;
                //$shirtsLeft = $shirtsLeft - $previousBoxSize;
                $shirtsLeft = 0;
                //print_r(" \n  $shirtsLeft \n");

            }
            if ($shirtsLeft < $lastBoxSize and $shirtsLeft > 0) {
                $boxesToSend[$lastBoxSize] = $numberOfBoxesOfSize + 1;
            }
            //print_r(" \n  $shirtsLeft \n");

        }
        $boxesToSend = array_filter($boxesToSend);
        return $boxesToSend;
    }
}

$g = new BoxesCalculator();
print_r($g->getNumberOfBoxesAndSizes(4444, [250, 500, 1000, 2000, 5000]));
