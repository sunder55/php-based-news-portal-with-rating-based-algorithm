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
                   
                       $posts="SELECT * FROM news where slug='$slug'";
                       $posts_run=mysqli_query($conn,$posts);

                       if(mysqli_num_rows($posts_run)>0){
                        // $i=1;
                        // $ins="UPDATE news set counts=(counts+1) where slug='$slug'";
                        // $post=mysqli_query($conn,$ins);
                        foreach($posts_run as $postItems){    
                                   
                            ?>
                       
                            <div class="card shadow-sm mb-4"> 
                                <div class="card-header">
                                <h5> <?=$postItems['title'];?></h5>
                                </div>
                              <div class="card-body">
                              <label class="text-dark me-2">Posted On:<?= date('d-m-y',strtotime($postItems['date']));?></label> 
                             <hr>
                             <?php if( $postItems['image']!= null) : ?>
                            <img src="../admin/phpFile/image/<?= $postItems['image']?>" alt="<?=$postItems['title'];?>"style="width:100%; height:100%;"/>
                             <?php endif; ?>
                                <div>
                                 <?=$postItems['description'];?>  
                                </div>
                            </div>
                         </div>
                         
                        <?php 
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
            <?php if(isset($_SESSION['users'])):?>
        <form method="post" id="rate" name="rate">
            <div class="col-md-6 col-lg-4">
                <div class="card h4">
                    <div class="card-header">
                            Rate Now!!
                    </div>
                    <div class="card-body">
                        <select class="rate_select" name="rate_select" required>
                            <option value="0">select stars!!</option>
                            <option value="1">⭐</option>
                            <option value="2">⭐⭐</option>
                            <option value="3">⭐⭐⭐</option>
                            <option value="4">⭐⭐⭐⭐</option>
                            <option value="5">⭐⭐⭐⭐⭐</option>
                        </select>
                        <?php if(isset($_GET['title'])){
                    $slug=mysqli_real_escape_string($conn,$_GET['title']);
                       $posts="SELECT * FROM news where slug='$slug'";
                       $posts_run=mysqli_query($conn,$posts);
                       if(mysqli_num_rows($posts_run)>0){
                         foreach($posts_run as $postItems){    
                              
                            ?>
                        <input type="hidden" name="hidden_id" value="<?=$id=$postItems['nid'];?>">
                        <input type="hidden" name="hidden_slug" value="<?=$id=$postItems['slug'];?>">
                        <?php } } } ?>
                        
                        <button type="submit" class="btn btn-primary" id="rate_btn">submit</button>
                    </div>
                </div>
            </div>         
        </form>
        <?php else: ?>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header h4">
                           Please login to rate
                    </div>
                    <div class="card-body">
                        <select class="rate_select" name="rate_select">
                            <option value="">select stars</option>
                            <option value="1">⭐</option>
                            <option value="2">⭐⭐</option>
                            <option value="3">⭐⭐⭐</option>
                            <option value="4">⭐⭐⭐⭐</option>
                            <option value="5">⭐⭐⭐⭐⭐</option>
                        </select>
                        <button type="submit" class="btn btn-primary" id="rate_btn">submit</button>
                    </div>
                </div>
            </div>         
            <?php endif; ?>
        <script src="js/jquery.js"></script> 
   
        <?php if(isset($_SESSION['users'])):?>
        <form method="post" id="com" >
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header h4">
                            Comment Below!!
                        </div>
                        <div class="card-body">
                        <textarea class="col-md-12" name="desc"></textarea>
                        <?php if(isset($_GET['title'])){
                    $slug=mysqli_real_escape_string($conn,$_GET['title']);
                       $posts="SELECT * FROM news where slug='$slug'";
                       $posts_run=mysqli_query($conn,$posts);
                       if(mysqli_num_rows($posts_run)>0){
                         foreach($posts_run as $postItems){    
                        
                              
                            ?>
                        <input type="hidden" name="hidden_id" value="<?=$id=$postItems['nid'];?>">
                        <?php } } } ?>
                            <input class="btn btn-primary" name="submit" type="submit" id="comm" value="comment">
                        </div>
                    </div>
                </div>    
            </div>
        </form>
        <script>
            $(document).ready(function(){
               
                $('#comm').click(function(){
                    var com=document.getElementById('com');
                $.ajax({
                        url:"phpFile/comm.php",
                        method:"POST",
                        data: new FormData(com),
                        contentType:false,
                        cache:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload(true);

                        }
                  });
                   
                });
                $('#rate_btn').click(function(){
                    var rate=document.getElementById('rate');
                    $.ajax({
                        url:"phpFile/rating.php",
                        method:"POST",
                        data: new FormData(rate),
                        contentType:false,
                        cache:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload(true);

                        }
                  });
                });
            });
            </script>
        <?php else: ?>

        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header h4">
                        Please login to comment!!
                    </div>
                    <div class="card-body">
                      <textarea class="col-md-12"></textarea>
                        <a href="#" class="btn btn-primary">Comment</a>
                    </div>
                </div>
            </div>    
        </div>  
        <?php endif; ?>

        <div clas="row">
            <div class="col-md-6  mt-5">
                <div class="card">
                    <div class="card-header h3">
                        Comment Details
                    </div>
                    <?php if(isset($_GET['title'])){
                    $slug=mysqli_real_escape_string($conn,$_GET['title']);
                       $posts="SELECT * FROM news where slug='$slug'";
                       $posts_run=mysqli_query($conn,$posts);
                       if(mysqli_num_rows($posts_run)>0){
                         foreach($posts_run as $postItems){    
                            $nid=$postItems['nid'];
                            $sql= "SELECT news.title,comment.name,comment.comm,comment.id
                            FROM comment
                            INNER JOIN news ON comment.nid = news.nid WHERE comment.nid='".$nid."' AND status='approved';
                            " ;
                                $comm_run=mysqli_query($conn,$sql);
                                foreach($comm_run as $commItem){
                                                                   
                              
                            ?>
                    <div class="card-body">
                        <span class="h5 col-md-4 mt-2"><?=$commItem['name'] ?></span><br>
                        <span class="col-md-6 ms-3"><?=$commItem['comm']?></span>
                        <hr>
                    </div>
                    <?php
                                    }
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </div> 

    </div>
</div>

<?php include('layout/footer.php');



