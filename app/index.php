<?php
$result = "";
//include BoxesCalculator::class;
include "BoxesCalculator.php";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <title>Universal Textiles – Developer Test</title>
</head>
<body>
<div>
    <form id="number" action="index.php" method="POST">
        <label for="number"># of shirts in the order:</label>
        <input id="number" name="number" type="number"/>
        <input type="submit" value="Calculate Delivery">
    </form>

    <div id="res">


        <?php
        if ($_POST) {
            $calculator = new BoxesCalculator();
            $result = $calculator->getNumberOfBoxesAndSizes($_POST['number'], [250, 500, 1000, 5000]);
            ?>
            <table border="1">
                <thead>
                <tr>
                    <td>Box size</td>
                    <td># of boxes</td>
                </tr>
                </thead>
                <?php
                foreach ($result as $boxSize => $numOfBoxes) { ?>
                    <tr>
                        <td><?= $boxSize ?></td>
                        <td><?= $numOfBoxes ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </div>
</body>
</html>




