# PHP-MVC SKELETON 
A PHP OOP web application skeleton that uses MVC architectural pattern to create a basic application that contains login and multi language systems and can be used in any web project.

- It was created to get rid of the trouble of creating a MVC script from scratch 

## Description 
Basic php skeleton of an MVC (model-view-controller) web application that you can use to build your application upon it or to understand the MVC pattern.

## Features 
1. MVC based application
2. MYSQL database connection
3. multi language
4. login system
4. session store and recovery

## How it works 
It's a normal MVC application so it consists of models/views/controllers 
1. First it runs the initiation script [init.php](app/init.php)
    - The initiation script loads main scripts and confinguration files.
2. Then a new app instance is created and the url is parsed in the [App.php](app/core/App.php#L51) class
3. In [App.php](app/core/App.php#L13) class the requested language is set and the requested controller is loaded ex: [home.php](app/controllers/home.php) controller.
4. A controller class instance is created and the requested method called
5. The method calls the model method and in the model loading method we check for login [Controller model](app/core/Controller.php#L10)
    - If the user is loggedin it'll get the requested model, else it'll redirect to login
6. The controller method then calls the view method and in the view loading method we load the language files and the page layout.  [Controller view](app/core/Controller.php#L37)

## Directory structure
1. [app](app): Application backend
    - [config](app/config): configuration files
    - [core](app/core): core scripts called in app initiation 
    - [Helper](app/Helper): helper function such as common used and database functions
    - [languages](app/languages): languages contain directories with language code
    - [controllers](app/controllers): application controllers
    - [models](app/models): application models
    - [views](app/views): application views
    - [init.php](app/init.php): initiation script that includes necessary scripts.
    - [.htaccess](app/.htaccess): htaccess file to prevent entering this area for users

2. [public](public)
    - [index.php](public/index.php): creates an app instance.
    - [.htaccess](public/.htaccess): htaccess to control the url writing 
    - [css](public/css): contains css style files.
    - [js](public/js): contains javascript files.

## How to use it
- Just clone the repo and start building upon the provided skeleton


## Finally 
I'll be pleased to see contribution send a pull request, 
if you have any questio you can open an issue.
