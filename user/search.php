<?php include('layout/header.php') ?>
<?php include('phpFile/conn.php') ?>
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3 class="text-dark">Searched Posts</h3>
                <?php
                if(isset($_POST['sSubmit'])){
                $name=$_POST['search'];
                $homePosts="SELECT * FROM news where title='".$name."'";
                $homePosts_run=mysqli_query($conn,$homePosts);
        
                if(mysqli_num_rows($homePosts_run)>0){
                foreach($homePosts_run as $homePostItems){
                    ?>
                    
                <div class="mb-4">
                    <a class="text-decoration-none" href=" post.php?title=<?= $homePostItems['slug'];?>">
                        <div class="card card-body bg-light">
                            <?=$homePostItems['title']?>
                        </div>
                    </a>
                </div>
         <?php
           }
         }
        }
         ?>
        </div>      
   </div>
</div>

<?php include('layout/footer.php') ?>