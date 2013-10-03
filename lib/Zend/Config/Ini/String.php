<?php
require_once 'Zend/Config/Ini.php';

class Zend_Config_Ini_String extends Zend_Config_Ini
{
    protected function _parseIniFile($filename)
    {
        set_error_handler(array($this, '_loadFileErrorHandler'));
        if(file_exists($filename)){
        	$iniArray = parse_ini_file($filename, true); // Warnings and errors are suppressed
        } else {
        	$iniArray = parse_ini_string($filename, true); // Warnings and errors are suppressed
        }
        restore_error_handler();

        // Check if there was a error while loading file
        if ($this->_loadFileErrorStr !== null) {
            /**
             * @see Zend_Config_Exception
             */
            require_once 'Zend/Config/Exception.php';
            throw new Zend_Config_Exception($this->_loadFileErrorStr);
        }

        return $iniArray;
    }
}
