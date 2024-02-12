#! /bin/bash

DB_USER=root
DB_HOST=localhost
DB_PASS=root


mysql_cmd="mysql -h $DB_HOST -u $DB_USER -p$DB_PASS"

MYSQL_DATABASE=${1:-"quiz_db"}

echo $MYSQL_DATABASE
create_db_query="CREATE DATABASE IF NOT EXISTS $MYSQL_DATABASE;"

create_db_cmd="$mysql_cmd -e \"$create_db_query\""
# CREATE_TABLE=mysql -h localhost -u root -p -D quiz_db -e $query

# $create_db_cmd
echo $create_db_cmd
echo
eval $create_db_cmd
echo Database $MYSQL_DATABASE created successfully...........
# ----------------------------------------------------------------------------------------------------------------

quiz_query_cmd="$mysql_cmd -D $MYSQL_DATABASE"
echo $quiz_query_cmd

table_name=user

# Create User table
create_table_query="CREATE TABLE IF NOT EXISTS $table_name (id INT AUTO_INCREMENT PRIMARY KEY, uuid VARCHAR(22), name VARCHAR(40),email VARCHAR(60),address VARCHAR(50), password VARCHAR(255) NOT NULL, is_admin BOOLEAN NOT NULL DEFAULT FALSE, created_on DATETIME );"

create_table_cmd="$quiz_query_cmd -e \"$create_table_query\""
 
# Run the MySQL command
eval $create_table_cmd
echo
echo Table $table_name created successfully.............
# ---------------------------------------------------------------------------------------------------
# 
# 
# Create Question Table
table_name=question
create_table_query="CREATE TABLE IF NOT EXISTS $table_name (id INT AUTO_INCREMENT PRIMARY KEY, question_text TEXT NOT NULL, option_a VARCHAR(255) NOT NULL, option_b VARCHAR(255) NOT NULL, option_c VARCHAR(255) NOT NULL, option_d VARCHAR(255) NOT NULL, correct_option VARCHAR(1) NOT NULL, created_on DATETIME );"

create_table_cmd="$quiz_query_cmd -e \"$create_table_query\""
 
# Run the MySQL command
eval $create_table_cmd
echo
echo Table $table_name created successfully.............



# Create Quiz Table
table_name=quiz
create_table_query="CREATE TABLE IF NOT EXISTS $table_name (id INT AUTO_INCREMENT PRIMARY KEY, user_id INT, uuid VARCHAR(22),  score INT, created_on DATETIME, FOREIGN KEY (user_id) REFERENCES user(id) );"

create_table_cmd="$quiz_query_cmd -e \"$create_table_query\""
 
# Run the MySQL command
eval $create_table_cmd
echo
echo Table $table_name created successfully.............


# Create AskedQuestion Table
table_name=asked_question
create_table_query="CREATE TABLE IF NOT EXISTS $table_name (id INT AUTO_INCREMENT PRIMARY KEY, submitted_ans varchar(1), score INT, uuid VARCHAR(22), question_type VARCHAR(50), user_id INT, question_id INT, quiz_id INT, created_on DATETIME, FOREIGN KEY (quiz_id) REFERENCES quiz(id), FOREIGN KEY (user_id) REFERENCES user(id), FOREIGN KEY (question_id) REFERENCES question(id));"

create_table_cmd="$quiz_query_cmd -e \"$create_table_query\""
 
# Run the MySQL command
eval $create_table_cmd
echo
echo Table $table_name created successfully.............




