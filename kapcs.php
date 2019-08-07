<?php

//Memória beállítások
//innodb_log_file_size = 16M (5M helyett)
//max_allowed_packet = 128M (1M helyett)
ini_set("upload_max_filesize", "2048M");
ini_set("memory_limit", "1024M");
ini_set('max_execution_time', 60);
ini_set('mysql.connect_timeout', 300);
ini_set('default_socket_timeout', 300);
ini_set('default_charset', 'utf-8');

//Állandók
define('HOST', "localhost");
define('USER', "root");
define('PASS', "");
define('AB', "mismatch");
define('target_dir',"images/");

//Kapcsolat
$kapcs = mysqli_connect(HOST, USER, PASS, AB);
if (!$kapcs) {
    die(mysqli_connect_error());
}
mysqli_query($kapcs, "SET NAMES utf8");

