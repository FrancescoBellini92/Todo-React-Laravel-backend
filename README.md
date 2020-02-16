## Todo app with React & Laravel (Laravel backend) 
This repository contains the back end API for a react todo app.

API features consist in CRUD operations on todos and lists

This project is still a work in progress 

## For cloning the repo
After cloning the repository:

1) run npm install to install all required dependencies.

2) run "composer install" to install all php dependencies (composer will be installed via "npm install")

3) create a MySql server with the following connection string "localhost:3306"
   
4) create a database named "react-todo-app"
   
NB: database connection string, name and user can be changed in ".env"

5) put the folder in the root of your local web server
   
6) start web server and mysql server

NB: Laravel uses PHP pdo libraries, therefore check that the extension "pdo_mysql" is uncommented in your php.ini



