
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
    <link rel="stylesheet" href="./css/bootstrap.css">         
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">           
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style>
  .checked {
    color: orange;
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
      <form class="d-flex" role="search" method="post" action="./search.php">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" required>
        <button class="btn border-light text-light" type="submit" name="sSubmit">Search</button>
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

   
