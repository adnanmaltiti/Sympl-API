<?php

require 'config.php';

    # MySQL Database
    $database = 'mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_NAME . ';charset=UTF8';

# try catch
    try {
        # Connection with db
        $connect = new PDO($database, DATABASE_USERNAME, DATABASE_PASSWORD);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        exit();
    }