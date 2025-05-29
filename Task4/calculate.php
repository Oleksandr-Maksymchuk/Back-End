<?php
include 'func.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $x = floatval($_POST['x']);
    $y = floatval($_POST['y']);
    
    $factorial = gmp_intval(gmp_fact($x));
    $sin = sin($x);
    $cos = cos($x);
    $tg = tan($x);
    $myTg = my_tg($x);
    
    echo "<table border='1' style='background-color: yellow;'>";
    echo "<tr><th>x</th><th>x!</th><th>my_tg(x)</th><th>sin(x)</th><th>cos(x)</th><th>tg(x)</th></tr>";
    echo "<tr><td>$x</td><td>$factorial</td><td>$myTg</td><td>$sin</td><td>$cos</td><td>$tg</td></tr>";
    echo "</table>";
}
?>