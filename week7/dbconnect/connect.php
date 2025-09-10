<?php 
     try{
        $pdo = new PDO("mysql:host=localhost; dbname=168DB_22; charset=utf8", "168DB22", "3vBye9HX");
         $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         // echo "Connected successfully";
     }catch(PDOException $e){
        echo "Connection failed" . $e->getMessage();
     }
?>
