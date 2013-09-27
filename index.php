<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

ini_set('include_path', get_include_path() . PATH_SEPARATOR . './lib');
require_once('Zend/Config/Xml.php');	

$config = new Zend_Config_Xml('./config.xml', 'staging');
?>
	<h1>Reads from "staging"</h1>
	<b>database : params : host:</b>   <?php echo $config->database->params->host;   // prints "dev.example.com" ?><br/>
	<b>database : params : dbname:</b> <?php echo $config->database->params->dbname; // prints "dbname" ?>

<pre>
<?php echo htmlentities(file_get_contents('./config.xml')); ?>
</pre>