<?php
$result = "";
//include BoxesCalculator::class;
include "BoxesCalculator.php";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta content="application/http" charset="UTF-8">
    <title>Universal Textiles – Developer Test</title>
</head>
<body>
<div>
    <form id="number" action="index.php" method="POST">
        Set Number: <input type="number" name="number" value="">

        <input type="submit">
    </form>

    <div id="res">


        <?php
        $calculator = new BoxesCalculator();
        $result = $calculator->getNumberOfBoxesAndSizes($_POST['number'], [250, 500, 1000, 2000, 5000]);
        echo '<pre>';
        print_r($result);
        echo '</pre>';
        ?> .
    </div>
</body>
</html>




