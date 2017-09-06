<?php 


class Logout extends Database {


    /*
    * Loggingout the user by destroying the current session
    * it would be different using another login method !
    */
    public function userLogout(){
        $_SESSION = array();
        session_destroy();                
    }


}