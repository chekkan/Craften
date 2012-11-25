<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author Harish
 */

namespace Craften {
    
    use \Craften\Registry as Registry;
    use \Craften\View as View;

    class Controller {
        /**
         * @readwrite 
         */
        protected $_parameters;
        
        /**
         *
         * @readwrite
         */
        protected $view;
        
        /**
         * @readwrite
         */
        protected $viewPath = "app\\View";
        
        protected $viewExtension = "tpl";
        
        protected $_viewFilePaths = array();
        
        public function __construct()
        {
            $router = Registry::get("router");
            $controller = ucfirst($router->getController());
            $action = ucfirst($router->getAction());
            
            $this->view = new View(array(
               "file" => APP_PATH."\\{$this->viewPath}\\{$controller}\\{$action}.tpl"
            ));
        }
        
        public function render()
        {
            echo $this->view->render();
        }
        
        public function __destruct() {
            $this->render();
        }
        
        
    }

}
?>
