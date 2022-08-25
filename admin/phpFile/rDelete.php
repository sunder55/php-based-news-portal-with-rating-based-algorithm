<?php
 $id=$_POST['id'];
include('conn.php');
 $sql = "DELETE FROM rating WHERE rid='".$id."'";
 if($conn->query($sql)){
    echo "successfully Deleted ";
 }
 else{
     echo "something went wrong";
 }

?>