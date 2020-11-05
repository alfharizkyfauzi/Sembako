<?php

session_start();
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNY', 'sembako');
define('SESS', md5('sembako'));
define('SITE', 'http://localhost/sembako');

require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/Model.php';