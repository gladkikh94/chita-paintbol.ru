<?php

/////////////////////////////////////////////////////////
//ПОДКЛЮЧЕНИЕ К БАЗЕ НА MYSQL СЕРВЕРЕ
//  $dbHost-имя сервера MySQL
//  $dbLogin- логин для входа на MySQL сервер
//  $dbPassword- пароль для подключение к MySQL серверу
//  $dbName- имя базы для подключения
/////////////////////////////////////////////////////////
function connectDB($iniArray){
    $dbHost=$iniArray['db']['dbHost'];
    $dbLogin=$iniArray['db']['dbLogin'];
    $dbPassword=$iniArray['db']['dbPassword'];
    $dbName=$iniArray['db']['dbName'];
    //отключаем отображение ошибок при подключение
    error_reporting(0);
    //создание конекта для подключение к серверу MySQL
    $dbConnect = mysql_connect($dbHost, $dbLogin, $dbPassword);
    //подключение к базе
    mysql_select_db($dbName, $dbConnect);
}
