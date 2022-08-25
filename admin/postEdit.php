<?php 
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
}
?>
<?php include('layout/header.php');?>
<div class="row">
    <?php include('layout/sidebar.php');?>
    <?php include('phpFile/conn.php'); ?>
    <div class="col-9 mt-2">
     <?php if(isset($_GET['nid'])){
      $post_id=$_GET['nid'];
      $post_query="SELECT * FROM news where nid='$post_id' LIMIT 1";
      $post_query_res=mysqli_query($conn, $post_query);
      if(mysqli_num_rows($post_query_res)> 0){
        $row = mysqli_fetch_array($post_query_res);
        ?>
            <?php
      } else 
      {
        ?>
        <h4>No record found</h4>
        <?php
      }
    }
    ?>
        <form action="phpFile/post_update.php" method="POST" role="document" enctype="multipart/form-data">
     
                <div class="card">
                    <div class="card-header">
                        <span class="h3">News Entry</span>
            </div>
            <div class="card-body">
                <input type="hidden" name="post_id" value="<?=$row['nid'] ?>">
                <div class="mt-4">
                    <label for="exampleFormControlInput1" class="form-label h5">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="" name="title" value="<?= $row['title']?>"required>
                </div>
            <div class="mt-4">
                <label for="exampleFormControlInput1" class="form-label h5">Category</label>
                <?php 
                $cat="SELECT * FROM category";
                $cat_run=mysqli_query($conn,$cat);
                if(mysqli_num_rows($cat_run)>0){
                    ?>
                    <select name="category" class="form-control" required>
                        <option value="">...Select Category...</option>
                        <?php foreach($cat_run as $catitem){
                            ?>
                            <option value="<?= $catitem['cat_id']?>" <?= $catitem['cat_id'] ==  $row['category']?'selected':''?>><?=$catitem['name']?></option>
                            <?php
                        }
                        ?>
                        </select>
                        <?php
                }else{
                    ?>
                    <h5>No category Available</h5>
                    <?php
                }
                ?>
                </div>
                <div class="mt-4">
                    <label for="exampleFormControlTextarea1" class="form-label h5">Description</label>
                    <textarea class="form-control"style="min-height:30vh" id="exampleFormControlTextarea1"name="desc" rows="4" required><?= $row['description']?></textarea>
                </div>
    
                <div class="mt-4">
                    <label for="slug" class="form-label h5">Slug</label>
                    <input type="text" id="slug" class="form-control" name="slug" value="<?= $row['slug']?>" required>
                </div>
                <div class="mt-4">
                    <label for="image" class="form-label h5">Image</label>
                    <input type="hidden" name="old_image" value="<?= $row['image']?>">
                    <input type="file" id="image" class="form-control" name="image"  multiple>
                </div>
                <div class="mt-4 col-3">
                    <input type="submit" id="submit" class="form-control bg-primary text-light" name="submit">
                </div>
                <div>
            </div>
   
        </form>
    
    </div>
</div>
<?php include('layout/footer.php'); ?>