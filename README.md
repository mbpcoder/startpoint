Start Point For Creating Apps with Laravel
============
this is going to be start point for developer and give them some basic infrastructure they need for most of websites. features like authentication, permissions, blog, upload, create static pages, admin interface, notifications, support systems, newsletter and so on

## Completed Features
* Blog
    * alias, published, multi category for posts
    * posts pagination
    * alias, published and order for categories
    * migration for building the database schema
    * powerful admin interface
* Newsletters
    * send newsletter
    * newsletters list
    * add or remove newsletters member    
* Tickets
   * tickets list
   * tickets categories   
   * unlimited answers

# install via composer 
    composer create-project mahdi-bagheri/blog App


# init
    create .env config file from .env.example and change default values.
run:

    composer update
    php artisan migrate
    php artisan db:seed

Some Screenshot

![alt tag](https://cloud.githubusercontent.com/assets/3877538/12076259/fb221706-b1b8-11e5-992f-56b42f51b361.PNG)

![alt tag](https://cloud.githubusercontent.com/assets/3877538/12076260/01a0ee0e-b1b9-11e5-8e4b-0b50d675cfe5.PNG)

![alt tag](https://cloud.githubusercontent.com/assets/3877538/12076261/058278e4-b1b9-11e5-868c-9f06b311a7aa.PNG)

![alt tag](https://cloud.githubusercontent.com/assets/3877538/12076262/0a0c0cd6-b1b9-11e5-87a4-efa71c93cba6.PNG)

