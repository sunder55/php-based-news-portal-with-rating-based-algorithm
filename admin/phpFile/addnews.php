<?php 
include('conn.php');
if(isset($_POST['submit'])){
    $name=$_POST['title'];
    $cat=$_POST['category'];
    $desc=$_POST['desc'];
    $slug=$_POST['slug'];
   $image=$_FILES['image']['name'];
   //rename this image
   $image_extension=pathinfo($image,PATHINFO_EXTENSION);
   $filename= time().'.'.$image_extension;

      $sql="INSERT INTO news (title,category,slug,description,image,date)values('".$name."', '".$cat."','".$slug."','".$desc."','".$filename."',NOW())";
      
      if($conn->query($sql)){
        move_uploaded_file($_FILES['image']['tmp_name'],'image/'.$filename);
        echo "<script>alert('Your Record Sucessfully Inserted.');
        window.location = '../news.php';</script>";
      }else{
        echo '<script> alert("error on insertion")
        <window.location="../news.php";<script>';
      }
    }             
  ?>
