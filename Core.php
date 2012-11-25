<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AutoLoader
 *
 * @author Harish
 */

namespace Craften {

    class Core {
        
        public static function initialize()
        {
            
            spl_autoload_register(array(__NAMESPACE__."\Core", 'autoload'));
        }
        
        public static function autoload($class)
        {
            $paths = explode(PATH_SEPARATOR, get_include_path());

            $flags = PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE;
            $file = strtolower(str_replace("\\", DIRECTORY_SEPARATOR, trim($class, "\\"))).".php";

            foreach ($paths as $path)
            {
                $combined = $path.DIRECTORY_SEPARATOR.$file;

                if (file_exists($combined))
                {
                    include($combined);
                    return;
                }
            }

            throw new \Exception("{$class} not found");
        }
    }

}
?>
