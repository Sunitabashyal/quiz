@echo off
set MYSQL_BIN_PATH=C:\xampp\mysql\bin

:: Replace 'your_username' and 'your_password' with your MySQL username and password
set MYSQL_USER=root
set MYSQL_PASSWORD=""
set mysql_host=localhost

set mysql_cmd=%MYSQL_BIN_PATH%\mysql.exe -h %mysql_host% -u %MYSQL_USER%

:: Replace 'your_database' with the name of your MySQL database
set MYSQL_DATABASE=quiz_db
if not "%1"=="" (
    set MYSQL_DATABASE="%1"
)

REM Create the database
set create_db_query="CREATE DATABASE IF NOT EXISTS %MYSQL_DATABASE% ;"

:: Build the command to execute
set create_db_cmd=%mysql_cmd% -e %create_db_query%
rem set CREATE_TABLE=%MYSQL_BIN_PATH%\mysql.exe -h %mysql_host% -u %MYSQL_USER% -p%MYSQL_PASSWORD% -D %MYSQL_DATABASE% -e %create_db_query%

:: Run the create table command
%create_db_cmd%

echo Database %MYSQL_DATABASE% created successfully...........
REM ----------------------------------------------------------------------------------------------------------------




set quiz_query_cmd=%MYSQL_BIN_PATH%\mysql.exe -h %mysql_host% -u %MYSQL_USER% -D %MYSQL_DATABASE%

REM Set database and table names
set question_table_name=question

REM Create the questions table
set create_question_table_query="CREATE TABLE IF NOT EXISTS %question_table_name% ( id INT PRIMARY KEY AUTO_INCREMENT, question_text TEXT NOT NULL,  option_a VARCHAR(255) NOT NULL,  option_b VARCHAR(255) NOT NULL, option_c VARCHAR(255) NOT NULL, option_d VARCHAR(255) NOT NULL, correct_option VARCHAR(1) NOT NULL );"

set create_table_cmd=%quiz_query_cmd% -e %create_question_table_query%

:: Run the MySQL command
%create_table_cmd%
echo Table %question_table_name% created successfully.............
REM ------------------------------------------------------------------------------------------------------------------