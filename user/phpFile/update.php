<?php
session_start(); 

 
 if(isset($_POST['submit'])){
    $email=$_SESSION['users'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];
    $emails=$_POST['email'];
    $name=$_POST['name'];
    $err="";
    if($name==""){
        $err.="name is empty";
    }
    if($email==""){
        $err.="email address is empty <br>";
        
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err.="Email address isnot valid<br>";
      }
      if($emails!=$email){
          $err.="Email address doesnot match";
      }
    if($password==""){
        $err.="password is empty<br>";
    }
    if($confirm==""){
        $err.="confirm is empty<br>";
    }
    if($password!=$confirm){
        $err.="password doesnot match<br>";
    }
    if($err==""){
     $conn=mysqli_connect('localhost','root','','project');
         if($conn->connect_errno!=0){
           die("connection failed");
         }
             $sql= "UPDATE  user set password='".$password."',confirm='".$confirm."' WHERE emails='".$email."'"; 
             if($conn->query($sql)){
                echo "<script>alert('Your Record Sucessfully updated.');
                window.location = '../profile.php';</script>";
              
                
             }
             else{
                echo "<script> alert('error occur');
                window.location='../profile.php';
                </script>";
                
             
            }
        }
             else{
                echo "<script> alert('$err');
                window.location='../profile.php';
                </script>";
                
             
            }
            }
        
?>