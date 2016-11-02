<?php

define('HASH', '532b360ffb5aef70ee956193af607d891dc65f96499bf9fbe6fa6d5089749ff4');
$allow = false;
$output = '';

if ($_POST['pwd']) {
	$hash = hash('sha256', $_POST['pwd']);
	if ($hash == HASH) { $allow = true; }
}


if ($allow) :

	/**
	 * GIT DEPLOYMENT SCRIPT
	 *
	 * Used for automatically deploying websites via github or bitbucket, more deets here:
	 *
	 *		https://gist.github.com/1809044
	 */
	// The commands
	$commands = array(
		'echo $PWD',
		'whoami',
		'git pull',
		'git status',
		'git submodule sync',
		'git submodule update',
		'git submodule status',
	);
	// Run the commands for output
	foreach($commands AS $command){
		// Run it
		$tmp = shell_exec($command);
		// Output
		$output .= "<span style=\"color: #6BE234;\">\$</span> <span style=\"color: #729FCF;\">{$command}\n</span>";
		$output .= htmlentities(trim($tmp)) . "\n";
	}
	// Make it pretty for manual user access (and why not?)


else : 

	$output .= "Pass is dead wrong Jim!";
	$output .= '<form style="margin-top: 20px;" action="" method="POST">';
	$output .= '<input type="password" id="pwd" name="pwd">';
	$output .= '<input type="submit" value="Enter Password">';
	$output .= '</form>';

endif; ?>



<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>GIT DEPLOYMENT SCRIPT</title>
</head>
<body style="background-color: #000000; color: #FFFFFF; font-weight: bold; padding: 0 10px;">
<pre>
 .  ____  .    ____________________________
 |/      \|   |                            |
[| <span style="color: #FF0000;">&hearts;    &hearts;</span> |]  | Git Deployment Script v0.2 |
 |___==___|  /              &copy; oodavid 2012 |
              |____________________________|



<?php echo $output; ?>
</pre>
</body>
</html>



