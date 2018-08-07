<?php
$target_dir = "../upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if(isset($_POST["submit"])) {
    if(isset($_FILES["fileToUpload"]["tmp_name"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        var_dump($_FILES["fileToUpload"]["tmp_name"]);
        echo "<br>";
        echo "<pre>";
        print_r($check);
        if($check !== false) {
            $imageName = count(scandir($target_dir)) - 1;
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            rename(  $target_dir .  $_FILES["fileToUpload"]["name"], $target_dir . $imageName . "." . $imageFileType);
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "upload";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            $sql = "INSERT INTO uploads_table VALUES (null,'" .  $target_dir . $imageName . "." . $imageFileType . "')";
            $result = mysqli_query($conn, $sql); 
            $sql = "SELECT image FROM uploads_table";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
     
  
}
?>