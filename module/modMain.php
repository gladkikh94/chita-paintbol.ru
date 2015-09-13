<?php
include_once 'modDB.php';
include_once 'modHTML.php';
include_once 'modLogin.php';

$iniArray = parse_ini_file("module/option.ini", true);
connectDB($iniArray);
session_start();