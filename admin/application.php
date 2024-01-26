<!DOCTYPE html>
<html>
    <html lang="en">
        <head>
              <meta charset="UTF-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>application</title>
              <link rel="stylesheet" type="text/css" href="application.css">
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" 
              integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" 
              crossorigin="anonymous" referrerpolicy="no-referrer" />
            </head>
  
            <?php
include('../connection.php');
?>
       
<body>

</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<div class="sidebar">
<div class="logo">
  <p>R<span>C</span></p>
</div>
<ul class="navs">
  <li>
    <a href="user.php" class="active">
      <p class="links_name" onclick="location.href='user.php'">Users</p>
    </a>
  </li>
  <li>
    <a href="application.php">
      <p class="links_name" onclick="location.href='application.php'">Applications</p>
    </a>
  </li>
  <li>
    <a href="reviews.php">
      <p class="links_name" onclick="location.href='reviews.php'">Reviews</p>
    </a>
  </li>
  <li>
    <a href="complain.php">
      <p class="links_name" onclick="location.href='complain.php'">Complaints</p>
    </a>
  </li>
  <li>
    <a href="payment.php">
      <p class="links_name" onclick="location.href='payment.php'">Payments</p>
    </a>
  </li>
  <hr />
  <li>
    <a href="../login.php">
      <p class="links_name" >logout</p>
    </a>
  </li>
</ul>
</div>
    <div class="total">
        
        <h2 class="n_users"> Welcome Admin</h2>
        
    </div>
     
    <input type="search "class="srh" placeholder="search" >
    <img src="search.png" alt="" class="search">

   

    <div class="table">
        <h2> Application Information</h2>
        <a class="add" href="add_sponser.php">Add New Application</a>
    
        <table  class="table_details">
            <thead>
              <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Email</th>
                <th>password</th>
              </tr>
            </thead>
          
            <tbody>
            <?php $sql=mysqli_query($con,"SELECT * FROM `application`");
             
              foreach($sql as $va){ ?>

              <tr>
                <td><?php echo $va['name'];?></td>
                <td><?php echo $va['type'];?></td>
                <td><?php echo $va['email'];?></td>
                <td><?php echo $va['password'];?></td>
                <td><a class="edit" href="add_sponser.php?update=<?php echo $va['appid']?>">Update</a></td>

              </tr>
              
          <?php } ?>
            </tbody>
          </table>

    </div>
   
    </html>