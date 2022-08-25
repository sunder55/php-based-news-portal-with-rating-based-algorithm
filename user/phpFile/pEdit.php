<?php

 $id=$_POST['uid'];
//  $id=$_SESSION['users'];
include('conn.php');
 $sql = "SELECT * FROM user WHERE uid='".$id."'";
 
 if($result=$conn->query($sql)){
    $data= array();
    while($row = $result->fetch_assoc())
    {
        array_push($data,$row);   
    }
    
    echo json_encode($data);
}
else{
    echo"error";
}
?>