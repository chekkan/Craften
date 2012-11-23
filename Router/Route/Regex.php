<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Regex
 *
 * @author Harish
 */

namespace Craften\Router\Route {

    class Regex extends Router\Route{
        /**
         * @readwrite 
         */
        protected $_keys;
        
        public function matches($url)
        {
            $pattern = $this->pattern;
            
            // check values
            preg_match_all("#^{$pattern}$#", $url, $values);
            
            if(size_of($values) && sizeof($values[0]) && sizeof($values[1]))
            {
                // values found, modifty parameters and return
                $deriverd = array_combine($this->keys, $values[1]);
                $this->parameters = array_merge($this->parameters, $derived);
                
                return true;
            }
            
            return false;
        }
    }

}
?>
