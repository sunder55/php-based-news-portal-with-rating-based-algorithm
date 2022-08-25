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
        
         <div class="col-9">
            <div class="card">
                <div class="card-header"><button id="newCat" class="btn btn-warning" >New Category</button></div>
                <div class="card-body">
                    <h5 class="card-title">Category Details</h5>
                        <table class="table">
                            <thead>
                                 <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $conn=mysqli_connect('localhost','root','','project');
                                if($conn->connect_errno!=0){
                                  die("connection failed");
                                }
                                    $sql= "SELECT * FROM category" ;

                                    $result= $conn->query($sql);
                                    $i=1;
                                    while($row=$result->fetch_assoc())
                                    {
                                        echo "<tr><td>".$i++."</td>";
                                       
                                        echo "<td>".$row['name']."</td>";
                                        echo "<td>".$row['description']."</td>";
                                        echo "<td>".$row['slug']."</td>";
                                        echo "<td><button id='".$row['cat_id']."'class=' edit btn btn-primary'>Edit</button>&nbsp";
                                        echo "<button id='".$row['cat_id']."'class=' delete btn btn-danger'>Delete</button></td></tr>";
                                        
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
    $(document).ready(function(){
        $('#newCat').click(function(){
          $('#mdlNewCat').modal ('show');
          $('#nCat').removeAttr('disabled');
        });
       
        $('#nCat').click(function(){
            var cat=document.getElementById('Cat');
            
            $.ajax({
                        url:"phpFile/cEntry.php",
                        method:"POST",
                        data: new FormData(cat),
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

        $(".edit").click(function(){
          var id=this.id;
          
          $.ajax({
            url:"phpFile/cEdit.php",
            method:"POST",
            data:{id:id},
            success:function(data)
            {

                var json=$.parseJSON(data);
                // alert(json[0].room_no);
                
                 $('#cTitle').val(json[0].name );
                $('#cDesc').val(json[0].description);
                $('#cSlug').val(json[0].slug);
                $('#hidden_id').val(json[0].cat_id);
                $('#mdlNewCat').modal ('show');
                $('#nCat').attr('disabled','disabled');
                $('#cEdit').removeAttr('disabled');

            
            }

          });
    
         });
       
         $('#cEdit').click(function(){
            var cat=document.getElementById('Cat');
             $.ajax({
                        url:"phpFile/cUpdate.php",
                        method:"POST",
                        data: new FormData(cat),
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
        
         $('.delete').click(function(){
             var id=this.id;
            $.ajax({
                        url:"phpFile/cDelete.php",
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
<div class="modal fade"  tabindex="-1" id="mdlNewCat">
  <div class="modal-dialog">
    <div class="modal-content">
        <form id="Cat" name="Cat"  >
            <div class="modal-header">
                <h5 class="modal-title">New Category Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="cTitle" name="cTitle" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="cDesc" name="cDesc" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Slug</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="cSlug" name="cSlug" required>
                    </div>
                </div>
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="nCat" class="btn btn-primary" disabled>New Category</button>
                <button type="submit" id="cEdit" class="btn btn-primary" disabled>Category Edit</button>
                <input type="hidden" id="hidden_id" name="hidden_id" />
            </div>
        </form>
    </div>
  </div>
</div>
