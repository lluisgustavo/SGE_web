# :school_satchel: Web Application - School Management System  :school_satchel: <a name="top"></a>

This is an web application developed in Laravel for the bilingual technical course of analysis and development systems of SENAI. 
> Live demo [_here_](https://www.luisdesouza.com.br/sge).

## Table of Contents
* [Project Status](#project-status)
* [Introduction](#introduction)
* [Technologies Used](#technologies-used) 
* [IDEs Used](#ides-used) 
* [Screenshots](#screenshots)
* [Setup](#setup)  
* [Acknowledgements](#acknowledgements)
* [Contact](#contact) 

## Project Status <a name="project-status"></a>
Project is: _in progress_

![10%](https://progress-bar.dev/10)
 
## Introduction <a name="introduction"></a>

This is a school management system project designed for the technical course of analysis and development systems of SENAI. Given my time frame to develop it, I've chosen Laravel 7 to build it, since my host uses PHP 7.2.
I've learned a lot with this project, not only coding, but also other inner workings of developing a project, such as project management, software testing and database modeling.

## Technologies Used <a name="technologies-used"></a>
- PHP 7.2
- Laravel 7 
- Javascript
- jQuery
- Blade
- CSS
- MySQL

## IDEs Used <a name="ides-used"></a>
- Visual Studio Code
- PHPStorm

## Screenshots <a name="screenshots"></a>
![](./img/.png)

## Setup <a name="setup"></a>
### Clone repository ###

``` 
git clone https://github.com/lluisgustavo/SGE_web.git
```

### Create folders ###
Inside folder storage:
* Create folder framework 
  * Create folder framework/views 
  * Create folder framework/cache 
  * Create folder framework/sessions

### Database Connection ###
#### Copy .env.example and rename it to .env ####
```cp -a .env.example .env```
    
#### Generate a key ####
```php artisan key:generate```
    
#### Install Dependencies ####
```composer install```

#### Install Modules ####
```npm install ```

#### Now you can run ####
```php artisan serve```

- - - -

## Acknowledgements <a name="acknowledgements"></a>
- [Creative Tim](www.creative-tim.com)
- [Laravel](www.laravel.com) 

## Contact <a name="contact"></a>
Created by [@lluisgustavo](https://www.luisdesouza.com.br/) and [@Namless](https://github.com/NamIess)

[Go to Top](#top)
