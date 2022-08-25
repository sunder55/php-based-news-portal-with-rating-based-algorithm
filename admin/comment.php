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
        
         <div class="col-9 mt-3">
            <div class="card">
                <div class="card-header fs-4 h3">Comments Details</div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                        <table class="table">
                            <thead>
                                 <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">user name</th>
                                    <th scope="col">news title</th>
                                    <th scope="col">description</th>
                                    <th scope="col">action</th>
                                     </tr>
                            </thead>
                            <tbody>
                            <?php
                                $conn=mysqli_connect('localhost','root','','project');
                                if($conn->connect_errno!=0){
                                  die("connection failed");
                                }
                                    $sql= "SELECT news.title,comment.name,comment.comm,comment.id
                                    FROM comment
                                    INNER JOIN news ON comment.nid = news.nid WHERE status='unconfirmed'
                                    order by id desc"  ;

                                    $result= $conn->query($sql);
                                    $i=1;
                                    while($row=$result->fetch_assoc())
                                    {
                                        echo "<tr><td>".$i++."</td>";
                                        echo "<td>".$row['title']."</td>";
                                        echo "<td>".$row['name']."</td>";
                                        echo "<td>".$row['comm']."</td>";
                                        echo "<td><button id='".$row['id']."'class='approve btn btn-primary'>approve</button>&nbsp";
                                        echo "<button id='".$row['id']."'class=' delete btn btn-danger'>Delete</button></td></tr>";
                                        
                                    }
                            ?>
                            </tbody>
                        </table>
                 </div>
            </div>

            <div class="card mt-5">
                <div class="card-header fs-4 h3">Approved Comments</div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                        <table class="table">
                            <thead>
                                 <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">user name</th>
                                    <th scope="col">news title</th>
                                    <th scope="col">description</th>
                                    <th scope="col">action</th>
                                     </tr>
                            </thead>
                            <tbody>
                            <?php
                                $conn=mysqli_connect('localhost','root','','project');
                                if($conn->connect_errno!=0){
                                  die("connection failed");
                                }
                                    $sql= "SELECT news.title,comment.name,comment.comm,comment.id
                                    FROM comment
                                    INNER JOIN news ON comment.nid = news.nid WHERE status='approved'
                                    " ;

                                    $result= $conn->query($sql);
                                    $i=1;
                                    while($row=$result->fetch_assoc())
                                    {
                                        echo "<tr><td>".$i++."</td>";
                                        echo "<td>".$row['title']."</td>";
                                        echo "<td>".$row['name']."</td>";
                                        echo "<td>".$row['comm']."</td>";
                                        echo "<td>
                                        <button id='".$row['id']."'class=' delete btn btn-danger'>Delete</button></td></tr>";
                                        
                                    }
                            ?>
                            </tbody>
                        </table>
                 </div>
            </div>
        </div>
    </div>
</div>
           
<?php 
include('layout/footer.php');
?>
<script>
         $('.delete').click(function(){
             var id=this.id;
            $.ajax({
                        url:"phpFile/coDelete.php",
                        method:"POST",
                        data:{id:id},
                        success:function(data)
                        {
                            alert(data);
                            location.reload(true); //used to Refresh Page
                        }
            });
            
         });
         $('.approve').click(function(){
           var id=this.id;
           $.ajax({
                        url:"phpFile/approve.php",
                        method:"POST",
                        data: {id:id},
                        success:function(data)
                        {

                            alert(data);
                            location .reload();
                           

                        }
                  });
        });
   
  
</script>
</body>
</html>
