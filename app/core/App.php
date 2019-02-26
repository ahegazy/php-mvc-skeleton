<?php

class App{


    /*
    * definig defualt parameters if not specified by the user
    */
    protected $controller = 'home';
    protected $method = 'index';
    protected $language = 'en';
    protected $params = [];

    public function __construct(){
    
        /* 
        * GET request should be in the following form : URL/language/controller/method/parameters
        */
        
        //getting the request parameters
        $req = $this->parseUrl();
        
        //setting the langauge to default language if not specified.

        if($req != NULL && file_exists('../app/languages/' . $req[0])){
            define('LANGUAGE', array_shift($req));                    
        }else{
            define('LANGUAGE', $this->language);
        }

        if(file_exists('../app/controllers/' . $req[0] . '.php')){
            $this->controller = $req[0];
            unset($req[0]);
        }    

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if(isset($req[1])){
            if(method_exists($this->controller,$req[1])){
                $this->method = $req[1];
                unset($req[1]);
            }

        }
        $this->params = $req ? array_values($req): [];

        //sending the req array as parameters for the method function f(req[0],req[1] ..etc){}
        call_user_func_array([$this->controller,$this->method], $this->params);
    }

    public function parseUrl(){
        if(isset($_GET['req'])){
            return $req = explode('/',filter_var(rtrim($_GET['req'],'/'),FILTER_SANITIZE_URL));
        }
    }

}
