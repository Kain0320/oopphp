<?php

spl_autoload_register(function ($classname) {
    include  "clases/" . $classname . ".class.php";
});
/*
*database details
*/

define("DBHOST", "localhost;port=8889");
define("DBUSER", "root");
define("DBPASS", "root");
define("DBNAME", "oop_db");