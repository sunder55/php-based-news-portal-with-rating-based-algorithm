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
    <div class="col-9 mt-2">
        <form action="phpFile/addnews.php" method="POST" role="document" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    <span class="h3">News Entry</span>
        </div>
        <div class="card-body">
            <div class="mt-4">
                <label for="exampleFormControlInput1" class="form-label h5">Title</label>
                <input type="text" class="form-control" id="title" placeholder="" name="title" required>
            </div>
        <div class="mt-4">
            <label for="exampleFormControlInput1" class="form-label h5">Category</label>
            <?php 
            include('phpFile/conn.php');
            $cat="SELECT * FROM category";
            $cat_run=mysqli_query($conn,$cat);
            if(mysqli_num_rows($cat_run)>0){
                ?>
                <select name="category" class="form-control" required>
                    <option value="">...Select Category...</option>
                    <?php foreach($cat_run as $catitem){
                        ?>
                        <option value="<?= $catitem['cat_id']?>"><?=$catitem['name']?></option>
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
                <textarea class="form-control"style="min-height:30vh" id="exampleFormControlTextarea1"name="desc" rows="4" required></textarea>
            </div>
 
            <div class="mt-4">
                <label for="slug" class="form-label h5">Slug</label>
                <input type="text" id="slug" class="form-control" name="slug" required>
            </div>
            <div class="mt-4">
                <label for="image" class="form-label h5">Image</label>
                <input type="file" id="image" class="form-control" name="image" multiple>
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