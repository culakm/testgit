<?php

$cmd = 'ls aldasf';
$last_line = system($cmd, $retval);

echo "last_line\n";
var_dump($last_line);

echo "retval\n";
var_dump($retval);


if ($retval === 0){
	echo "$cmd : Everithing is OK\n";		
} else {
	echo "$cmd : Everithing is WRONG\n";
}
?>
