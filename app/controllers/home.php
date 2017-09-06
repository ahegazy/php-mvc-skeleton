<?php

class Home extends Controller{

    public function index(){
        /*
        * URL parameters can be recieved as an argument by specifying a variable for it in function declaration
        * EX: public function index($param1 , $param2){}
        * and can be used inside the function
        *   - processed by the function model
        *   - sent to the view
        */
        
        //loggedin user info
        global $loggedUser;
        //getting index model
        $index = $this->model('Index');
        //showing home/index view
        $this->view('home/index', ['user' => $loggedUser ]);
    }

    
        /*
        * login method includes a new object of login class
        * checks if user credentials [username,passwords] are provided using POST  
        * if so it checks if user credentials are right using Login model 
        * else it views the login page
        */
    public function login(){

        $login = $this->model('Login');
        if(isset($_POST['username'])){

            $login->username = $_POST['username'];
            $login->password = $_POST['password'];
            $user = $login->userlogin();
            if(!$user){
                $this->view('home/login', [ 'error' => 'loginError' ]);
            }else{
                $this->view('home/index', [ 'msg' => 'loginSuccess','user' => $user ]);                
            }
        }else{
                $this->view('home/login');
        }


    }


    public function logout(){
            $logout = $this->model('Logout');
            $logout->userLogout();
            $this->view('home/login',['msg' => 'logoutSuccess']);
    }
}