<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];


$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
else if($username == '' || $email == '' || $password == '' || $password2 == '') {
    echo "<script>alert('do fill')</script>";
}
else{
   $stmt = $conn->prepare("insert into registration(username, email, password, password2) 
   values(?, ?, ?, ?)");
  $stmt->bind_param("ssss",$username, $email, $password, $password2);
  $stmt->execute();
  echo "registration succesfully..";
  $stmt->close();
  $conn->close();
}
?>