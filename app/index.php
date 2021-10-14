<?php
//include BoxesCalculator::class;
include "BoxesCalculator.php";
//$result ="";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Universal Textiles – Developer Test</title>


</head>
<body>
<div>
    <form id="number" action="index.php" method="POST">
        Set Number: <input type="number" name="number" value="1">

        <input type="submit">
    </form>

    <div id="res">


        <?php print_r($result); ?> .
    </div>
</body>
</html>
</html>



