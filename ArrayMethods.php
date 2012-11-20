<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArrayMethods
 *
 * @author Harish
 */
namespace Craften
{
    
    class ArrayMethods {
        
        private function __construct()
        {
            // do nothing
        }
        
        private function __clone()
        {
            // do nothing
        }
        
        public static function clean($array)
        {
            return array_filter($array, function($item) {
                return !empty($item);
            });
        }
        
        public static function trim($array)
        {
            return array_map(function ($item) {
                return trim($item);
            }, $array);
        }
        
    }

    
}

?>
