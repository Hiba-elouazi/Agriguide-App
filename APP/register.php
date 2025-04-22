<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'connect.php';
if(isset($_POST['signUp'])){
   $nom=$_POST['nom'];
   $prenom=$_POST['prenom'];
   $email=$_POST['email'];
   $telephone=$_POST['telephone'];
   $region=$_POST['region'];
   $ville=$_POST['ville'];
   $password=$_POST['password'];
   $password=md5($password);

    $checkEmail="SELECT * From users where email='$email'";
    $result=$conn->query($checkEmail);
    if($result->num_rows>0){
        echo "Email Adress Already Exists !";
    }
    else{
        $insertQuery = "INSERT INTO users (nom, prenom, email, password, telephone, region, ville)
                VALUES ('$nom', '$prenom', '$email', '$password', '$telephone', '$region', '$ville')";

            if ($conn->query($insertQuery) === TRUE) {
                header("Location: index4.php");
                exit();
            } else {
                die("Error: " . $conn->error); // Output detailed error
            }
    }
}
if(isset($_POST['signIn'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

    $sql="SELECT * FROM users WHERE email='$email' and password='$password'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['email']=$row['email'];
        $_SESSION['user_id'] = $row['id'];
        header("Location: index4.php");
        exit();
    }
    else{
        echo "Not Found, Incorrect Email or Password";
    }
}
?>