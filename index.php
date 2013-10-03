<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

ini_set('include_path', get_include_path() . PATH_SEPARATOR . './lib');
require_once('Zend/Config/Xml.php');	
require_once('Zend/Config/Ini/String.php');

$config = new Zend_Config_Xml('./config.xml', 'staging');
?>
	<h1>Reads from "staging"</h1>
	<b>database : params : host:</b>   <?php echo $config->database->params->host;   // prints "dev.example.com" ?><br/>
	<b>database : params : dbname:</b> <?php echo $config->database->params->dbname; // prints "dbname" ?>

<pre>
<?php echo htmlentities(file_get_contents('./config.xml')); ?>
</pre>

<?php

$directory = './ini/';
$dir = opendir($directory);
$contents = '';
while (($file = readdir($dir)) !== false) {
	$filename = $directory . $file;
	$type = filetype($filename);
	if ($type == 'file') {
		$contents .= "\n" . file_get_contents($filename);
  }
}
closedir($dir);
$config_ini = new Zend_Config_Ini_String($contents, 'matt');
?>
	<h1>Reads from "matt"</h1>
	<b>database : params : host:</b>   <?php echo $config_ini->database->params->host;   // prints "dev.example.com" ?><br/>

<pre>
<?php echo $contents ?>
</pre>