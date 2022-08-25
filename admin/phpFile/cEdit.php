<?php

 $id=$_POST['id'];
include('conn.php');
 $sql = "SELECT * FROM category WHERE cat_id='".$id."'";
 
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
