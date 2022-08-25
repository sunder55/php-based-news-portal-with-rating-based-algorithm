<?php
 session_start();
 include('conn.php');
  $nid=$_POST['hidden_id'];
   $user=$_SESSION['users'];
    $desc=$_POST['desc'];
    
        $sql="INSERT INTO comment(nid,name,comm) values('".$nid."','".$user."','".$desc."')";
            if($conn->query($sql)){
                echo "comment successfull";
     
            }else{
                echo "error occur";
    }
     
    
?>


