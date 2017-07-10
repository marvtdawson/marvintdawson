/* Get Marvelle */
Get Marvelle was created by Marvin Dawson, PHP Software Engineer,
on March 1, 2017.

## Basic code standard for Get Marvelle
###################################### VARIABLE STRUCTURE #########################################
Get Marvelle follows the standard PHP variable name convention.
1. Class variables = follows a camelCase structure = $thisClassName = new ClassName();
2. Private variables = follows a '$_' structure = $_thisvariable.
3. Regular variables = follows a underscore structure = $this_variable.


###################################### SITE CONFIGURATION #########################################
1. Change constant variable value of 'SITE_NAME' & 'SITE_DOMAIN' on Config class in core/Config on line 17 & 18 from Get Marvelle to
your site name and domain name.

###################################### DATABASE CONFIGURATION #########################################
Database Configuration has 2 steps that should be completed before live production

1. Check database connection properties make sure that you are not pushing localhost development properties
    to live server:
    go to directory -> /library/Models/Iscriptz/IConnect2Db.php
    change the following constant values:
        CLIENTHOST = 'localhost',
        CLIENTUSER = 'user',
        CLIENTPW = 'password',
        CLIENTDB = 'database name'
    These properties should be that of the your hosted server or remote server.

2. Create database schema

###################################### ERROR REPORTING CONFIGURATION #########################################
Error Reporting Configuration has 2 steps that should be completed before live production

1. Turn error reporting for PHP and MySQL off via /public/index
Either comment out lines 5 & 6 or delete them before pushing changes to live production.
Example:
    5. //error_reporting(E_ALL);// show all php errors
    6. //ini_set('display_errors', 'On'); // show errors
These lines should be commented out by default, via the .sh upload configuration file.
But as a precaution you should confirm before moving to production.

2. Make sure that the hosting server has error reporting turn on via the php.ini and/or httpd.conf files.

################################### APPLICATION STRUCTURE CONFIGURATION #######################################
Application Structure Configuration has 2 steps that should be completed before live production

1. Make sure your hosted server .conf file for Get Marvelle application recognize the public/index.php file.
2. Make sure your remote server folder structure for Get Marvelle application recognize the public/index.php file.