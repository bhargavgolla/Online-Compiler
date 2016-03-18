# Online Compiler

## About

This is a web application developed as part of a course project. Users can login with their credentials and use the C, C++, Java and Python compilers

Users can do two things:

* Write code online and compile it.
* Write code offline and submit it on this web interface for the compiler to show results.

This application was developed by [Bhargav Golla](https://github.com/bhargavgolla) and [Venkat Sandeep](https://github.com/sandy92).

## INSTALL
These setup instructions are specific to Ubuntu. This project was tested only on Ubuntu 14.04 server.

### Prerequisites
* LAMP stack
* GCC
* G++
* Java
* Python2.7 and 3.2

To get above packages and tools, run

	sudo apt-get install lamp-server^ gcc g++ default-jdk python python3

Checkout this repo.

### Configurations
Next we need to configure apache2, starting with creating a virtualhost.

	sudo mv /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-enabled/000-default.conf
	sudo vim /etc/apache2/sites-enabled/000-default.conf
This conf file should look like

	<VirtualHost *:80>
	...some stuff...
	</VirtualHost>
after the closing VirtualHost tag add the following:

	Listen 8080
	<VirtualHost *:8080>
		DocumentRoot "PATH_TO_HOME_OF_REPO"
	    <Directory "PATH_TO_HOME_OF_REPO">
	        Options Indexes FollowSymLinks MultiViews
	        AllowOverride All
	    	Order allow,deny
	        Allow from all
	    </Directory>
	</VirtualHost>

Edit /etc/apache2/apache2.conf. In this block of code:

	<Directory />
	        Options FollowSymLinks
	        AllowOverride None
	        Require all denied
	</Directory>

Replace *Require all denied* with *Require all granted*.

Restart Apache using
	sudo apachectl restart

The credentials for your MySQL server are to be provided in config.inc.php along with the name of the database and table you would like to use.

The application expects the users table to have username and password columns. To keep things simple, the password field just contains a MD5 hash instead of plain text password. A sample sql script is available in init_db.sql. Also, for each user that you create, the application also needs a folder with the username as name in the root directory and the **owner of this directory should be www-data (or the Apache user for your OS)**.

You are all set. Open http://localhost:8080 on your browser and login with a sample user name and password.

### Debug
To debug errors in the application, there are two best resources.
1. Apache error log at /var/log/apache2/error.log
2. Developer console on Firefox or Chrome for JS errors.
