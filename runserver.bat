@echo off
set PHP_PATH=C:\xampp\php
set host=localhost
set port=8001
set php_cmd=%PHP_PATH%\php.exe -S %host%:%port%

:: Run the create table command
%php_cmd%