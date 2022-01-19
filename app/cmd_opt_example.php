<?php
// Script cmd_opt_example.php

/*
php cmd_opt_example.php --commitcomment "uplne pako" -m "dilino" -o --optional="ooooooooo" -x --xxx='asdf'


vystup
array(6) {
  ["commitcomment"]=>
  string(10) "uplne pako"
  ["m"]=>
  string(6) "dilino"
  ["o"]=>
  bool(false)
  ["optional"]=>
  string(9) "ooooooooo"
  ["x"]=>
  bool(false)
  ["xxx"]=>
  bool(false)
}
*/

$shortopts  = "";
$shortopts .= "m:";  // Required value
$shortopts .= "o::"; // Optional value
$shortopts .= "h"; // These options do not accept values

$longopts  = array(
    "commitcomment:",     // Required value
    "optional::",    // Optional value
    "xxx",           // No value
    "help",           // No value
);
$options = getopt($shortopts, $longopts);
var_dump($options);

if(array_key_exists('h',$options) || array_key_exists('help',$options)){
	printHelp();
	exit(0);
}

function printHelp() {
    echo "Usage: \n";
    echo "use this file like this::::::::::\n";
}
?>
