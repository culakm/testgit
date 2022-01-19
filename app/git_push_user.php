<?php
// Script cmd_opt_example.php


$shortopts  = "";
$shortopts .= "m:";


$options = getopt($shortopts);
var_dump($options);

$last_line = system('git status', $retval);

echo "last_line\n";
var_dump($last_line);

echo "retval\n";
var_dump($retval);
?>
