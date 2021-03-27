<?php
$dsn = 'mysql:host=remotemysql.com;dbname=Pua9qGgCRT';
$username = 'Pua9qGgCRT';
$password = 'WxdZ2hLjfr';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}