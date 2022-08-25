<?php
if(isset($_POST['submit']))
{
    $email=$_POST['emails'];
    $password=$_POST['password'];
    // databases connection
    $conn=mysqli_connect('localhost','root','','project');
    if($conn->connect_errno!=0){
        die("connection failed");
    }
        $sql= "SELECT * FROM user WHERE emails='".$email."' 
        AND password= '".$password."'";
        $result= $conn->query($sql);
        if($result->num_rows>0)
        {
        session_start();
        $_SESSION['users'] = $email;
        header('Location:index.php');
    }
    else{
        echo "<script> alert('user not found');
               
                </script>";
                
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="ccs/style.css">
</head>
<body>
<div class="container mt-5 ">
    <div class="d-flex justify-content-center mb-3">
    <form method="post" action="login.php" class="form">
      <h1 class="hotelbtn ">Newsportal Login</h1>
  <div class="mb-3 mt-5">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input name="emails" type="email" autocomplete class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
  </div>

  <button type="submit" name="submit" class="btns btn-primary">Login</button><br><br>
  <button class="register" type="button" id="reg"> or Sign up now!!</button>
</form>
</div>  
</div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script>
$(document).ready(function(){
        $('.register').click(function(){   
          $('#mdlNewNews').modal ('show');
         });
       
         $('#register').click(function(){
            var room=document.getElementById('Room');
        

            $.ajax({
                        url:"phpFile/create.php",
                        method:"POST",
                        data: new FormData(room),
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

</body>
</html>


<div class="modal fade"  tabindex="-1" id="mdlNewNews">
  <div class="modal-dialog">
    <div class="modal-content">
        <form id="Room" name="Room"  >
            <div class="modal-header">
                <h5 class="modal-title">New Registration</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Full Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="confirm" name="password" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">confirm</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="confirm" name="confirm" required>
                    </div>
                </div>
                
              
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="register" class="btn btn-primary" >Register</button>
                <input type="hidden" id="hidden_id" name="hidden_id" />
            </div>
        </form>
    </div>
  </div>
</div>
