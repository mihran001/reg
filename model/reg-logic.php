<?php

function validation($post){
    $resp = [];        
    if (empty($post["username"])){
        $resp["username"] = " Data can not be empty. ";
    }
    if (empty($post["lastname"])){
        $resp["lastname"] = " Data can not be empty. ";
    }
    if (empty($post["email"])){
        $resp["email"] = "Data can not be empty. ";
    }
    if (empty($post["password"])){
        $resp["password"] =  " Data can not be empty. ";
    }
    
    if (empty($post["repassword"])){
        $resp["repassword"] =  " Data can not be empty. ";
    }
    if ($post["password"] !== $post["repassword"]){
        $resp["password"] = "the passwod and repid password should be the same";
    }

    return $resp;
}
if (!empty($_POST)){
   $response = validation($_POST);
   if(empty($response)){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registraci";
    

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "SELECT * FROM users_table WHERE `email`= '";
        $sql =  $sql . $_POST["email"];  
        $sql = $sql . "'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) { 
            header('Location: ../view/registration.php');
        } else {

            $sql = "INSERT INTO users_table VALUES (null,'" . $_POST["username"] . "','" . $_POST["lastname"] . "','" . $_POST["email"] . "','" . $_POST["password"] . "')";
            $result = mysqli_query($conn, $sql); 
            header('location:../view/news.php');
        }
  


    
   }
   
}



?>