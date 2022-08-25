<?php
    if(isset($_POST['email'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];
    $name=$_POST['name'];
    $err="";
    if($name==""){
        $err.="name is empty";
    }
    if($email==""){
        $err.="email address is empty";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err.="Email address isnot valid";
    }
    if($password==""){
        $err.="password is empty";
    }
    if($confirm==""){
        $err.="confirm is empty";
    }
    if($password!=$confirm){
        $err.="password doesnot match";
    }
    if($err==""){
    $conn=mysqli_connect('localhost','root','','project');
    if($conn->connect_errno!=0){
    die("connection failed");
    }
        $sql= "INSERT INTO user(name,emails,password,confirm) VALUES('".$name."','".$email."','".$password."','".$confirm."')" ;

        if($conn->query($sql)){
        echo "successfully register";
        }
        else{
            echo "something went wrong";
        }
    }
    else{
        echo $err;
    }
    }
?>
