<?php

define('DB_USERNAME', 'user1');
define('DB_PASSWORD', '12345678');
define('DSN', 'mysql:host=127.0.0.1 ; dbname=contactdb; charset=utf8');

function db_connect(){
  $dbh = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
  return $dbh;
}
?>