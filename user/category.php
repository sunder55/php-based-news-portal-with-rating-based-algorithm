<?php 
include('layout/header.php');
include('phpFile/conn.php');
?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php
                if(isset($_GET['title'])){
                    $slug=mysqli_real_escape_string($conn,$_GET['title']);

                    $category="SELECT cat_id,slug FROM category WHERE slug='$slug' LIMIT 1";
                    $category_run=mysqli_query($conn,$category);

                    if(mysqli_num_rows($category_run)>0){
                        $categoryItem= mysqli_fetch_array($category_run);
                       $category_id=$categoryItem['cat_id'];

                       $posts="SELECT nid,title,slug,date FROM news where category='$category_id'";
                       $posts_run=mysqli_query($conn,$posts);

                       if(mysqli_num_rows($posts_run)>0){
                        foreach($posts_run as $postItems){
                           
                            ?>
                        <a href="post.php?title=<?=$postItems['slug'];?>" class="text-decoration-none">
                            <div class="card card-body shadow-sm mb-4"> 
                                <h5> <?=$postItems['title'];?></h5>
                                <div>
                                    <label class="text-dark me-2">Posted On:<?= date('d-m-y',strtotime($postItems['date']));?></label>   
                                </div>
                            </div>
                        </a>  
                        <?php 
                        }
                      
                       }
                  
                    }else{
                     
                        ?>
                        <h4> No such category found </h4>
                        <?php
                    }
                   
                }else{
                    ?>
                    <h4> No such url </h4>
                    <?php
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
</div>


<?php include('layout/footer.php') ?>