<?php include('layout/header.php') ?>
<?php include('phpFile/conn.php') ?>

<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-white">Category</h3>
            </div>
            <?php
         
         $homeCategory="SELECT * FROM category";
         $homeCategory_run=mysqli_query($conn,$homeCategory);
 
         if(mysqli_num_rows($homeCategory_run)>0){
           foreach($homeCategory_run as $homeCateItems){
             ?>
            
            <div class="col-md-3 mb-4">
                <a class="text-decoration-none h6 text-center" href=" category.php?title=<?= $homeCateItems['slug'];?>">
                    <div class="card card-body">
                    <?=$homeCateItems['name']?>
                    </div>
              </a>
            </div>
         <?php
           }
         }
         ?>
           
        </div>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3 class="text-dark">Latest Posts</h3>
                <?php
                $homePosts="SELECT * FROM news ORDER BY nid DESC LIMIT 12";
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
         ?>
        </div>
            
        <div class="col-md-3">
                <div class="card">
                    <div class="card-header h3">
                        Popular News!!
                    </div>
                    <?php 
                
                     $sql= "SELECT news.nid,news.slug, news.title, SUM(rating.counts) FROM rating 
                    INNER JOIN news ON rating.nid = news.nid GROUP BY rating.nid, news.title ORDER BY SUM(rating.counts) desc LIMIT 5" ;
                         $comm_run=mysqli_query($conn,$sql);
                         foreach($comm_run as $commItem){
                                                                       
                                  
                                ?>
                        <div class="card-body">
                        <a class="text-decoration-none" href=" post.php?title=<?= $commItem['slug'];?>">
                            <span class="h6 col-md-4 mt-2"><?=$commItem['title'] ?></span><br>
                         </a>
                            <hr>
                        </div>
                        <?php
                                        }
                                
                        ?>
                    <!-- // foreach($conn->query('SELECT nid,SUM(counts) 
                    // FROM rating
                    // GROUP BY nid ORDER BY SUM(counts) DESC') as $row )  -->
                   
        
                </div>
            </div>
    </div>
</div>

<?php include('layout/footer.php') ?>