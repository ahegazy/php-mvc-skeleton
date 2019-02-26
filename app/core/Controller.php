<?php 

class Controller{

    /* model function called to create an object of a model class
    * it checks user login first if not login it'll show login page
    * if the user is logged in it'll go on with the request
    */

    public function model($model){
            require_once '../app/models/Session.php';
            global $loggedUser;
            $session = new Session;
            $loggedUser = $session->checkLogin();
            /*
            * Comparing the requested model with user status 
            * if user is loggedin can't request login model
            * if user is not loggedin it'll redirect him to login model
            */

            if(!$loggedUser && $model != 'Login'){
                header('Location: ' . URL . '/' . LANGUAGE .'/home/login');
            }elseif($loggedUser && $model == 'Login'){
                header('Location: ' . URL . '/' . LANGUAGE .'/home/index');
            }

            require_once '../app/models/' . $model . '.php';
            return new $model();
    }


    /* view function called to create an object of a view class
    * it includes the neccesary language files
    * loads the required view.
    */

    public function view($view, $data = []){
        
        /*
        * A main langauge file called main contains main variables like site name and description in different languages
        * every view should have the language file with the same name contains an associative array called
        * lang = array('key' => 'value');
        * in the language directory
        */
        if(!isset($data['lang']['main'])){
            require_once("../app/languages/" . LANGUAGE . "/main.php");
            /* $lang is an array that is defined in the language file. */
            $data['lang']['main'] = $lang;
         }
 
        $data['view'] = $view;
        if(!isset($data['lang'][$view])){
           require_once("../app/languages/" . LANGUAGE . "/". $view .".php");
            /* $lang is an array that is defined in the language file. */
            $data['lang'][$view] = $lang;
        }

        //including the header, the view and the footer    
        require_once '../app/views/layout/header.php';
        require_once '../app/views/' . $view . '.php';
        require_once '../app/views/layout/footer.php';
    }

}