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
                    <div class="card-header">
                        <h4>Popular News</h4>
                    </div>
                    <div class="card-body">
                        News title
                    </div>
                </div>
            </div>
        </div>
        <?php if(isset($_SESSION['user'])):?>
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header h3">
                        Comment Below!!
                    </div>
                    <div class="card-body">
                      <textarea class="col-md-12"></textarea>
                        <a href="#" class="btn btn-primary">Comment</a>
                    </div>
                </div>
            </div>    
        </div>
        <?php else: ?>
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header h3">
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
    </div>
</div>


<?php include('layout/footer.php') ?>