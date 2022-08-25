<?php
    session_start();
    include('conn.php');
    $nid=$_POST['hidden_id'];
    $slug=$_POST['hidden_slug'];
    $user=$_SESSION['users'];
    $rate=$_POST['rate_select'];
    $err="";
    if($rate=="0"){
        $err.="please select star below!!";
    }
    if($err==""){
        $sql="SELECT counts from rating where nid='".$nid."' AND uid='".$user."'";
            $result=$conn->query($sql);
           if($result->num_rows>0){
            echo ("already rated");
           }else{
            $query="INSERT INTO rating(nid,uid,counts) values('".$nid."','".$user."','".$rate."')";
            $run=mysqli_query($conn,$query);
           
                echo "success";
            
           }
        }
           else{
            echo $err;
        }
                    
                
        
?>