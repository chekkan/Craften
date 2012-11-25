<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author Harish
 */

namespace Craften {

    class View extends Base {
        
        /**
         * 
         * @readwrite
         */
        protected $_file;
        
        public function __construct($options = array()) {
            parent::__construct($options);
        }
        
        public function render()
        {
            if (!file_exists($this->getFile()))
            {
                echo $this->getFile();
                return "";
            }

            return file_get_contents($this->getFile());
        }
    }

}
?>
