@echo off
set PHP_PATH=C:\xampp\php
set loaddata_cmd=%PHP_PATH%\php.exe loaddata.php

:: Run the create table command
:: php -S localhost:8001
%loaddata_cmd%