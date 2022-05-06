<p align="left"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></p>

## A repo in which to play with Laravel and a REST API

Laravel 8 REST API With Sanctum Authentication - https://www.youtube.com/watch?v=MT-GJQIY3EU

### Key Learnings (so far)

#### Making models/controllers

- ```php artisan make:controller ProductController --api``` - Create a new controller (ProductController) with some basic api end points (Index, Store, Show, Update, Destroy)

- ```php artisan make:model Product --migration``` - Create a new Model (Product)

#### Migrations - https://laravel.com/docs/8.x/migrations: 

- ```php artisan make:migration create_product_table``` Create a new migration file to create a new table (products)

- ```php artisan make:migration add_sku_to_product_table --table=products``` Create a new migration file for an update to a specific table (products)

- ```php artisan migrate``` - Used to run database updates

#### List out routes

- ```php artisan route:list``` - List out the available routes in the application