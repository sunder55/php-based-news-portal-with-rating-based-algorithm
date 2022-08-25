<?php 
if(isset($_POST['cTitle']))
{
  $title=$_POST['cTitle'];
  $desc=$_POST['cDesc'];
  $slug=$_POST['cSlug'];
    include('conn.php');
    $err="";
    if($title==""){
        $err.=" sorry title is empty";
    }
    if($desc==""){
        $err.="sorry desc is empty";
    }
    if($slug==""){
        $err.=" sorry slug is empty";
    }
    if($err==""){
                 $sql= "INSERT into category (name,description,slug) values('".$title."','".$desc."','".$slug."')" ;

                 if($conn->query($sql)){
                    echo "inserted successfully ";
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