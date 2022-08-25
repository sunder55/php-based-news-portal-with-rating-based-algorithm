<?php 


    $id=$_POST['hidden_id'];
    $name=$_POST['cTitle'];
    $desc=$_POST['cDesc'];
    $slug=$_POST['cSlug'];

    include('conn.php');
             $sql= "UPDATE  category set name='".$name."',description='".$desc."',slug='".$slug."' WHERE 
             cat_id='".$id."'"; 
             if($conn->query($sql)){
                echo "successfully updated";
             }
             else{
                 echo "something went wrong";
             }

?>