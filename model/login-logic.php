<?php
function validation($post){
    $resp = [];
    if (empty($post['email'])){
        return $resp["email"] = "Data can not be empty. ";
    }
    if (empty($post['password'])){
        return $resp["password"] = "Data can not be empty. ";
    }
    return  $resp;
}
if (!empty($_POST)){
    $isvalid = validation($_POST);
    if(empty($isvalid)) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "registraci";
        
    
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "SELECT * FROM users_table WHERE email = '". $_POST['email'] ."' AND password = '".$_POST['password'] ."' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) { 
            if($row = mysqli_fetch_assoc($result)) {
              header ('location: ../view/news.php');
            }
        } else {
            header('location: ../view/registration.php');
        }
    }
}




?>