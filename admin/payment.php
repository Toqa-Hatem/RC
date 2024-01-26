<!DOCTYPE html>
<html>
    <html lang="en">
        <head>
              <meta charset="UTF-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>payment</title>
              <link rel="stylesheet" type="text/css" href="payment.css">
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" 
              integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" 
              crossorigin="anonymous" referrerpolicy="no-referrer" />
            </head>
  
       
<?php
include('../connection.php');
$search=false;
if (isset($_POST["search"])){
  $q = $_POST["search"];
  $search=true; 
   $sql=mysqli_query($con,"SELECT * FROM `card details` JOIN user USING (`user_id`) WHERE username like '%$q%' OR card_number like '%$q%' ");
}?>
<body>
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
        <h2>Welcome Admin</h2>
      
        <img src="total.png" class="img_total" alt="">
    </div>
     <form method="post">
    <input type="search "class="srh" placeholder="search" name="search"  onchange="form.submit()">
    <img src="search.png" alt="" class="search">
</form>

   

    <div class="table">
        <h2> card Information</h2>
       
    
        <table  class="table_details">
            <thead>
              <tr>
                <th>UserName</th>
                <th>card no</th>
                <th>Expire date</th>
                <th>ccv code</th>
              </tr>
            </thead>
          
            <tbody>
              <?php if($search === false) {
               $sql=mysqli_query($con,"SELECT * FROM `card details` JOIN user USING (`user_id`)");
              foreach($sql as $value){ ?>

              <tr>
                <td><?php echo $value['username'];?></td>
                <td><?php echo $value['card_number'];?></td>
                <td><?php echo $value['expiration_date'];?></td>
                <td><?php echo $value['method'];?></td>
                <td><a class="edit" href="add_card.php?update=<?php echo $value['card_id']?>">Update</a></td>

              </tr>
              <?php } } else {?>
              <?php 
               foreach($sql as $value){ ?>
  
                
                <tr>
                  <td><?php echo $value['username'];?></td>
                  <td><?php echo $value['card_number'];?></td>
                  <td><?php echo $value['expiration_date'];?></td>
                  <td><?php echo $value['method'];?></td>
                  <td><a class="edit" href="add_card.php?update=<?php echo $value['card_id']?>">Update</a></td>
  
                </tr>
                <?php } 
              }  
              ?>

          
            </tbody>
          </table>

    </div>
   
    </html>