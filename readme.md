# Laravel Registration App
Working Example:
http://www.lprakash.com.np/project/registration/public/
Demo
user: prakash@luitel.com
Pass: admin123

* Back-end
    * Dashboard
	* Manage photos and photo albums.
    * DataTables dynamic table sorting and filtering.
    ![Alt text](registrationapp/public/gitfiles/admin-area.png "Admin Dashboard")
    ![Alt text](registrationapp/public/gitfiles/admin-dashboard.png "Admin Inner Page")
* Front-end
	* User login, registration
	* View Photos
* Packages included:
	* Datatables Bundle

##Requirements

	PHP >= 5.5.9
	OpenSSL PHP Extension
	Mbstring PHP Extension
	Tokenizer PHP Extension
	SQL server(for example MySQL)
	Composer
	Node JS

## Steps:
    *  composer dump-autoload
    *  composer install --no-scripts
    *  Create database in mysql server with utf-8 collation(uft8_general_ci)
    *  opy .env.example and rename it as .env and put connection and change default database connection name, only database connection, put name database, database username and password.
    *  uncomment this line "extension=php_fileinfo.dll" in php.ini file.
    *  node -v, if not please install
    *  npm install --save-dev
    *  php artisan db:seed
    *  In command, go to app directory and run as php artisan serve
    *  In Browser, use url and visit
    *  You can use demo user and pass prakash@luitel.com and admin123 respectively

## License

*  This is free software distributed under the terms of the MIT license

## TODO
    * Remove public from live url

* Any queries regarding snippet please send email to  prakashluitel88@gmail.com.

http://lprakash.com.np