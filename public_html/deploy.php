<?php
	/**
	 * GIT DEPLOYMENT SCRIPT
	 *
	 * Used for automatically deploying websites via github or bitbucket, more deets here:
	 *
	 *		https://gist.github.com/1809044
	 */

    putenv('COMPOSER_HOME=' . '/usr/bin/php');

// secure script from outside with dummy secret in url
    if($_GET['secret'] != 'CR6truCRUZA9ukEzEmePhep5gase8E')
        exit();

    function getBranch()
    {
//        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $payload = print($_SERVER["REQUEST_METHOD"]);
//        }
        return $payload;
    }

    echo getBranch();
    file_put_contents('../gitreq.txt', print(getBranch()), FILE_APPEND);

	// The commands
	$commands = array(
		'echo $PWD',
		'whoami',
//        'git reset --hard',
//		'git pull',
//        'composer update -d ..',
		'php '.__DIR__.DIRECTORY_SEPARATOR.'../vendor/zircote/swagger-php/swagger.phar '.__DIR__.DIRECTORY_SEPARATOR.'../app/route/ -o '.__DIR__.DIRECTORY_SEPARATOR.'api/v1'
//		'git status',
//		'git submodule sync',
//		'git submodule update',
//		'git submodule status',
	);
 
	// Run the commands for output
	$output = '';
	foreach($commands AS $command){
		// Run it
		$tmp = shell_exec($command);
		// Output
		$output .= "<span style=\"color: #6BE234;\">\$</span> <span style=\"color: #729FCF;\">{$command}\n</span>";
		$output .= htmlentities(trim($tmp)) . "\n";
	}
 
	// Make it pretty for manual user access (and why not?)
?>
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
[| <span style="color: #FF0000;">&hearts;    &hearts;</span> |]  |  Git Deployment Script v1  |
 |___==___|  /      &copy; Dycode Software 2013 |
              |____________________________|
 
<?php echo $output; ?>
</pre>
</body>
</html>