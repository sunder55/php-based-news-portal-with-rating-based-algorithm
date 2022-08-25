
<?php include('phpFile/conn.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ccs/profile.css">
    <link rel="stylesheet" href="css/bootstrap.css">         
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">           
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style>
      body{
       background-color: lightslategray;
      }
</style>                         
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary ">
  <div class="container-fluid" >
    <a class="navbar-brand text-white" href="index.php">Newsportal</a>
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="color:#fff;">
    <span class="navbar-toggler-icon">   
    <i class="fa fa-bars" style="color:#fff; font-size:28px;"></i>
   
</span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-light">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
        </li>
      <?php  if(isset($_SESSION['users'])){?>
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="./profile.php">profile</a>
        </li>
        <?php
        }
        ?>
       
        <?php
         
              $navbarCategory="SELECT * FROM category";
              $navbarCategory_run=mysqli_query($conn,$navbarCategory);

              if(mysqli_num_rows($navbarCategory_run)>0){
                foreach($navbarCategory_run as $navItems){
        ?>
         <li class="nav-item">
          <a class="nav-link text-white" href=" category.php?title=<?= $navItems['slug'];?>"><?=$navItems['name']?></a>
        </li>
        <?php
          }
          }
        ?>
       
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn border-light text-light" type="submit">Search</button>
      </form>
      
      
      <?php if(isset($_SESSION['users'])):?>
      <form class="d-flex me-2" method="post" action="logout.php">
      <input type="submit" class="btn border-light bg-primary text-white ms-2" value="logout">
      </form>
    <?php else:?> <form class="d-flex me-2" method="post" action="login.php">
      <input type="submit" class="btn border-light bg-primary text-white ms-2" value="login">
      </form>
      <?php endif; ?>
      
    </div>
  </div>
</nav>
    
<!-- <div class="card"> -->
    <!-- <div class="card-header"></div> -->
      <!-- <div class="card-body"> -->
          
          <form method="POST" action="phpFile/update.php" class="profile_form">
          <h5 class="card-title">User Details</h5>
              <?php
                 $conn=mysqli_connect('localhost','root','','project');
                 if($conn->connect_errno!=0){
                      die("connection failed");
                     }
                      $id=$_SESSION['users'] ;
                      $sql= "SELECT * FROM user WHERE emails='".$id."'" ;
                        $result= $conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                              echo '<lable>Full Name</lable> <br>';
                              echo '<input type="text" name="name" value='.$row['name'].'>';
                              echo '<br><br>';
                              echo '<lable>email</lable> <br>';
                              echo '<input type="text" name="email" value='.$row['emails'].'>';
                              echo '<br><br>';
                              echo '<lable>Password</lable> <br>';
                              echo '<input type="password"id="pass" name="password" value='.$row['password'].'>';
                              echo '<br><br>';
                              echo '<input type="checkbox" onclick="myFunction()"><label>Show Password</label>';
                              echo '<br><br>';
                              echo '<lable>confirm Password</lable> <br>';
                              echo '<input type="password" name="confirm" value='.$row['confirm'].'>';
                              echo '<br><br>';
                            
                              echo '<button type="submit" name="submit" class="btn btn-primary">update </button>';

                                    
                                  
                             }
                ?>
            </form>
      </div>
    </div>
  </div> 
   <script>
        function myFunction() {
          var x = document.getElementById("pass");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
      </script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
    
</body>
</html>

