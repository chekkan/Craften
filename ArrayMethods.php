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
        
        public static function toObject($array)
        {
            $result = new \stdClass();
            
            foreach ($array as $key => $value)
            {
                if (is_array($value))
                {
                    $result->{$key} = self::toObject($value);
                }
                else
                {
                    $result->{$key} = $value;
                }
            }
            
            return $result;
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
        
        public function flatten($array, $return = array())
        {
            foreach ($array as $key => $value)
            {
                if(is_array($value) || is_object($value))
                {
                    $return = self::flatten($value, $return);
                }
                else 
                {
                    $return[] = $value;
                }
            }
            
            return $return;
        }
        
        public function first($array)
        {
            return array_shift($array);
        }
        
    }

    
}

?>
