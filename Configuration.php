<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Configuration
 *
 * @author Harish
 */
namespace Craften
{
    use Craften\Base as Base;
    
    class Configuration extends Base {
        /**
         * @ readwrite 
         */
        protected $_type;
        
        /**
         * @readwrite 
         */
        protected $_options;
        
        protected function _getExceptionForImplementation($method)
        {
            return new \Exception\Implementation("{$method} method not implemented");
        }
        
        public function initialize()
        {
            if(!$this->type)
            {
                throw new Exception\Argument("Invalid type");
            }
            
            switch($this->type)
            {
                case "ini":
                {
                    return new Configuration\Driver\Ini($this->options);
                    break;
                }
                default:
                {
                    throw new Exception\Argument("Invalid type");
                    break;
                }
            }
        }
    }
}

?>
