<?php
include('conn.php');
$id=$_POST['id'];
    $sql="UPDATE comment SET status='approved' WHERE id='".$id."'";
    if($conn->query($sql)){
        echo "successfully approved ";
     }
     else{
         echo "something went wrong";
     }



?>