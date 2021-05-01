# Tagerly - Assessment

### Requirements

- PHP >= 7.2.0
- Composer  https://getcomposer.org/

## Installation

- git clone https://github.com/ahmedsafroot/tagerly
- run command: composer install
-copy .env.example file to .env file
- run command: php artisan key:generate

### call Api
- your server path/public/api/product/search EX(http://localhost/tagerly/public/api/product/search)
- api is post
- api parametes:
- parameter name     required/option    value
-  username           required           tagerly_task
-  password           required           B3Nn6RxS6Qx
-  product_name       option             any name you want like (door)
-  vendor_name        option             any name you want like(ahmed refaat)
-  min_price          option             any value you want like(100)
-  max_price          option             any value you wan like(500)
-  sortBy             option             value from(price or num_selling or num_votes)

- if you want search by price should sent two parameters min_price and max_price

### test

 - to run test cases use this command: ./vendor/bin/phpunit   or php artisan test
 

### Note
- your task required No database so i used a data in static collection



