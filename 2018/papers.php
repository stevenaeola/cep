<?php

$papers=array(

);


function cmp($p1, $p2){
    $n1 = $p1['time'];
    $n2 = $p2['time'];
    $c = ($n1 < $n2) ? -1: 1;
    if($n1 == $n2) return 0;
    return $c;
}

usort($papers, "cmp");

$paperTimes = array();
foreach($papers as $n => $paper){
    $paperTimes[$paper['time']] = $n;
}


?>
