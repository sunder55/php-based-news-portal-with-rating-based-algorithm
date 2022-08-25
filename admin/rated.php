<?php 
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
}
?>
<?php include('layout/header.php');
?>

 <div class="container-fluid">
     <div class="row">
      <?php 
      include('layout/sidebar.php');
      ?>
        
         <div class="col-9 mt-4">
            <div class="card">
                <div class="card-header h3">Rating Details</div>
                <div class="card-body">
                        <table class="table">
                            <thead>
                                 <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">users</th>
                                    <th scope="col">Rated value</th>
                                    <th scope="col">Action</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $conn=mysqli_connect('localhost','root','','project');
                                if($conn->connect_errno!=0){
                                  die("connection failed");
                                }
                                    $sql= "SELECT  news.title, rating.uid,rating.counts,rating.rid from rating INNER JOIN news on rating.nid=news.nid order by rating.rid desc";
                                    $result= $conn->query($sql);
                                    $i=1;
                                    while($row=$result->fetch_assoc())
                                    {
                                        echo "<tr><td>".$i++."</td>";
                                       
                                        echo "<td>".$row['title']."</td>";
                                        echo "<td>".$row['uid']."</td>";
                                        echo "<td>".$row['counts']."</td>";
                                        echo "<td><button id='".$row['rid']."'class=' delete btn btn-danger'>Delete</button></td></tr>";
                                        
                                    }
                            ?>
                            </tbody>
                        </table>
                 </div>
            </div>
            <div class="card mt-5">
                <div class="card-header h3">Rating Details in Total</div>
                <div class="card-body">
                        <table class="table">
                            <thead>
                                 <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Total</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $conn=mysqli_connect('localhost','root','','project');
                                if($conn->connect_errno!=0){
                                  die("connection failed");
                                }
                                $sql= "SELECT news.nid,news.slug, news.title,SUM(rating.counts) FROM rating 
                                INNER JOIN news ON rating.nid = news.nid GROUP BY rating.nid, news.title ORDER BY SUM(rating.counts) desc" ;
                                    $result= $conn->query($sql);
                                    $i=1;
                                    while($row=$result->fetch_assoc())
                                    {
                                        echo "<tr><td>".$i++."</td>";
                                       
                                        echo "<td>".$row['title']."</td>";
                                       
                                        echo "<td>".$row['SUM(rating.counts)']."</td>";
                                       
                                        
                                    }
                            ?>
                            </tbody>
                        </table>
                 </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
            
<?php 
include('layout/footer.php');
?>
<script>
    $(document).ready(function(){
    $('.delete').click(function(){
             var id=this.id;
            $.ajax({
                        url:"phpFile/rDelete.php",
                        method:"POST",
                        data:{id:id},
                        success:function(data)
                        {
                            alert(data);
                            location.reload(true); //used to Refresh Page
                        }
            });
            
         });
        });
        </script>
</body>
</html>

