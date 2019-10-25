# sql_injection
Demo solution for SQL Injection using prepared statements in PHP

Filenames represent the attack type and filenames starting with "fix_" represent the implemented solution using the prepared statements in PHP.
To test the files, change the link to the form submission in index.html and execute it on a server. I did it on localhost.

PHP Documentation for prepared statements can be found here: https://www.php.net/manual/en/mysqli.quickstart.prepared-statements.php

Database used: Mysqli;

Scripting Language: PHP;

Server: Localhost (APACHE HTTP SERVER);

Vulnerable inputs: 

insert.php: 	

Username: injection

Password: '); DROP TABLE registration;# 


union.php:

Username to search: ' union select uname, pwd from sqli;#
