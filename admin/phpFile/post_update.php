<?php
include('conn.php');
if(isset($_POST['submit'])){
    $post_id=$_POST['post_id'];
    $name=$_POST['title'];
    $cat=$_POST['category'];
    $desc=$_POST['desc'];
    $slug=$_POST['slug'];

    $old_filename=$_POST['old_image'];
    $image=$_FILES['image']['name'];
    
    $update_filename="";
    if($image != NULL){
        // rename this image
        $image_extension=pathinfo($image,PATHINFO_EXTENSION);
        $filename=time().'.'.$image_extension;

        $update_filename=$filename;
    }else{
        $update_filename=$old_filename;
    }

    $sql="UPDATE news SET category='$cat',title='$name',description='$desc',slug='$slug',image='$update_filename' WHERE nid='$post_id'";

    if($conn->query($sql)){
        if($image != NULL){
            if(file_exists('image/'.$old_filename)){
                unlink("'image/'.$old_filename");
            }
            move_uploaded_file($_FILES['image']['tmp_name'],'image/'.$update_filename);
        }
      
        echo "<script>alert('Your Record Sucessfully Inserted.');
        window.location = '../editnews.php';</script>";
      }else{
        echo '<script> alert("error on insertion")
        <window.location="../news.php";<script>';
      }
    }             



?>