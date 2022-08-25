<?php 
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
}
?>
<?php include('layout/header.php');?>
<div class="row">
<?php include('layout/sidebar.php'); ?>
     <div class="col-9 pt-5 ps-5">
        <div class="row ">
        <div class="card  mb-3 col-3  bg-primary text-white text-center ms-3">
        <div class="card-header h3 ">Total Post</div>
        <div class="card-body ">
        <?php
            include('phpFile/conn.php'); 
            $dash_category_query="SELECT * FROM news";
            $dash_category_query_run=mysqli_query($conn,$dash_category_query);
            if($category_total=mysqli_num_rows($dash_category_query_run)){
                echo' <h5 class="card-title">'.$category_total.'</h5>';
            }else{
                echo '<h4 class="card-title">No Data </h4>';
            }
            ?>
        </div>
        <div class="card-footer h6 "><a href="editnews.php" class="text-light text-decoration-none ">View Details</a></div>
        </div>
        
        <div class="card  mb-3 col-3 bg-success text-white text-center ms-5">
        <div class="card-header h3 ">Total Category
        </div>
        <div class="card-body ">
            <?php
            include('phpFile/conn.php'); 
            $dash_category_query="SELECT * FROM category";
            $dash_category_query_run=mysqli_query($conn,$dash_category_query);
            if($category_total=mysqli_num_rows($dash_category_query_run)){
                echo' <h5 class="card-title">'.$category_total.'</h5>';
            }else{
                echo '<h4 class="card-title">No Data </h4>';
            }
            ?>
           
        </div>
        <div class="card-footer h6 "><a href="category.php" class="text-light text-decoration-none ">View Details</a></div>
        </div>

        <div class="card  mb-3 col-3 bg-primary text-white text-center ms-5">
        <div class="card-header h3 ">Total Comment</div>
        <div class="card-body ">
        <?php
            include('phpFile/conn.php'); 
            $dash_category_query="SELECT * FROM comment";
            $dash_category_query_run=mysqli_query($conn,$dash_category_query);
            if($category_total=mysqli_num_rows($dash_category_query_run)){
                echo' <h5 class="card-title">'.$category_total.'</h5>';
            }else{
                echo '<h4 class="card-title">No Data </h4>';
            }
            ?>
        </div>
        <div class="card-footer h6 "><a href="comment.php" class="text-light text-decoration-none ">View Details</a></div>
        </div>

</div>
</div>
<?php include('layout/footer.php'); ?>

