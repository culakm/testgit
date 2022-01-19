<?php
// Script cmd_opt_example.php


$shortopts  = "";
$shortopts .= "m:";
$shortopts .= "b:";
$shortopts .= "x";
$options = getopt($shortopts);
var_dump($options);

$commit_message = '';
$this_branch = '';
$run_flag = false;
$retval;

// Run commands
if(array_key_exists('x',$options)){
	$run_flag = true;
}

if(array_key_exists('m',$options)){
	$commit_message = $options['m'];
}

if(array_key_exists('b',$options)){
	$this_branch = $options['b'];
}

// Check status
$cmd = 'git status';
$last_line = $run_flag ? system($cmd, $retval) : print("cmd to run: $cmd\n");
$last_line = 'no changes added to commit (use "git add" and/or "git commit -a")';

if (strstr($last_line, 'no changes added to commit (use "git add" and/or "git commit -a")')){
	echo "Changes were found!\n";
	$cmd = 'git add .';
	runCmd($cmd,$run_flag);
	$cmd = "git commit -m '$commit_message'";
	runCmd($cmd,$run_flag);
	$cmd = "git checkout development";
	runCmd($cmd,$run_flag);
	$cmd = "git merge development $this_branch";
	runCmd($cmd,$run_flag);
	$cmd = "git push";
	runCmd($cmd,$run_flag);
	$cmd = "git checkout $this_branch";
	runCmd($cmd);
	
	
}

function runCmd($cmd,$run_flag = false) {
    $retval = false;
	$last_line = $run_flag ? system($cmd, $retval) : print("cmd to run: $cmd\n");
	if (! $retval === 0){
		echo "Some ERROR for command: $cmd";
		exit;
	}
}

function printHelp() {
    echo "Usage: php app/git_push_user.php -m 'commit message' -b 'branch'-x \n";
    echo "-m	commit message\n";
    echo "-b	this branch name\n";
    echo "-x	execute commands\n";
}


?>
