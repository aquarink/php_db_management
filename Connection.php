<?php
/**
 * @author Evin Weissenberg
 */

class Connection {

    public static $db = 'production'; //production, staging, development.

    //PRODUCTION
    public static $db_host_production = '';
    public static $db_username_production = '';
    public static $db_password_production = '';
    public static $db_name_production = '';
    public static $db_production_port = '3306';

    //STAGING
    public static $db_host_staging = '';
    public static $db_username_staging = '';
    public static $db_password_staging = '';
    public static $db_name_staging = '';
    public static $db_staging_port = '3306';

    //DEVELOPMENT
    public static $db_host_development = '';
    public static $db_username_development = '';
    public static $db_password_development = '';
    public static $db_name_development = '';
    public static $db_development_port = '3306';


    public static function __construct($db) {

        if (self::$db == 'production') {

            $db = new mysqli(self::$db_host_production, self::$db_username_production, self::$db_password_production, self::$db_name_production);

            if ($db->connect_errno) {
                printf("Connection failed: %s\n", $db->connect_error);
                return False;
            }

            return $db;

        } elseif (self::$db == 'staging') {

            $db = new mysqli(self::$db_host_staging, self::$db_username_staging, self::$db_password_staging, self::$db_name_staging);

            if ($db->connect_errno) {
                printf("Connection failed: %s\n", $db->connect_error);
                return False;
            }

            return $db;

        } elseif (self::$db == 'development') {

            $db = new mysqli(self::$db_host_development, self::$db_username_development, self::$db_password_development, self::$db_name_development);

            if ($db->connect_errno) {
                printf("Connection failed: %s\n", $db->connect_error);
                return False;
            }

            return $db;


        } else {

            return false;

        }
    }
}
//usage
//$db = new Connection('production');