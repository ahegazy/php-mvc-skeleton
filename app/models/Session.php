<?php 

/*
* Session class to start a session on every and check user login. 
*
*/

class Session extends Database {


    function __construct(){
        parent::__construct();
        session_start(); // starts new or resumes existing session
             
     }

    function checkLogin(){
        if (isset($_SESSION['user_id'])){
                /*
                * check if userid exists in database, returns false if not 
                * if the user exists an array contains user's info returns.
                *
                * search for userid, returns user's data in an array or returns false if user is not exists
                */
        }
        return false;    

    }
}