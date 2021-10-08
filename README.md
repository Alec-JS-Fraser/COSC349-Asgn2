# COSC349 Assignment Two

This service runs an EC2 instance running Ubuntu, with security groups allowing for an SSH connection on port 22 and HTML connections on port 80 for both IPv4 and IPv6. You will need to make your own EC2 instance with these specifications if you wish to recreate this website, as after this assignment is marked the site will be taken down.

To recreate this software, in your EC2 instance run the command

	sudo apt-get mysql-server php apache2 php-mysql libapache2-mod-php

Then run 

	sudo service apache2 start

Place all the file from this git repository into 

	/var/www/html/

You will then need to create an Amazon RDS instance running MySQL with a security group allowing for all traffic from MySQL/Aurora queries. 

Attempt a connection to MySQL by running the following command in your EC2 instance

	 mysql –h your_SQL_endpoint -u your_DB_username –p

and enter your database's password when prompted.

When you have confirmed your MySQL database is running and your EC2 instance can connect to it, change the conn.php file in your EC2 instance to include the connection details. Be sure to change the db_host to your RDS endpoint, along with changing the username and password depending on how you set up your RDS instance.

From here, you should be able to connect to your EC2 instance's public IP address, and everything *should* work like a charm.

To access our webserver go to the address:

	http://3.81.63.54/site.php
