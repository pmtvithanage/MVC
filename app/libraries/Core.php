<?php
    class Core {
        // URL format -->. /controller/method/params
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct(){
            //print_r($this->getUrl()); // for debugging purposes

            $url = $this->getUrl();

            // Check if controller exists
            if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
                $this->currentController = ucwords($url[0]);
                unset($url[0]); // remove controller from url

                // Call the controller file
                require_once '../app/controllers/' . $this->currentController . '.php';

                // Instantiate controller class
                $this->currentController = new $this->currentController;

                // Check if method exists in controller
                if(isset($url[1])){
                    if(method_exists($this->currentController, $url[1])){
                        $this->currentMethod = $url[1];
                        unset($url[1]); // remove method from url
                    }

                    // Get parameter list
                    $this->params = $url ? array_values($url) : [];
                    // Call the method
                    call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
                }
                
            }
                
        }

        public function getUrl(){
            if(isset($_GET['url'])){ // check if url is set
                $url = rtrim($_GET['url'], '/'); // remove trailing slash
                $url = filter_var($url, FILTER_SANITIZE_URL); // remove any special characters
                $url = explode('/', $url); // split the url into an array

                return $url;
            }
        }
    }
?>