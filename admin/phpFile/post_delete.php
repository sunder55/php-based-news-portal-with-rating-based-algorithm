<?php
if(isset($_GET['nid'])){
  $post_id=$_GET['nid'];
  include('conn.php');
  $check_img_query="SELECT * FROM news WHERE nid='$post_id' LIMIT 1";
  $img_res=mysqli_query($conn,$check_img_query);
  $res_data=mysqli_fetch_array($img_res);
  $image=$res_data['image'];
  
  $sql = "DELETE FROM news WHERE nid='".$post_id."'";
  $query_run=mysqli_query($conn,$sql);


  if($query_run){
          if(file_exists('image/'.$image)){
             unlink('image/'.$image);
          }
        
    
      echo "<script>alert('Record Deleted Sucessfully.') 
      window.location = '../editnews.php';
    </script>";
    }else{
      echo '<script> alert("error on insertion")
      <window.location="../news.php";<script>';
    }
  }            

?>