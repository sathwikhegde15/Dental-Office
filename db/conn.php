<?php 
    // Development Connection
    // $host = 'localhost';
    // $db = 'attendance_db';
    // $user = 'root';
    // $pass = '';
    // $charset = 'utf8mb4';


    $host = 'localhost';
    $db = 'dental_db';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    //Remote Database Connection
    // $host = 'remotemysql.com';
    // $db = 'NC1HPsPMvA';
    // $user = 'NC1HPsPMvA';
    // $pass = 'rqUDdNcsXH';
    // $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    require_once 'users.php';
    require_once 'dentist.php';
    require_once 'patient.php';
    require_once 'hygienist.php';
    $crud = new crud($pdo);
    $users = new user($pdo);
    $dentist = new dentist($pdo);
    $patient = new patient($pdo);
    $hygienist = new hygienist($pdo);
   
    $users->insertUser("admin","password",6);
?>
