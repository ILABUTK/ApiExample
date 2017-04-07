## API example ##

A simple laravel API example to show CRUD operations

### Installation ###

* `git clone https://github.com/kaikezhang/ApiExample.git ApiExample`
* `cd ApiExample`
* `composer install`
* `cp .env.example .env`
* `php artisan key:generate`
* Create a database and inform *.env* (e.g., use MySQL Workbench to create an `apitestdb` db and a user `apitestuser/apitestuser!` and grant schema privilleges @xplipro1). (@xplipro2: db on ilabdb. name: dev_apitestdb; dev_apitestuser/dev_apitestuser! ./mysql -u root -p -h ilabdb.engr.utk.edu)
* `php artisan migrate` to create tables
* `php artisan serve` to start the app on http://localhost:8000/ or config a web server to start the app


### Step to replicate ###
* `laravel new ApiExample`
* create database and inform *.env*
* `php artisan make:model Task --migration`
* Edit migration file
* `php artisan migrate`
* `Edit routes/api.php`
* Details can be found at [this commit](https://github.com/kaikezhang/ApiExample/commit/23957e73fb4ea36d96f2e75423702669db8a8b75)

### Test with Postman ###
* Create a task

  Post `$domain/api/tasks` insert a `name` field in body.

* Show all tasks

  Get `$domain/api/tasks`

* Delete a task

  Delete `$domain/api/tasks/{id}`

* Update a task

  Put `$domain/api/tasks/{id}` insert `name` field in body and select `x-www-form-urlencoded`.

### Personal log ###
* Test tasks CRUD using Postman
* Replicate for users CRUD
> cd apiexample
> subl .
> edit api.php for CRUD
> Test CRUD using Postman
* SQLdump the db
>  /usr/local/mysql/bin/mysqldump -u apitestuser -h 127.0.0.1  -p --databases apitestdb >apitestdb.sql 

