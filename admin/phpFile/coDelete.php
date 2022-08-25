<?php
 $id=$_POST['id'];
include('conn.php');
 $sql = "DELETE FROM  comment WHERE id='".$id."'";
 if($conn->query($sql)){
    echo "successfully Deleted ";
 }
 else{
     echo "something went wrong";
 }

?>